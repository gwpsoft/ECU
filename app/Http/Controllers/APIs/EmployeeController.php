<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Projects;

use DateTime;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use Config;
use Hash;
use App\Employee;


class EmployeeController extends Controller
{
    public function __construct()
    {
    $this->middleware('jwt');
    }

    public function getEmployeePlanningHistory()
    {
//        $contact = User::where('id', '=', Auth::id())->pluck('contact_id');
        $contact = User::where('id', '=', Auth::id())->pluck('contact_id');

        $currentWeek = date('YW');

        $GetUserPlannings = DB:: table('tbl_planing_employee')->select('tblproject.Id as project_id', 'tblproject.Name as project_name', 'tblproject.Location as Location', 'tblproject.Address as Address', 'tblproject.Zipcode as Zipcode', 'tblproject.City as City', 'tbl_planing_employee.date as plan_date', 'tbl_planing_employee.plan_id as plan_id', 'tbl_planing_employee.Notes as Notes', 'tbl_planing_employee.Geschikt', 'tblfunctie.name as functie', 'tbl_planing_employee.employee_id', 'tbl_planing_employee.week_no')
            ->join('tblproject', 'tbl_planing_employee.project_id', '=', 'tblproject.Id')
            ->join('tblfunctie', 'tbl_planing_employee.Geschikt', '=', 'tblfunctie.code', 'LEFT')
            ->where('employee_id', '=', $contact)
            ->where('week_no', '=', $currentWeek)
            ->orderBy('tbl_planing_employee.date', 'DESC')
            // ->take(7)
            ->get();
$data=[];
        foreach ( $GetUserPlannings as  $GetUserPlanning)
        {
            $FCM = DB::table('tblproject')->select('users.FCM_Token as FCM')
                ->join('users' , 'tblproject.Contact_Id', '=' , 'users.contact_id')
                ->where('tblproject.id',$GetUserPlanning->project_id)
                ->first();
            $GetUserPlanning->FCM = $FCM->FCM;
            $data[] = $GetUserPlanning;

        }
        $GetUserPlannings = $data;

        return response()->json([
            'status' => 1,
            'data' => [
                'currentWeek' => $currentWeek,
                'count' => sizeof($GetUserPlannings),
                'records' => $GetUserPlannings
            ]
        ]);


    }


    public function getEmployeePlanning(Request $request)
    {
        // return $request->all();
        $project_id = $request->project_id;
        $emp_id = $request->emp_id;
        $date_in = date('Y-m-d', strtotime($request->plan_date));
        $check_in_time = null;
        $check_out_time = null;
        $check_in_location = null;
        $check_out_location = null;
        $did_check_in = DB::table('tbl_pln_emp_attendence')
            ->where('project_id', $project_id)
            ->where('employee_id', $emp_id)
            ->where('date_in', $date_in)
            ->first();
        if ($did_check_in) {
            $check_in_time = $did_check_in->time_in;
            $check_in_location = json_decode($did_check_in->check_in_location);
        }

        $did_check_out = DB::table('tbl_pln_emp_attendence')
            ->where('project_id', $project_id)
            ->where('employee_id', $emp_id)
            ->where('date_out', $date_in)
            ->first();
        if ($did_check_out) {
            $check_out_time = $did_check_out->time_out;
            $check_out_location = json_decode($did_check_in->check_out_location);
        }

        $weekly_hours = $this->getEmployeeWeeklyWorkingHours($request->emp_id, $request->plan_date);
        $weekly_hours = number_format((float)$weekly_hours, 2, '.', '');;

        $project_details = DB::table('tblproject')
            ->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id')
            ->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
            ->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
            ->select('tbldepartment.Name as DeptName', 'tblproject.Name as project_name', 'tblproject.Address as Address', 'tblcustomer.Name as CustomerName', 'tblcontact.Id as Contact_ID', 'tblcontact.mobile as Contact_phone', 'tblcontact.Firstname as Contact_Firstname', 'tblcontact.Lastname as Contact_Lastname', 'tblproject.Zipcode', 'tblproject.City', 'tblproject.Location as Location')
            ->where('tblproject.Id', $project_id)->first();
        // return Response:: json($project_details);
        return response()->json([
            'status' => 1,
            'data' => [
                'project_details' => $project_details,
                'did_check_in' => (bool)$did_check_in,
                'check_in_time' => $check_in_time,
                'check_in_location' => $check_in_location,
                'did_check_out' => (bool)$did_check_out,
                'check_out_time' => $check_out_time,
                'check_out_location' => $check_out_location,
                'weekly_hours' => $weekly_hours

            ]
        ]);

    }

    public function employeeCheckIn(Request $request)
    {
        $time_in = $request->time_in;
        $date_in = date("Y-m-d", strtotime($request->date_in));

        $timeFormat = date('h:i A', strtotime($time_in));
        $project_id = $request->project_id;
        $emp_id = $request->emp_id;
        $plan_id = $request->plan_id;
        $check_in_location = json_encode($request->check_in_location);

        $InsertTimeIn = array(
            'plan_id' => $plan_id,
            'employee_id' => $emp_id,
            'project_id' => $project_id,
            'date_in' => $date_in,
            'time_in' => $timeFormat,
            'check_in_location' => $check_in_location,
            'created_at' => date('y-m-d  H:i:s')
        );

        DB::table('tbl_pln_emp_attendence')->insert($InsertTimeIn);

        return response()->json([
            'status' => 1,
            'message' => 'Checked in successfully'
        ]);

    }


    public function employeeCheckOut(Request $request)
    {
        $end_time = date('H:i', strtotime($request->time_out));
        $endDateFromat = $request->date_out . ' ' . $end_time;
        $endDateFromat = Carbon::parse($endDateFromat);

        $time_out = $request->time_out;
        $date_out = date("Y-m-d", strtotime($request->date_out));
        $project_id = $request->project_id;
        $emp_id = $request->emp_id;
        $plan_id = $request->plan_id;
        $check_out_location = json_encode($request->check_out_location);

        $data = DB::table('tbl_pln_emp_attendence')->where('project_id', $project_id)
            ->where('employee_id', $emp_id)
            ->where('plan_id', $plan_id)
            ->where('date_in', $date_out)
            ->first();

        $start_time = date('H:i', strtotime($data->time_in));
        // calculating total time
        $startDateFormat = $request->date_out . ' ' . $start_time;
        $startDateFormat = Carbon::parse($startDateFormat);
        $total_time_in_min = $endDateFromat->diffInMinutes($startDateFormat);

        $hours = intval($total_time_in_min / 60);
        $minutes = $total_time_in_min - ($hours * 60);

        $total_time = $hours . ':' . $minutes;
        $timeFormat = date('h:i A', strtotime($request->time_out));

        $oldRecord = DB::table('tbl_pln_emp_attendence')
            ->where('project_id', $project_id)
            ->where('employee_id', $emp_id)
            ->where('plan_id', $plan_id)
            ->where('date_in', $date_out)
            ->update(['time_out' => $timeFormat, 'date_out' => $date_out, 'total_time' => $total_time, 'check_out_location' => $check_out_location]);

        return response()->json([
            'status' => 1,
            'message' => 'Checked out successfully'
        ]);

    }

    //////////////////////////////////// PRIVATE FUNCTIONS BELOW ////////////////////

    private function getEmployeeWeeklyWorkingHours($emp_id, $date)
    {
        $weekNumber = $this->getWeekNumber($date);
        $week = substr($weekNumber, 4, 2);
        $year = substr($weekNumber, 0, 4);
        $week_dates = $this->getWeekDates($week, $year);
        $total_hours = $this->calculateWorkingHours($emp_id, $week_dates);
        return $total_hours;
    }

    private function getWeekNumber($comingDate)
    {
        $weekNumber = date("YW", strtotime($comingDate));
        return $weekNumber;
    }

    private function getWeekDates($week, $year)
    {
        $dates = [];
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        for ($i = 0; $i < 5; $i++) {
            $date = $dto->format('Y-m-d');
            array_push($dates, $date);
            $dto->modify('+1 days');
        }
        return $dates;
    }

    private function calculateWorkingHours($emp_id, $week_dates)
    {
        $sum_hours = 0;
        for ($i = 0; $i < 5; $i++) {
            $hours = DB::table('tbl_pln_emp_attendence')->select('total_time')
                ->where('employee_id', '=', $emp_id)
                ->where('date_in', '=', $week_dates[$i])
                ->first();

            if ($hours) {
                $hours = str_replace(':', '.', $hours->total_time);;
                $sum_hours += floatval($hours);
            }
        }

        return $sum_hours;
    }

    public function SendEmail(Request $request)
    {
        Config::set('mail.driver', env('CONTACT_DRIVER'));
        Config::set('mail.host', env('CONTACT_HOST'));
        Config::set('mail.port', env('CONTACT_PORT'));
        Config::set('mail.encryption', env('CONTACT_ENCRYPTION'));
        Config::set('mail.username', env('CONTACT_MAIL'));
        Config::set('mail.password', env('CONTACT_PASSWORD'));
        $rules = [

            'Email' => ['required', 'email', 'unique:users'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {
            $ValidData = $request->input();
        }
        $Code = rand(0, 9999) + 1000;
        $affected = DB::table('password_resets')
            ->where('email', $ValidData['Email'])
            ->update(['status' => 2]);
        $email = DB::table('password_resets')->insert([
            'email' => $ValidData['Email'],
            'token' => $Code,
            'times' => time(),

        ]);
        if ($email) {
            $emails = $ValidData['Email'];
            Mail::raw($Code, function ($message) use ($emails) {
                $message->to($emails)
                    ->subject
                    ('Update Email');
                // $message->html("true");
                //$message->from('thedeveloper00000@gmail.com','HAMZA SAAb');
                $message->from('planning@easycleanup.nl', 'Planing');
            });
            return response()->json([
                'Message' => "Verification Send to your Email",
                'Status' => "Success"
            ], 200);
        } else {
            return response()->json([
                'Message' => "Your Request can't proceed Please try again later",
                'Status' => "Fail"
            ], 201);
        }
    }

    public function UpdateEmail(Request $request)
    {
        $rules = [

            'Email' => ['required', 'email', 'unique:users'],
            "CODE" => ['required'],
            "UserId" => ['required'],

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {
            $ValidData = $request->input();
        }

        $email = DB::table('password_resets')->where("email", $ValidData['Email'])->where("status", 0)->orderBy('id', 'DESC')->first();
        if ($email) {
//            return  $ValidData['CODE'];
            if ($email->token == $ValidData['CODE']) {
                $affected = DB::table('password_resets')
                    ->where('id', $email->id)
                    ->update(['status' => 1]);
                $User = User::find($ValidData['UserId']);
                if ($User) {
                    $User->email = $ValidData['Email'];
                    $User->save();
                    return response()->json([
                        'Message' => "Your Email Has been Updated",
                        'Status' => "Success"
                    ], 200);
                } else {
                    return response()->json([
                        'Message' => "User not Exist",
                        'Status' => "Fail"
                    ], 201);
                }
            } else {
                return response()->json([
                    'Message' => "Code Not Matched Please Try Again",
                    'Status' => "Fail"
                ], 201);
            }
        } else {
            return response()->json([
                'Message' => "Request not Found to change Email",
                'Status' => "Fail"
            ], 201);
        }
    }

    public function ChangePassword(Request $request)
    {
        $rules = [

            'Password' => ['required', 'min:6'],
            'CurrentPass' => ['required'],
            "UserID" => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {
            $ValidData = $request->input();
        }
        $User = User::find($ValidData['UserID']);
        // return $User;
        if ($User) {
            if (Hash::check($ValidData['CurrentPass'], $User->password)) {
                $User->password = bcrypt($ValidData['Password']);
                $User->txt_password = $ValidData['Password'];
                $User->save();
                return response()->json([
                    'Message' => "Your Password has been Changed",
                    'Status' => "Success"
                ], 200);
            } else {
                return response()->json([
                    'Message' => "Password Do not Matched to Old Password",
                    'Status' => "Fail"
                ], 201);
            }
        } else {
            return response()->json([
                'Message' => "User no exist",
                'Status' => "Fail"
            ], 201);
        }
    }

    public function ChangeName(Request $request)
    {
        $rules = [

            'name' => ['required', 'max:100'],
            "UserID" => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {
            $ValidData = $request->input();
        }
        $User = User::find($ValidData['UserID']);
        // return $User;
        if ($User) {
            $User->name = $ValidData['name'];
            $User->save();
            $User = User::select("name")->find($ValidData['UserID']);
            return response()->json([
                'Message' => "Your Name has been Changed",
                'Status' => "Success",
                'data' => $User
            ], 200);
        } else {
            return response()->json([
                'Message' => "User not exist",
                'Status' => "Fail",

            ], 201);
        }

    }

    function EmployeeWorkHistory(Request $request)
    {
        // $weekFrom = null;
        // $yearFrom = null;
        // $weekTo   = null;
        // $yearTo   = null;
        $total = 0;

        $employee = Employee::find($request->Id);
        // $employee = Employee::find($id);
        $data = [];
        if ($employee) {
            $records = DB::select('
						select t.id, t.Weekcard_Id as Weekcard_Id, w.Weeknumber, p.id as project_id, p.Address As Adress, p.Name as Project_name, ea.Name as emp_name,
						t.Mon, t.Tue, t.Wed, t.Thu, t.Fri, t.Sat, t.Sun, SUM(t.Mon + t.Tue + t.Wed+ t.Thu+ t.Fri+ t.Sat + t.Sun) as Total

						from tbltimecard t
						inner join tblweekcard w
						on t.Weekcard_Id = w.id
						inner join tblproject p
						on w.Project_Id = p.Id
						INNER JOIN tblemploymentagency ea
						on t.Employmentagency_id = ea.id
						where t.Employee_Id =' . $request->Id . '

						GROUP BY t.id
			');
            return response()->json( $records, 200);
        } else {
            return response()->json([
                'Message' => "User not exist",
                'Status' => "Fail",
                'data' => $data
            ], 201);
        }

    }
    public function GetProjectManager(Request  $request)
    {
       //return response()->json($request->input());
       // ProjectId
        //$project = Projects::find($request->ProjectId);
        $project = DB::table('tblproject')
            ->Join('tblprojectmanager', 'tblproject.Projectmanager_Id', '=', 'tblprojectmanager.id')
            ->where('tblproject.id',$request->ProjectId)
            ->get();
        return response()->json($project);
    }
}
