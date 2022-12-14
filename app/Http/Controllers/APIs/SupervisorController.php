<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;

use DB;
use stdClass;
use DateTime;
use App\Projects;
use App\Planning;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Weekcard;
use Illuminate\Support\Facades\Validator;
use App\FileUploadsInWeekstaat;

class SupervisorController extends Controller
{
    public function __construct()
    {
    $this->middleware('jwt');
    }

    public function getProjectsList(Request $request, $id)
    {
        $projects = Projects::select('Id', 'Name')->where('Contact_id', '=', $id)->where('Active', '=', '1')->orderBy('Id', 'desc')->get();
        return response() -> json([
            'status' => 1,
            'message' => 'Get supervisor projects list',
            'data' => [
                'projects' => $projects
            ]
        ]);
    }
    public function test(Request $request)
    {
        $id= 4467;
        $projects = Projects::select('Id', 'Name',"created_at")->where('Contact_id', '=', $id)->get();//where('Active', '=', '1')->orderBy('Id', 'desc')->get();
        return response() -> json([
            'status' => 1,
            'message' => 'Get supervisor projects list',
            'data' => [
                'projects' => $projects
            ]
        ]);
    }

    public function projectPlanning(Request $request, $id)
    {
        $planning = DB::table('tbl_planing')->where('project_id', '=', $id)->select('id', 'week_no', 'date')->orderBy('date', 'desc')->get();
        return response() -> json([
            'status' => 1,
            'message' => 'Project Planning',
            'data' => [
                'count' => sizeof($planning),
                'planning' => $planning
            ]
        ]);
    }

    public function employees_list(Request $request, $id)
    {
        $employees = DB::table('tbl_planing_employee')
                        ->join('tblemployee', 'tblemployee.id', '=', 'tbl_planing_employee.employee_id')
                        ->select('tbl_planing_employee.id', 'tblemployee.firstname', 'tblemployee.lastname','tbl_planing_employee.plan_id', 'tbl_planing_employee.week_no', 'tbl_planing_employee.date', 'tbl_planing_employee.project_id', 'tbl_planing_employee.employee_id')
                        ->where('plan_id', '=', $id)
                        ->orderBy('tblemployee.firstname', 'asc')
                        ->get();

        return response() -> json([
            'status' => 1,
            'message' => 'Employees list that are working on a particular project and date',
            'data' => [
                'count' => sizeof($employees),
                'employees' => $employees
            ]
        ]);
    }

    public function checkEmployeeAttendance(Request $request)
    {
        $attendance = DB::table('tbl_pln_emp_attendence')
                        ->where('date_in', '=', $request->date)->where('employee_id', '=', $request->employee_id)->where('project_id', '=', $request->project_id)
                        ->select('id', 'employee_id', 'plan_id', 'project_id', 'date_in', 'time_in', 'date_out', 'time_out', 'total_time','approved_by_supervisor')
                        ->first();

        if($attendance) {
            return response() -> json([
                'status' => 1,
                'message' => 'Employee attendance',
                'data' => [
                    'attendance' => $attendance
                ]
            ]);

        }  else {
            return response() -> json([
                'status' => 1,
                'message' => 'Attendance not marked yet',
                'data' => [
                    'planning' => null
                ]
            ]);
        }
    }


    public function approveEmployeeAttendance(Request $request)
    {
        $approved = $request->approved;
        if($approved) {
            DB::table('tbl_pln_emp_attendence')
                        ->where('date_in', '=', $request->date)->where('employee_id', '=', $request->employee_id)->where('project_id', '=', $request->project_id)
                        ->update(['approved_by_supervisor' => 1]);
        } else {
            DB::table('tbl_pln_emp_attendence')
                        ->where('date_in', '=', $request->date)->where('employee_id', '=', $request->employee_id)->where('project_id', '=', $request->project_id)
                        ->update(['approved_by_supervisor' => 0]);
        }

        return response() -> json([
                'status' => 1,
                'message' => 'Employee attendance record is updated',
            ]);
    }

    public function getWeekwiseAttendance(Request $request)
    {
        $year = substr($request->week_no, 0, 4);
        $week = substr($request->week_no, 4);
        $week_array = $this->getWeekDates($week,$year);
        $data = [];

        for($i = 0; $i < 5; $i++)
        {
            $record = DB::table('tbl_pln_emp_attendence')->where('project_id', '=', $request->project_id)->where('employee_id', '=', $request->employee_id)->where('date_in', '=', $week_array[$i]['date'])->select('id', 'date_in', 'time_in', 'time_out', 'total_time', 'approved_by_supervisor')->first();


            if($record) {
                $record->day = $week_array[$i]['day'];
                array_push($data, $record);
            } else {
                $tempData = new stdClass();
                $tempData->id = null;
                $tempData->date_in = $week_array[$i]['date'];
                $tempData->day = $week_array[$i]['day'];
                $tempData->time_in = null;
                $tempData->time_out = null;
                $tempData->total_time = 0;
                $tempData->approved_by_supervisor = 0;

                array_push($data, $tempData);
            }

        }

      return response() -> json([
              'status' => 1,
              'message' => 'Weekwise Employee attendance record',
              'data' => [
                  'week' => $week,
                  'year' => $year,
                  'employee_id' => $request->employee_id,
                  'week_no' => $request->week_no,
                  'records' => $data,
              ]
          ]);
    }


    public function fixHoursBySupervisor(Request $request, $id)
    {

        $record = DB::table('tbl_pln_emp_attendence')->where('id', '=', $id)->first();
        $total_time = $this->calculateTotalHours($request->time_in, $request->time_out, $record->date_in);

        DB::table('tbl_pln_emp_attendence')->where('id', '=', $id)
            ->update(['time_in' => $request->time_in, 'time_out' => $request->time_out, 'total_time' => $total_time]);

        return response() -> json([
                'status' => 1,
                'message' => 'Employee attendance record updated',
            ]);
    }


    public function employeeWorkHoursApprovedBySupervisor($id)
    {

        DB::table('tbl_pln_emp_attendence')->where('id', '=', $id)
            ->update(['approved_by_supervisor' => 1]);

        return response() -> json([
                'status' => 1,
                'message' => 'Employee attendance approved successfully',
            ]);

    }

    /*public function aprroveWeeklyAttendance(Request $request)
    {

        $year = substr($request->weeknumber, 0, 4);
        $week = substr($request->weeknumber, 4);
        $week_array = $this->getWeekDates($week,$year);

        for($i = 0; $i < 5; $i++)
        {
            DB::table('tbl_pln_emp_attendence')->where('employee_id', '=', $request->employee_id)->where('date_in', '=', $week_array[$i]['date'])
                ->update(['approved_by_supervisor' => 1]);
        }

        return response() -> json([
                'status' => 1,
                'message' => 'Employee Weekly attendance approved successfully'
            ]);
    }*/
    public function aprroveWeeklyAttendance(Request $request)
    {
        // return " GNS";
        $rules = [
            "weeknumber" => ['required', 'max:100'],
            "employee_id" =>  ['required'],
            "projectId" =>  ['required'],
            "planId" =>  ['sometimes'],
            "File" =>  ['sometimes', 'max:10000','mimes:pdf,doc,docx,jpg,jpeg,png,bmp'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {


            // return $request->input();
            if ($request->file('File')) { //return " GNSses";
                $image = $request->file('File');
                $destinationPath = 'uploads/weekcard/WeekStaatAttachByCustomer/'.$request->weeknumber.'/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                //$input['File'] = "$profileImage";
                FileUploadsInWeekstaat::create([
                    'WeekNumber' => $request->weeknumber,
                    'ProjectId' => $request->projectId,
                    'PlanningId' => $request->planId,
                    'FileName' => $profileImage,
                ]);
            }

            $year = substr($request->weeknumber, 0, 4);
            $week = substr($request->weeknumber, 4);
            $week_array = $this->getWeekDates($week, $year);

            for ($i = 0; $i < 5; $i++) {
                DB::table('tbl_pln_emp_attendence')->where('employee_id', '=', $request->employee_id)->where('date_in', '=', $week_array[$i]['date'])
                    ->update(['approved_by_supervisor' => 1]);
            }

            return response()->json([
                'status' => 1,
                'message' => 'Employee Weekly attendance approved successfully'
            ]);
        }
    }
    public function TESTAPPROVE(Request $request)
    {
//return $request->input();
        $year = substr($request->weeknumber, 0, 4);
        $week = substr($request->weeknumber, 4);
        $week_array = $this->getWeekDates($week,$year);
//return $week_array ;
        $counts = WeekCard::where("Weeknumber",$request->weeknumber)->where("Project_Id",$request->ProjectId)->count();
//       return $counts;
//        die();
        for($i = 0; $i < 5; $i++)
        {
            DB::table('tbl_pln_emp_attendence')->where('employee_id', '=', $request->employee_id)->where('date_in', '=', $week_array[$i]['date'])
                ->update(['approved_by_supervisor' => 2]);
        }

        return response() -> json([
            'status' => 1,
            'message' => 'Employee Weekly attendance approved successfully'
        ]);
    }

    ////////////////////////////////////////// Private functions below /////////////////////////////////////////////////

    private function calculateTotalHours($startTime, $endTime, $date)
    {
        $end_time       = date('H:i', strtotime($endTime));
        $endDateFromat  = $date . ' ' . $end_time;
        $endDateFromat  = Carbon::parse($endDateFromat);

        $startDateFormat = $date . ' ' . $startTime;
        $startDateFormat = Carbon::parse($startDateFormat);

        $total_time_in_min = $endDateFromat->diffInMinutes($startDateFormat);
        $hours = intval($total_time_in_min/60);
        $minutes = $total_time_in_min - ($hours * 60);

        $total_time = $hours . ':' . $minutes;

        return $total_time;

    }

    private function getWeekDates($week, $year) {
          $dto = new DateTime();
          $dto->setISODate($year, $week);
          $week_dates = [];
          $record = [];

          for($i = 0; $i < 5; $i++)
          {
              $date = $dto->format('Y-m-d');
              $day  = $dto->format('l');
              $record['date'] = $date;
              $record['day'] = $day;
              // array_push($week_dates, $date);
              array_push($week_dates, $record);
              $dto->modify('+1 day');
          }

          return $week_dates;
    }

}
