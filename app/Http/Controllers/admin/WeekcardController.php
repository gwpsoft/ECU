<?php

namespace App\Http\Controllers\admin;
use App\Weekcard;
use App\Status;
use App\reports;
use App\Projects;
use App\Comment;
use App\WeekCardAttachment;
use App\EmploymentAgencyWeeklyReportDetail;
use App\Http\Requests\WeekstateRequest;
use App\Http\Requests\DocumentWeekcardRequest;
//use App\Mail\TESTMAIL;
//use Illuminate\Support\Facades\Mail;
use Config;
use Session;
use Mail;
use Validator;
use DB;
use PDF;
use Input;
use Photo;
use Image;
use DateTime;

use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class WeekcardController extends Controller
{
    //

    public function GetAllWeekstate () {

        /*$week_model = new Weekcard();
        $AllWeekState = $week_model->GetAllWeekState();
        return View('admin.weekstate.allweekstate',compact('AllWeekState'));*/
        return View('admin.weekstate.allweekstate_ajax');
    }
    public function AddWeekstate() {

        $week_model = new Weekcard();
        $AllProjects = $week_model->GetAllProjects();

        return View('admin.weekstate.create',compact('AllProjects'));
    }

    public function AddWeekstaat($ProjectID = 0) {

        $week_model = new Weekcard();
        $AllProjects = $week_model->GetAllProjects();

        return View('admin.weekstate.create',compact('AllProjects','ProjectID'));
    }

    public function AllStatus() {

        $status_model = new Status();
        $AllStatus = $status_model->scopeget();
        //dd($AllStatus);
        return View::make('admin.weekstate.edit',compact('AllStatus'));
    }



    public function PostWeekstate (WeekstateRequest $request) {

//print_r($_POST); die;
        if (empty($request->Checked) ) { $check = 0;} else { $check = 1; }
        if (empty($request->Werkbrifje) ) { $Werkbrifje = 0;} else { $Werkbrifje = 1; }
        $data = array (
            'Weeknumber' => $request->year.$request->week,
            'Project_Id' => $request->Project_Id,
            'Sent_Date' => $request->Sent_Date,
            'Received_Date' =>$request->Received_Date,
            'Checked' => $check,
            'Werkbrifje' => $Werkbrifje,
            'Notes' => $request->Notes,
            'Billing_Date' => $request->Billing_Date,
            'Billing_no' => $request->Billing_no,
            'Internal_Notes' => $request->Internal_Notes ,
            'created_at' => time(),
            'updated_at' => time()

        );

        $week_ID = DB::table('tblweekcard')->insertGetId($data);
        //echo $week_ID; die;
        if (!empty($request->Save)) {
            Session::flash('message', ' Nieuwe weekstaat is met success toegevoegd.');
            return redirect('admin/Edit-weekstaat/'.$week_ID);
            //return redirect('admin/weekcard');
        }
        if (!empty($request->Save_Close)) {
            Session::flash('message', ' Nieuwe weekstaat is met success toegevoegd.');
            return redirect('admin/weekcard');
        }

        if (!empty($request->Save_New)) {
            Session::flash('message', ' Nieuwe weekstaat is met success toegevoegd.');
            return redirect('admin/Add-New-weekstaat');
        }


    }

    public function ProjectApproved ($id) {

        DB:: table( 'tblweekcard' )-> where( 'id' , '=' , $id)-> update( array('Checked' => 1, 'Received_Date'=> date('Y-m-d') ));
        Session::flash('message', 'Project succesvol goedgekeurd....');
        return redirect('admin/weekcard');
    }

    public function ProjectDisapproved ($id) {

        DB:: table( 'tblweekcard' )-> where( 'id' , '=' , $id)-> update( array('Checked' => 0 ));
        Session::flash('message', 'Project succesvol afgekeurd....');
        return redirect('admin/weekcard');
    }


    public function EditWeekstate($id)
    {
        $week_model = new Weekcard();
        //return $week_model;
        //$comment_model = new Comment();
        $AllProjects = $week_model->GetAllProjects();
        $AllEmployees = $week_model->GetAllEmployees();
        //$AllEmployees = $week_model->EmployeesInProject($id);
        // return $AllEmployees;
        $GetWeekCardDetails = $week_model->GetWeekCardDetails($id);
        $GetTimeCards = $week_model->GetTimeCards($id);

// ////////////////////////////////////////////////////////////////

        $week_ID = $id;
        $InPro = [];
        foreach ($GetTimeCards as $time) {
            $InPro[] = $time->Employee_Id;
        }
        $WEEKSTAAT = Weekcard::findorfail($week_ID);
        $year = substr($WEEKSTAAT->Weeknumber, 0, 4);
        $week = substr($WEEKSTAAT->Weeknumber, 4);
        $WEEKARRAY = $this->getWeekDates($week, $year);
        $EMPDATA = DB::table('tbl_planing_employee')->distinct()->select('employee_id')->where('week_no', $WEEKSTAAT->Weeknumber)->where('project_id', $WEEKSTAAT->Project_Id)->whereNotIn('employee_id', $InPro)->get();

        foreach ($EMPDATA as $DAT) {
            $attendence = [];
            $total_hours = 0;
            for ($i = 0; $i < 5; $i++) {
                //$DAT->WEEK_ATTEND = DB::table('tbl_pln_emp_attendence')->where('employee_id', $DAT->employee_id)->where('project_id', $WEEKSTAAT->Project_Id)->get();

                $attend = DB::table('tbl_pln_emp_attendence')->where('employee_id', '=', $DAT->employee_id)->where('project_id', $WEEKSTAAT->Project_Id)->where('date_in', '=', $WEEKARRAY[$i]['date'])
                    ->first();
                $attendence[] = ["Attendence" => $attend,"day"=>$WEEKARRAY[$i]['day'],"DATE"=>$WEEKARRAY[$i]['date']];
              //  $total_hours += $attend ?  $attend ->total_time :0.00;
              $total_hours += $attend && is_numeric($attend->total_time) ? calculateDecimalTime($attend->total_time) : 0.00;
            }
            $Employee = DB::table('tblemployee')
                ->select('tblemployee.Cost')
                //->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
                ->where('tblemployee.id',$DAT->employee_id)->first();
            //echo $result['Cost'] =  $Employee_details->Cost;
            //die;
            $project = DB::table('tblproject')
                ->select('tblproject.Rate')
                //->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
                ->where('tblproject.Id',$WEEKSTAAT->Project_Id)->first();

//            $Employee_details = array (
//                'Cost' => $Employee->Cost,
//                'Rate' => $project->Rate
//            );
            $DAT->TOTAL_HOURS  = $total_hours ? $total_hours : '0.00' ;
            $DAT->RATE_COST = array ( 'Cost' => $Employee->Cost,'Rate' => $project->Rate);
            $DAT->WEEK_ATTEND = $attendence;

        }

// ////////////////////////////////////////////////////////////////
//return $EMPDATA;
        $Project_DTL = DB::table('tblproject')->where('Id', $GetWeekCardDetails->Project_Id)->first();
        $Comments = DB::table('tblcomments')->select('*')->orderBy('comments', 'ASC')->get();

        if (empty($GetWeekCardDetails)) {
            return redirect('admin/404');
        }

        /*echo '<pre>';
        print_r($Comments);
        die;*/

        $weekCard = Weekcard::findOrFail($id);

        return View('admin.weekstate.edit', compact('AllProjects', 'GetWeekCardDetails', 'AllEmployees', 'GetTimeCards', 'Comments', 'Project_DTL', 'id', 'weekCard','EMPDATA'));
    }
    function calculateDecimalTime($time)
    {

    $time_parts = explode(':', $time);
    $hours = intval($time_parts[0]);
    $minutes = intval($time_parts[1]);

    $decimal_time = $hours + ($minutes / 60);

    return $decimal_time;

    }


    /////////////////////// Weekcard attachment work starts here ///////////////////

    public function uploadWeekstaatDocument(Request $request)
    {
        $this->validate($request, [
            'note'  => 'required',
            'File'  => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,bmp',
        ],[
            'note.required' => 'Notitieveld is verplicht'
        ]);

        $now = Carbon::now();
        $now = $now->year . $now->month;

        // move file on destination folder
        $post = $request->all();
        $file = $post['File'];
        $destinationPath = 'uploads/weekcard/document/' . $now;
        $filename 			 = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
        // dd($destinationPath . '/' . $filename);
        $post['File']->move($destinationPath,$filename);

        // storing records in database table
        $attachment = new WeekCardAttachment;
        $attachment->weekcard_id = $request->weekcard_id;
        $attachment->note 			 = $request->note;
        $attachment->added 			 = Carbon::now();
        $attachment->filename 	 = $filename;
        $attachment->file_path 	 = $destinationPath . '/' . $filename;
        $attachment->save();

        // Flash message
        Session::flash('message', 'Document met succes geüpload');
        // return redirect('admin/Edit-weekstaat/'.$request->weekcard_id);
        return redirect() -> back();

    }

    public function deleteWeekstaatDocument($id)
    {
        $file = WeekCardAttachment::findOrFail($id);
        //remove from drive
        unlink($file->file_path);
        // delete DB record
        $file->delete();

        // Flash message
        Session::flash('message', 'Document succesvol verwijderd');

        return redirect() -> back();

    }

    public function editWeekstaatDocument($id)
    {
        $file = WeekCardAttachment::findOrFail($id);

        return response() -> json([
            'data' => [
                'id'   => $file->id,
                'weekCardID' => $file->weekcard_id,
                'note' => $file->note
            ]
        ], 200);
    }

    public function updateUploadWeekstaatDoc(Request $request)
    {
        $this->validate($request, [
            'note'  => 'required',
        ],[
            'note.required' => 'Notitieveld is verplicht'
        ]);

        // storing records in database table
        $attachment = WeekCardAttachment::findOrFail($request->fileId);
        $attachment->weekcard_id = $request->weekCardID;
        $attachment->note 			 = $request->note;
        $attachment->added 			 = Carbon::now();

        $attachment->save();


        // Flash message
        Session::flash('message', 'Document succesvol bijgewerkt');

        return redirect() -> back();


    }

    public function ViewWeekstate($id) {

        $week_model = new Weekcard();
        $AllProjects = $week_model->GetAllProjects();
        $AllEmployees = $week_model->GetAllEmployees();
        $GetWeekCardDetails = $week_model->GetWeekCardDetails($id);
        $GetTimeCards = $week_model->GetTimeCards($id);
        /*echo '<pre>';
        print_r($GetWeekCardDetails);
        die;	*/

        $Project_DTL = DB::table('tblproject')->where('Id',$GetWeekCardDetails->Project_Id)->first();

        return View('admin.weekstate.view',compact('AllProjects','GetWeekCardDetails','AllEmployees','GetTimeCards', 'Project_DTL'));
    }

    public function ViewWeekStateAjaxCall($id) {
        $week_model 		= new Weekcard();
        // $AllProjects 		= $week_model->GetAllProjects();
        // $AllEmployees 		= $week_model->GetAllEmployees();
        $GetWeekCardDetails = $week_model->GetWeekCardDetails($id);
        $GetTimeCards 		= $week_model->GetTimeCards($id);
        // $GetTimeCards		= $GetTimeCards[0];
        $GetTimeCards		= $GetTimeCards;
        $Project_DTL 		= DB::table('tblproject')->where('Id',$GetWeekCardDetails->Project_Id)->first();

        $weekNum = Weekcard::findOrFail($id);
        $projectName = $weekNum->project->Name;
        // $contact = $weekNum->project->Contact_id;

        $project_id = $weekNum->Project_Id;
        $project_details = DB::table('tblproject')
            ->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
            ->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
            ->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
            ->join('tblshippingcompany', 'tblproject.Shippingcompany_id', '=', 'tblshippingcompany.Id', 'left')
            ->select('tblproject.*', 'tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email','tbldepartment.Id as DeptID',
                'tblproject.Notes as pro_Note','tblcontact.Id as Contact_ID','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname','tblshippingcompany.Email as ShipEmail')
            ->where('tblproject.Id',$project_id)->first();

        return response() -> json([
            'data' => [
                // 'AllProjects'		 	 	 => $AllProjects,
                'GetWeekCardDetails' => $GetWeekCardDetails,
                // 'AllEmployees'		 	 => $AllEmployees,
                'GetTimeCards'		 	 => $GetTimeCards,
                'Project_DTL'		 		 => $Project_DTL,
                'projectName'		 		 => $projectName,
                // 'contact'		 				 => $contact,
                'project_details'		 => $project_details,
            ]
        ], 200);

    }

    function Update_WeekStaat () {



        $id = Input::get('id');
        if (empty(Input::get('Checked')) ) { $check = 0;} else { $check = 1; }
        if (empty(Input::get('Werkbrifje')) ) { $Werkbrifje = 0;} else { $Werkbrifje = 1; }
        $data = array (
            'Sent_Date' => Input::get('Sent_Date') ,
            'Received_Date' => Input::get('Received_Date') ,
            'Project_Id' => Input::get('Project_Id') ,
            'status_id' => Input::get('status_id') ,
            'Checked' => $check,
            'Werkbrifje' => $Werkbrifje,
            'Billing_Date' => Input::get('Billing_Date'),
            'Billing_no' => Input::get('Billing_no') ,
            'Notes' => Input::get('Notes') ,
            'Internal_Notes' => Input::get('Internal_Notes') ,
            'updated_at' =>time()
        );
        //dd($data);
        $week_model = new Weekcard();
        $GetWeekCardDetails = $week_model->UpdateWeekCard($id,$data);

        if (!empty(Input::get('Save'))) {
            Session::flash('message', ' Weekcard succesvol bijgewerkt..');
            return redirect('admin/Edit-weekstaat/'.$id);
            //return redirect('admin/weekcard');
        }
        if (!empty(Input::get('Save_Close'))) {
            Session::flash('message', ' Weekcard succesvol bijgewerkt..');
            return redirect('admin/weekcard');
        }

        if (!empty(Input::get('Save_New'))) {
            Session::flash('message', ' Weekcard succesvol bijgewerkt..');
            return redirect('admin/Add-New-weekstaat');
        }





        /*Session::flash('message', ' Weekcard succesvol bijgewerkt..');
        return redirect('admin/weekcard');	*/
    }
    function PostWeekCardMultiple(Request $request)
    {
//       return $request->input();
//        return Input::get('Checked');
        for($i =0; $i<count(Input::get('Employee_Id')) ; $i++)
        {
            // echo Input::get('Employee_Id')[$i]."<br>";
            $explode = explode('_', Input::get('Employee_Id')[$i]);
            //  return $explode;
            $Employee_Id = $explode[0];
            $Employmentagency_id = $explode[1];
            $week_ID = Input::get('weekcard_id');
            if (empty(Input::get('Checked')[$i])) {
                $check = 0;
            } else {
                $check = 1;
            }
            if (Input::get('notes')[$i] == 'other') {
                $Note = Input::get('note_other')[$i];
            } else {
                $Note = Input::get('notes')[$i];
            }

            $data = array(
                'Weekcard_Id' => Input::get('weekcard_id'),
                'Employee_Id' => $Employee_Id,
                'Mon' => Input::get('hours_0')[$i],
                'Tue' => Input::get('hours_1')[$i],
                'Wed' => Input::get('hours_2')[$i],
                'Thu' => Input::get('hours_3')[$i],
                'Fri' => Input::get('hours_4')[$i],
                'Sat' => Input::get('hours_5')[$i],
                'Sun' => Input::get('hours_6')[$i],
                'Rate' => Input::get('rate')[$i],
                'Rate_Cost' => Input::get('rate_cost')[$i],
                'Billable' => 1,
                'Notes' => $Note,
                'Employmentagency_id' => $Employmentagency_id,
            );
            // return $data;
            $week_model = new Weekcard();
            $AllProjects = $week_model->AddTimeCard($data);
        }


        Session::flash('message', 'Time Card succesvol ingevoegd !');
        return redirect()->back();
        // if (!empty(Input::get('weekprojects'))) {
        // 	return redirect('admin/ProjectsByWeek/' . Input::get('Weeknumber'));
        // } else {
        // 	return redirect('admin/Edit-weekstaat/' . $week_ID);
        // }
    }
    function PostWeekCard () {

        $explode = explode('_',Input::get('Employee_Id'));
        $Employee_Id = $explode[0];
        $Employmentagency_id = $explode[1];
        $week_ID = Input::get('weekcard_id');
        if (empty(Input::get('Checked') )) { $check = 0;} else { $check = 1; }
        if (Input::get('notes') == 'other') {
            $Note = Input::get('note_other');
        } else {
            $Note = Input::get('notes');
        }

        $data = array (
            'Weekcard_Id' => Input::get('weekcard_id'),
            'Employee_Id' => $Employee_Id,
            'Mon' => Input::get('hours_1'),
            'Tue' => Input::get('hours_2'),
            'Wed' => Input::get('hours_3'),
            'Thu' => Input::get('hours_4'),
            'Fri' => Input::get('hours_5'),
            'Sat' => Input::get('hours_6'),
            'Sun' => Input::get('hours_7'),
            'Rate' => Input::get('rate'),
            'Rate_Cost' => Input::get('rate_cost'),
            'Billable' => $check,
            'Notes' => $Note,
            'Employmentagency_id' => $Employmentagency_id,
        );

        $week_model = new Weekcard();
        $AllProjects = $week_model->AddTimeCard($data);
        Session::flash('message', 'Time Card succesvol ingevoegd !');

        if(!empty(Input::get('weekprojects'))) {
            return redirect('admin/ProjectsByWeek/'.Input::get('Weeknumber'));
        } else {
            return redirect('admin/Edit-weekstaat/'.$week_ID);
        }
    }

    public function DeleteTimeCard ($id) {

        $week_model = new Weekcard();
        $GetTimeCardWeekID = $week_model->GetTimeCardWeekID($id);
        $week_ID = $GetTimeCardWeekID->Weekcard_Id;
        $week_model->DeleteTimeCards($id);
        Session::flash('message', 'tijd card succesvol verwijderd !');
        return redirect('admin/Edit-weekstaat/'.$week_ID);
    }

    public function DistroyTimeCard ($id) {

        $week_model = new Weekcard();
        $GetTimeCardWeekID = $week_model->GetTimeCardWeekID($id);
        $week_ID = $GetTimeCardWeekID->Weekcard_Id;
        $GetWeekCardID = $week_model->GetWeekCardDetails($GetTimeCardWeekID->Weekcard_Id);
        $week_model->DeleteTimeCards($id);
        Session::flash('message', 'tijd card succesvol verwijderd !');
        return redirect('admin/ProjectsByWeek/'.$GetWeekCardID->Weeknumber);
    }

    public function DeleteWeekstate ($id) {

        $week_model = new Weekcard();
        $week_model->DeleteWeekstate($id);
        Session::flash('message', 'Weekkaart succesvol verwijderd!');
        return redirect('admin/weekcard');
    }


    public function Update_WeekTime () {


        /*print_r($_POST);
        die;*/

        $week_model = new Weekcard();
        $week_ID = Input::get('weekcard_id');
        $Timecard_ID = Input::get('timecard_id');
        if (empty(Input::get('Checked'))) { $check = 0;} else { $check = 1; }
        if (empty(Input::get('Billable'))) { $Billable_check = 0;} else { $Billable_check = 1; }
        $data = array (
            //'Weekcard_Id' => Input::get('weekcard_id'),
            //'Employee_Id' => $Employee_Id,
            'Mon' => Input::get('hours_1'),
            'Tue' => Input::get('hours_2'),
            'Wed' => Input::get('hours_3'),
            'Thu' => Input::get('hours_4'),
            'Fri' => Input::get('hours_5'),
            'Sat' => Input::get('hours_6'),
            'Sun' => Input::get('hours_7'),
            'Rate' => Input::get('rate'),
            'Rate_Cost' => Input::get('rate_cost'),
            'Billable' => $Billable_check,
            'Notes' => Input::get('notes'),
            //'Employmentagency_id' => $Employmentagency_id,
        );
        $WeekcardData = array (
            'id' => Input::get('id'),
            'Sent_Date' => Input::get('Sent_Date'),
            'Received_Date' => Input::get('Received_Date'),
            'Project_Id' => @Input::get('Project_Id'),
            'Checked' => $check,
            'Notes' => Input::get('Notes'),
            'Internal_Notes' => Input::get('Internal_Notes') ,
            'Weeknumber' => Input::get('year').Input::get('week')
        );
        /*echo '<pre>';
        print_r($data);
        print_r($WeekcardData); die;*/
        $week_model->UpdateWeekCard(Input::get('id'),$WeekcardData);
        $UpdateTimecard = $week_model->UpdateTimecard($data,$Timecard_ID);

        if (!empty(Input::get('Save'))) {
            Session::flash('message', ' Time Card succesvol ingevoegd !');
            return redirect('admin/Edit-weekstaat/'.$week_ID);
            //return redirect('admin/weekcard');
        }
        if (!empty(Input::get('Save_Close'))) {
            Session::flash('message', ' Time Card succesvol ingevoegd !');
            return redirect('admin/weekcard');
        }

        if (!empty(Input::get('Save_New'))) {
            Session::flash('message', ' Time Card succesvol ingevoegd !');
            return redirect('admin/Add-New-weekstaat');
        }
        /*Session::flash('message', 'Time Card succesvol ingevoegd !');
        return redirect('admin/Edit-weekstaat/'.$week_ID);	*/

    }


    public function AllActiveWeekcards()
    {
        //
        $AllWeekState = DB::table('tblweekcard')->where('Checked','=',1)->orderBy('Weeknumber','DESC')->limit(500)->get();

        return View('admin.weekstate.allweekstate',compact('AllWeekState'));
    }


    public function AllInactiveWeekcards()
    {
        //ORDER BY `Weeknumber` DESC limit 500
        $AllWeekState = DB::table('tblweekcard')->where('Checked','=',0)->orderBy('Weeknumber','DESC')->limit(500)->get();


        return View('admin.weekstate.allweekstate',compact('AllWeekState'));
    }




    public function Week_Weekstaten () {

        $week_model = new Weekcard();
        //$AllProjects = $week_model->GetAllProjects();
        $AllEmployees = $week_model->GetAllEmployees();
        return View('admin.weekstate.weekstaat_projectwise',compact('AllEmployees'));
    }

    public function ProjectsByWeek ($yearWeek = 0) {


        // $week_model = new Weekcard();
        // //$AllProjects = $week_model->GetAllProjects();
        // $AllEmployees = $week_model->GetAllEmployees();
        // $Get_Projects = $week_model->GetProjectsByWeek ($yearWeek);
        // $Comments = DB::table('tblcomments')->select('*')->orderBy('comments','ASC')->get();
        // return View('admin.weekstate.weekstaat_projectwise',compact('AllProjects','AllEmployees','Get_Projects','Comments'));




        $week_model = new Weekcard();
        // $AllProjects = $week_model->GetAllProjects();
        // $AllEmployees = $week_model->GetAllEmployees();
        // $Get_Projects = $week_model->GetProjectsByWeek ($yearWeek);
        $AllEmployees = DB::table('v_allemployees')->select('*')->get();

        //$GetTimeCards = DB::table('v_allprojects')->select('*')->where('Weeknumber',$yearWeek)->orderBy('Firstname','ASC')->get();

        //$Get_Projects = DB::table('v_proejcts')->select('*')->where('Weeknumber',$yearWeek)->get();

        $Get_Projects = DB::table('v_proejcts')
        ->select('v_proejcts.*', 'file_uploads_in_weekstaats.FileName')
        ->leftJoin('file_uploads_in_weekstaats', 'v_proejcts.Project_Id', '=', 'file_uploads_in_weekstaats.projectId')
        ->where('v_proejcts.Weeknumber', $yearWeek)
        ->get();

        //dd($Get_Projects);
// dd($AllEmployees);
        // foreach ($Get_Projects as $key => $project) {
        // 	$get_time[$key] =
        // 	DB::table('v_timecards')->select('*')->where('Weekcard_Id',$project->Week_id)->orderBy('Firstname','ASC')->get();
        //
        // }
        //dd($GetTimeCards);
        $Comments = DB::table('tblcomments')->select('*')->orderBy('comments','ASC')->get();
// dd($Get_Projects);
        //return View('admin.weekstate.weekstaat_projectwise',compact('AllProjects','AllEmployees','Get_Projects','Comments'));
        return View('admin.weekstate.weekstaat_projectwise',compact('AllEmployees','Get_Projects','Comments'));

        // View('admin.weekstate.weekstaat_projectwise',compact('AllProjects','AllEmployees','Get_Projects','Comments','get_time'));
    }




    public function WeekcardPDF ($id) {

        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        if (empty($week_details)) {
            return redirect('admin/404');
        }
        $week_Employees = $week_model->GetTimeCardEmployeeByWeekID($week_details[0]->weekcard_Id);
        /*echo '<pre>';
        print_r($week_Employees);
         die;*/
        // return view('admin.weekstate.pdf', compact('week_details','week_Employees','id'));
        $pdf= PDF::loadView('admin.weekstate.pdf', compact('week_details','week_Employees','id'));
        //$pdf->setPaper('defaultPaperSize' , 'a4');
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('Weekstaat.pdf');

    }

    public function calculateRegieWorkingHours($id) {

        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        if (empty($week_details)) {
            return 0;
        }
        $week_Employees = $week_model->GetTimeCardEmployeeByWeekID($week_details[0]->weekcard_Id);

        $totalRegieHours = 0;
        $totalAangenomenHours = 0;

        foreach ($week_Employees as $record) {
            if ($record->Billable == 1) {
                $totalRegieHours += $record->Hours;

            } else {
                $totalAangenomenHours += $record->Hours;
            }

        }

        return response() ->json([
            'data' => [
                'regie' 	 => $totalRegieHours,
                'notRegie' => $totalAangenomenHours
            ]
        ], 200);

    }


    public function Weekcard_WO_Regie_PDF ($id) {

        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        if (empty($week_details)) {
            return redirect('admin/404');
        }
        $week_Employees = $week_model->GetTimeCardEmployeeByWeekID($week_details[0]->weekcard_Id);
        /*echo '<pre>';
        print_r($week_Employees);
         die;*/
        // return view('admin.weekstate.pdf_wo_regie', compact('week_details','week_Employees','id'));
        $pdf= PDF::loadView('admin.weekstate.pdf_wo_regie', compact('week_details','week_Employees','id'));
        $pdf->setPaper('defaultPaperSize' , 'a4');
        return $pdf->download('Weekstaat.pdf');

    }


    public function Weekcard_WO_Regie_email($id) {

        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        $GetEmails = DB::table('tblproject')->select('*')->where('Id','=',$week_details[0]->Project_Id)->get();
        $week_documents = $week_model->GetAttachment($id);
        //print_r($GetEmails); die;
        return View('admin.weekstate.email_wo_regie',compact('week_details','GetEmails','id','week_documents'));
    }


    public function weekcard_sent_WO_Regie() {

        $id = Input::get('weekcard_Id');
        $text = Input::get('Text');
        $weeknumber = Input::get('weeknumber');
        $Project = Input::get('Project');
        $attachment = Input::get('attachment');
        //$email = 'khurram.lucky@gmail.com'; Input::get('email');

        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        $week_Doc = $week_model->GetAttachment($id);
        if (empty($week_details)) {
            Session::flash('error', 'Email Error');
        }
        if (@Input::get('Aan')) {
            $Aan = '';
            foreach(@Input::get('Aan') as $to)
            {
                $Aan .= $to.","; //exit;
            }
            $Aan = trim($Aan, ",");
            @$AanTo = $Aan;
        }

        if (@Input:: get('Cc')) {
            $CC = '';
            foreach(@Input:: get('Cc') as $Ccto)
            {
                $CC .= $Ccto.","; //exit;
            }
            $CC = trim($CC, ",");
            @$CCTo = $CC;
        }

        $pdf['value'] = substr(@$week_details[0]->Weeknumber, -2).'-'.substr(@$week_details[0]->Weeknumber,0, -2);
        $week_Employees = $week_model->GetTimeCardEmployeeByWeekID($week_details[0]->weekcard_Id);
        //$EmployeeAgency = DB::table('tblemploymentagency')->select('Id,Email')->where('Id',$week_details[0]->Employmentagency_Id)->first();
        $pdf['pdf']= PDF::loadView('admin.weekstate.pdf_wo_regie', compact('week_details','week_Employees','id'));
        @$pdf['email']= $AanTo;
        @$pdf['email_cc'] = $CCTo;
        @$recipients['to'] =$AanTo;
        @$recipients['cc'] =$CCTo;


        if (!empty($CCTo) && !empty($AanTo)) {

            /*$Email_History = array (
                                    'Weekcard_Id' => $id,
                                    'Employmentagency_Id' => $week_details[0]->Employmentagency_Id,
                                    'Recipients' => serialize($recipients),
                                    'Datetime' => date('Y-m-d H:i:s'),
                                    'Content' => $text,
                                );
            DB::table('tblweekcard')->insert($Email_History);*/

            $EmailSent = Mail::raw($text, function($message) use ($pdf,$week_Doc,$attachment) {
                $message->to(@$pdf['email']) ->cc(@$pdf['email_cc'])
                    // ->bcc(array('planning@easycleanup.nl'))
                    // ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
                    ->bcc('administratie@easycleanup.nl','Easy Clean Up BV')
                    ->from('planning@easycleanup.nl','Easy Clean Up BV')
                    ->subject('ECU Weekstaat '.(@$pdf['value']).", Project: "." ".@$pdf['Project'])
                    ->attachData($pdf['pdf']
                        ->output(), "Weekstaat.pdf");
                if ($attachment == 'on'){
                    if(count($week_Doc > 0)) {
                        foreach($week_Doc as $file) {
                            $message->attach('uploads/weekcard/document/'.$file);
                        }
                    }
                }
            });
        }
        if (empty($CCTo) && !empty($AanTo)) {

            /*$Email_History = array (
                                        'Weekcard_Id' => $id,
                                        'Employmentagency_Id' => $week_details[0]->Employmentagency_Id,
                                        'Recipients' => serialize($recipients),
                                        'Datetime' => date('Y-m-d H:i:s'),
                                        'Content' => $text,
                                    );
                DB::table('tblweekcard')->insert($Email_History);*/



            $EmailSent = Mail::raw($text, function($message) use ($pdf,$week_Doc,$attachment) {
                $message->to(@$pdf['email'])
                    // ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
                    ->bcc('administratie@easycleanup.nl','Easy Clean Up BV')
                    //->bcc('administratie@easycleanup.nl','Easy Clean Up BV')
                    ->from('planning@easycleanup.nl','Easy Clean Up BV')
                    ->subject('ECU Weekstaat '. (@$pdf['value']).", Project: "." ".@$pdf['Project'])
                    ->attachData($pdf['pdf']
                        ->output(), "Weekstaat.pdf");
                if ($attachment == 'on'){
                    if(count($week_Doc > 0)) {
                        foreach($week_Doc as $file) {
                            $message->attach('uploads/weekcard/document/'.$file);
                        }
                    }
                }

            });
        } else {
            Session::flash('error', 'Email Error');
        }



        if (isset($pdf) && isset($EmailSent)) {

            Session::flash('message', 'Email verzonden');

        } else {

            Session::flash('error', 'Email Error');

        }

        return redirect('admin/weekcard_email_WO_Regie/'.$id);
    }



    public function Weekcard_email($id) {

        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        $week_documents = $week_model->GetAttachment($id);
        $GetEmails = DB::table('tblproject')->select('*')->where('Id','=',$week_details[0]->Project_Id)->get();
        $weekCard = Weekcard::findOrFail($id);

        //print_r($week_details); die;
        return View('admin.weekstate.email',compact('weekCard','week_details','GetEmails','week_documents','id'));
    }

    public function weekcard_sent() {
        // dd(Input::get());
        // dd(Input::get());

        Config::set('mail.driver', env('CONTACT_DRIVER'));
        Config::set('mail.host', env('CONTACT_HOST'));
        Config::set('mail.port', env('CONTACT_PORT'));
        Config::set('mail.encryption', env('CONTACT_ENCRYPTION'));
        Config::set('mail.username', env('CONTACT_MAIL'));
        Config::set('mail.password', env('CONTACT_PASSWORD'));
//            $t = Mail::raw('Text to e-mail', function ($message) {
//                $message->to('hamzaesoft@gmail.com')->bcc('planning@easycleanup.nl','Planing')
//
//                    ->subject
//                    ('TESTING');
//                // $message->html("true");
//                //$message->from('thedeveloper00000@gmail.com','HAMZA SAAb');
//                $message->from('planning@easycleanup.nl','Planing');
//            });
//            return $t;
//            dd();
        $id = Input::get('weekcard_Id');
        $text = Input::get('Text');
        $weeknumber = Input::get('weeknumber');
        $Project = Input::get('Project');
        $attachment = Input::get('attachment');
        $attachFiles = Input::get('fileid') ? Input::get('fileid') : '';

        //$email = 'khurram.lucky@gmail.com'; Input::get('email');
        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        $week_Doc = $week_model->GetAttachment($id);
        if (empty($week_details)) {
            Session::flash('error', 'Email Error');
        }
        if (@Input::get('Aan')) {
            $Aan = '';
            foreach(@Input::get('Aan') as $to)
            {
                $Aan .= $to.","; //exit;
            }
            $Aan = trim($Aan, ",");
            @$AanTo = $Aan;
        }

        // dd($Aan);

        if (@Input:: get('Cc')) {
            $CC = '';
            foreach(@Input:: get('Cc') as $Ccto)
            {
                $CC .= $Ccto.","; //exit;
            }
            $CC = trim($CC, ",");
            @$CCTo = $CC;
        }

        $pdf['value'] = substr(@$week_details[0]->Weeknumber, -2).'-'.substr(@$week_details[0]->Weeknumber,0, -2);
        $week_Employees = $week_model->GetTimeCardEmployeeByWeekID($week_details[0]->weekcard_Id);
        //$EmployeeAgency = DB::table('tblemploymentagency')->select('Id,Email')->where('Id',$week_details[0]->Employmentagency_Id)->first();
        $pdf['pdf']= PDF::loadView('admin.weekstate.pdf', compact('week_details','week_Employees','id'));
        $pdf['pdf']->setPaper('a4' , 'portrait');
        @$pdf['email']= $AanTo;
        @$pdf['email_cc'] = $CCTo;
        @$pdf['Project'] = $Project;


        $pdf['email'] = explode(",", $pdf['email']);

        if (!empty($CCTo) && !empty($AanTo)) {

            // dd("YES at correct place");
            // dd(@$pdf['email_cc']);
            /*$Email_History = array (
                                    'Weekcard_Id' => $id,
                                    'Employmentagency_Id' => $week_details[0]->Employmentagency_Id,
                                    'Recipients' => serialize($recipients),
                                    'Datetime' => date('Y-m-d H:i:s'),
                                    'Content' => $text,
                                );
            DB::table('tblweekcard')->insert($Email_History);*/

            // $EmailSent = Mail::raw($text, function($message) use ($pdf,$week_Doc,$attachment) {
            // 	$message->to(@$pdf['email'])
            // 					->cc(@$pdf['email_cc'])
            // 					->bcc(array('planning@easycleanup.nl'))
            // 					->from('planning@easycleanup.nl','Easy Clean Up BV')
            // 	//->setBody($text, 'text/html')
            // 					->subject('ECU Weekstaat '.(@$pdf['value']).", Project: "." ".@$pdf['Project'])
            // 					->attachData($pdf['pdf']
            // 					->output(), "Weekstaat.pdf");
            //
            // 	if ($attachment == 'on'){
            // 		if(count($week_Doc > 0)) {
            // 			foreach($week_Doc as $file) {
            // 				$message->attach('uploads/weekcard/document/'.$file);
            // 			}
            // 		 }
            // 	}
            // });

            $EmailSent = Mail::raw($text, function($message) use ($pdf,$week_Doc,$attachFiles) {
                $message->to($pdf['email'])
                    //	$message->to("hamzaesoft@gmail.com")

                    // ->cc("hamzaesoft@gmail.com")
                    ->cc("planning@easycleanup.nl")
                    ->bcc("planning@easycleanup.nl")
                    // ->bcc('planning@easycleanup.nl')
                    //->bcc('planning.ecu@outlook.com','Easy Clean Up BV')
                    ->from('planning@easycleanup.nl','Easy Clean Up BV')
                    //->setBody($text, 'text/html')
                    ->subject('ECU Weekstaat '.($pdf['value']).", Project: "." ".$pdf['Project'])
                    ->attachData($pdf['pdf']
                        ->output(), "Weekstaat.pdf");

                if ($attachFiles){
                    $files = WeekCardAttachment::whereIn('id', $attachFiles)->get();
                    foreach($files as $file) {
                        $message->attach($file->file_path);
                    }
                }
            });

        }
        elseif (empty($CCTo) && !empty($AanTo)) {

            /*$Email_History = array (
                                    'Weekcard_Id' => $id,
                                    'Employmentagency_Id' => $week_details[0]->Employmentagency_Id,
                                    'Recipients' => serialize($recipients),
                                    'Datetime' => date('Y-m-d H:i:s'),
                                    'Content' => $text,
                                );
            DB::table('tblweekcard')->insert($Email_History);*/
            // $format = $text;
            // $message = \Swift_Message::newInstance();

            $EmailSent = Mail::raw($text,function($message) use ($pdf,$week_Doc,$attachFiles) {
                //$message->to("hamzaesoft@gmail.com")
                $message->to($pdf['email'])

                    //->cc("hamzaesoft@gmail.com")
                    ->cc('planning.ecu@outlook.com','Easy Clean Up BV')
                    ->bcc('planning@easycleanup.nl','Easy Clean Up BV')
                    ->from('planning@easycleanup.nl','Easy Clean Up BV')
                    //->from('hamzaesoft@gmail.com','Easy Clean Up BC')
                    ->subject('ECU Weekstaat '.($pdf['value']).", Project: "." ".$pdf['Project'])
                    //->setBody($format, 'text/html')
                    ->attachData($pdf['pdf']
                        ->output(), "Weekstaat.pdf");

                if ($attachFiles){
                    $files = WeekCardAttachment::whereIn('id', $attachFiles)->get();
                    foreach($files as $file) {
                        $message->attach($file->file_path);
                    }
                }
            });
        } else {
            Session::flash('error', 'Email Error');
        }

        if (isset($pdf) && isset($EmailSent)) {

            Session::flash('message', 'Email verzonden');

        } else {

            Session::flash('error', 'Email Error');

        }
//            Config::set('mail.driver', env('MAIL_DRIVER'));
//            Config::set('mail.host', env('MAIL_HOST'));
//            Config::set('mail.port', env('MAIL_PORT'));
//            Config::set('mail.encryption', env('MAIL_ENCRYPTION'));
//            Config::set('mail.username', env('MAIL_USERNAME'));
//            Config::set('mail.password', env('MAIL_PASSWORD'));
        //dd($EmailSent);
        return redirect('admin/weekcard_email/'.$id);
    }


////////////////////////Emp AGENCY PDF Report Print///////////////////////////

    public function empAgencyWeeklyReportPDF ($week) {
        $year 	= substr($week, 0, 4);
        $weekNo = substr($week, 4, 2);
        $V_Weekcards = DB::select('
				select * from employment_agency_weekly_reports
				where Weeknumber = :WEEK
				order by Employmentagency asc
			', ['WEEK' => $week]);

        foreach ($V_Weekcards as $key => $data) {
            $hours = EmploymentAgencyWeeklyReportDetail::
            where('employment_agency_weekly_report_id', '=', $data->id)
                ->sum('Hours');
            //
            // $total_cost = EmploymentAgencyWeeklyReportDetail::
            // 						where('employment_agency_weekly_report_id', '=', $data->duplicateDataID)
            // 						->sum('Cost');
            $data->hours 		  = $hours;
            // $data->total_cost = $total_cost;
        }
        $data = $V_Weekcards;
        $current = Carbon::now()->toDateTimeString();
        $pdf= PDF::loadView('admin.weekstate.EmpAgency_pdf', compact('data', 'week', 'year', 'weekNo', 'current'));
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('empAgency_pdf.pdf');

    }



    public function empAgencyWWMultipleWeeksReportPDF($from, $to) {

        $weekNumbers = $this->getWeekNumbers((int)$to, (int)$from);


        $V_Weekcards = DB::select('
						select * from employment_agency_weekly_reports
						where Weeknumber BETWEEN :FROM AND :TO and Checked = 0
						order by Weeknumber asc
					', ['FROM' => $from, 'TO' => $to ]);

        foreach ($V_Weekcards as $key => $data) {
            $hours = EmploymentAgencyWeeklyReportDetail::
            where('employment_agency_weekly_report_id', '=', $data->id)
                ->sum('Hours');
            //
            // $total_cost = EmploymentAgencyWeeklyReportDetail::
            // 						where('employment_agency_weekly_report_id', '=', $data->duplicateDataID)
            // 						->sum('Cost');
            $data->hours 		  = $hours;
            // $data->total_cost = $total_cost;
        }


        $data = $V_Weekcards;
        $current = Carbon::now()->toDateTimeString();

        // return view('admin.weekstate.multipleWeeksCard_pdf', compact('data', 'current', 'weekNumbers'));

        $pdf= PDF::loadView('admin.weekstate.multipleWeekEmpAgency_pdf', compact('data', 'current', 'weekNumbers'));
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('multiEmpAgencyByWeek_pdf.pdf');

    }

    public function empAgencyPWMultipleWeeksReport($from, $to)
    {

        // $distinctProjects = $this->getEmpAgencyDistinctProjects((int)$from, (int)$to);
        $distinctEmpAgency = $this->getDistinctEmpAgency((int)$from, (int)$to);

        // $V_Weekcards = DB::select('
        // 	select w.id AS id,w.Weeknumber AS Weeknumber,w.Sent_Date AS Sent_Date,s.name AS Status,w.Received_Date AS Received_Date,
        // 	w.Billing_Date AS Billing_Date,w.Project_Id AS Project_Id,w.Checked AS Checked,p.Name AS Project_Name from
        // 	((tblweekcard w left join tblproject p on((w.Project_Id = p.Id))) left join `tblstatus` AS s on((`s`.`id` = `w`.`status_id`)))
        // 	where w.Weeknumber BETWEEN :FROM AND :TO and w.Checked = 0
        // 	ORDER BY p.Name, w.Weeknumber  asc
        // ', ['FROM' => $from, 'TO' => $to ]);

        $V_Weekcards = DB::select('
						select * from employment_agency_weekly_reports
						where Weeknumber BETWEEN :FROM AND :TO and Checked = 0
						order by Weeknumber asc
					', ['FROM' => $from, 'TO' => $to ]);

        foreach ($V_Weekcards as $key => $data) {
            $hours = EmploymentAgencyWeeklyReportDetail::
            where('employment_agency_weekly_report_id', '=', $data->id)
                ->sum('Hours');
            //
            // $total_cost = EmploymentAgencyWeeklyReportDetail::
            // 						where('employment_agency_weekly_report_id', '=', $data->duplicateDataID)
            // 						->sum('Cost');
            $data->hours 		  = $hours;
            // $data->total_cost = $total_cost;
        }

        $data = $V_Weekcards;
        $current = Carbon::now()->toDateTimeString();

        // return view('admin.weekstate.ProjectWiseMultipleWeeks_pdf', compact('data', 'current', 'distinctProjects'));

        $pdf= PDF::loadView('admin.weekstate.ProjectWiseMultipleEmpAgency_pdf', compact('data', 'current', 'distinctEmpAgency'));
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('project_wijs_rapport.pdf');

    }

    private function getDistinctEmpAgency($from, $to)
    {
        $projects = DB::select(
            'select DISTINCT Employmentagency from
						 employment_agency_weekly_reports
						where Weeknumber BETWEEN :FROM AND :TO
						ORDER BY Employmentagency asc'
            , ['FROM' => $from, 'TO' => $to ]);

        return $projects;
    }


    private function getEmpAgencyDistinctProjects($from, $to)
    {
        $projects = DB::select(
            'select DISTINCT p.Project AS Project_Name from
						(employment_agency_weekly_reports w left join employment_agency_weekly_report_details p on((w.id = p.employment_agency_weekly_report_id))
						)
						where w.Weeknumber BETWEEN :FROM AND :TO
						ORDER BY p.Name asc'
            , ['FROM' => $from, 'TO' => $to ]);

        return $projects;
    }

//////////////////////Emp AGENCY PDF Report Print///////////////////////////


    public function weekCardWeeklyReportPDF ($week) {

        $year 	= substr($week, 0, 4);
        $weekNo = substr($week, 4, 2);

        $V_Weekcards = DB::select('
				select w.id AS id,w.Weeknumber AS Weeknumber,w.Sent_Date AS Sent_Date,s.name AS Status,w.Received_Date AS Received_Date,
				w.Billing_Date AS Billing_Date,w.Project_Id AS Project_Id,w.Checked AS Checked,p.Name AS Project_Name from
				((tblweekcard w left join tblproject p on((w.Project_Id = p.Id)))left join `tblstatus` AS s on((`s`.`id` = `w`.`status_id`)))
				where w.Weeknumber = :WEEK
				order by Project_Name asc
			', ['WEEK' => $week]);

        $data = $V_Weekcards;

        $current = Carbon::now()->toDateTimeString();

        // return view('admin.weekstate.weekCard_pdf', compact('data', 'week', 'year', 'weekNo', 'current'));

        $pdf= PDF::loadView('admin.weekstate.weekCard_pdf', compact('data', 'week', 'year', 'weekNo', 'current'));
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('weekCard_pdf.pdf');

    }

    public function weekCardMultipleWeeksReportPDF($from, $to) {

        $weekNumbers = $this->getWeekNumbers($to, $from);

        $V_Weekcards = DB::select('
				select w.id AS id,w.Weeknumber AS Weeknumber,w.Sent_Date AS Sent_Date,s.name AS Status,w.Received_Date AS Received_Date,
				w.Billing_Date AS Billing_Date,w.Project_Id AS Project_Id,w.Checked AS Checked,p.Name AS Project_Name from
				((tblweekcard w left join tblproject p on((w.Project_Id = p.Id))) left join `tblstatus` AS s on((`s`.`id` = `w`.`status_id`)))
				where w.Weeknumber BETWEEN :FROM AND :TO and w.Checked = 0
				order by w.Weeknumber, Project_Name asc
			', ['FROM' => $from, 'TO' => $to ]);

        $data = $V_Weekcards;
        $current = Carbon::now()->toDateTimeString();

        // return view('admin.weekstate.multipleWeeksCard_pdf', compact('data', 'current', 'weekNumbers'));

        $pdf= PDF::loadView('admin.weekstate.multipleWeeksCard_pdf', compact('data', 'current', 'weekNumbers'));
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('multipleWeeksCard_pdf.pdf');

    }

    public function projectWiseMultipleWeeksReport($from, $to)
    {
        $distinctProjects = $this->getDistinctProjects($from, $to);

        $V_Weekcards = DB::select('
				select w.id AS id,w.Weeknumber AS Weeknumber,w.Sent_Date AS Sent_Date,s.name AS Status,w.Received_Date AS Received_Date,
				w.Billing_Date AS Billing_Date,w.Project_Id AS Project_Id,w.Checked AS Checked,p.Name AS Project_Name from
				((tblweekcard w left join tblproject p on((w.Project_Id = p.Id))) left join `tblstatus` AS s on((`s`.`id` = `w`.`status_id`)))
				where w.Weeknumber BETWEEN :FROM AND :TO and w.Checked = 0
				ORDER BY p.Name, w.Weeknumber  asc
			', ['FROM' => $from, 'TO' => $to ]);

        $data = $V_Weekcards;
        $current = Carbon::now()->toDateTimeString();

        // return view('admin.weekstate.ProjectWiseMultipleWeeks_pdf', compact('data', 'current', 'distinctProjects'));

        $pdf= PDF::loadView('admin.weekstate.ProjectWiseMultipleWeeks_pdf', compact('data', 'current', 'distinctProjects'));
        $pdf->setPaper('a4' , 'portrait');
        return $pdf->download('project_wijs_rapport.pdf');

    }

    private function getDistinctProjects($from, $to)
    {
        $projects = DB::select(
            'select DISTINCT p.Name AS Project_Name, d.name as department from
				(tblweekcard w left join tblproject p on((w.Project_Id = p.Id))
				join tbldepartment d on p.department_id = d.id
				)
				where w.Weeknumber BETWEEN :FROM AND :TO and w.Checked = 0
				ORDER BY p.Name, w.Weeknumber  asc'
            , ['FROM' => $from, 'TO' => $to ]);

        // $onlyProjectNames = [];
        // dd($projects);

        // foreach ($projects as $key => $value) {
        // 	array_push($onlyProjectNames, $value->Project_Name);
        // }

        return $projects;
    }

    private function getWeekNumbers($to, $from) {
        $numbers = [];

        while($to >= $from) {
            array_push($numbers, $from);
            $from += 1;
        }

        return $numbers;

    }



    public function getWeekcardsByWeek ($week) {
        if (strpos($week, 'open') !== false) {
            $openweek = substr($week,0,-4);
            $V_Weekcards = DB::table('v_weekcards')->where(['Weeknumber'=> $openweek,'Checked'=> 0])->select('*');
        }
        else{
            $V_Weekcards = DB::table('v_weekcards')->where('Weeknumber', '=', $week)->select('*'); //->where('Checked','=',1);
        }
        return Datatables::of($V_Weekcards)
            ->addColumn('Weeknumber' , function ($V_Weekcards) {
                return '<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Weeknumber.'</a>';
            })
            ->addColumn('Project_Name' , function ($V_Weekcards) {
                return '<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Project_Name.'</a>';
            })
            ->addColumn('Sent_Date' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return '<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="">'.(strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ').'</a>';
            })
            ->addColumn('Received_Date' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return (strtotime($V_Weekcards->Received_Date) > 0 ? $V_Weekcards->Received_Date : ' ');
            })
            ->addColumn('Billing_Date' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return (strtotime($V_Weekcards->Billing_Date) > 0 ? $V_Weekcards->Billing_Date : ' ');
            })
            ->addColumn('status_code' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return ($V_Weekcards->name);
            })

            ->addColumn('Checked' , function ($V_Weekcards) {
                if ($V_Weekcards->Checked == 1) {
                    //return  ' <a href="ProjectDisapprove/'.$V_Weekcards->id.'" title="goedkeuren" class="label label-success" onClick=\'return confirm("Weet je zeker dat het Weekcard goedkeuren?")\'>Goedgekeurd</a>';
                    return  ' <a href="javascript:void(0);" title="Afgehandeld" class="label label-success" >Afgehandeld</a>';
                } else {
                    return  '<span class="label label-danger">Open</span>
				';

                    //return  ' <a href="ProjectApprove/'.$V_Weekcards->id.'" title="Afkeuren" class="widget-icon" onClick=\'return confirm("Weet je zeker dat het Weekcard goedkeuren?")\'><span class="icon-star-empty"></span></a>';
                }
            })

            ->addColumn('Opties' , function ($V_Weekcards) {
                return '<a href="#" title="Inzicht" class="widget-icon" id="view-weekstaat" dataId='. $V_Weekcards->id .' onclick="showViewModel(' . $V_Weekcards->id . '); return false;" data-toggle="modal" data-target="#viewWeekStat">
				<span class="icon-eye-open"></span></a>
								<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="Delete-weekstaat/'.$V_Weekcards->id.'" title="verwijderen" class="widget-icon" onClick=\'return confirm("Weet u het zeker of u deze weekstaat wilt verwijderen?")\'>
				<span class="icon-trash"></span></a>';
            })
            ->make(true);

    }


    function getWeekcards () {

        $V_Weekcards = DB::table('v_weekcards')->select('*'); //->where('Checked','=',1);
        return Datatables::of($V_Weekcards)
            ->addColumn('Weeknumber' , function ($V_Weekcards) {
                return '<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Weeknumber.'</a>';
            })
            ->addColumn('Project_Name' , function ($V_Weekcards) {
                return '<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Project_Name.'</a>';
            })
            ->addColumn('Sent_Date' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return '<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="">'.(strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ').'</a>';
            })
            ->addColumn('Received_Date' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return (strtotime($V_Weekcards->Received_Date) > 0 ? $V_Weekcards->Received_Date : ' ');
            })
            ->addColumn('Billing_Date' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                return (strtotime($V_Weekcards->Billing_Date) > 0 ? $V_Weekcards->Billing_Date : ' ');
            })
            ->addColumn('status_code' , function ($V_Weekcards) {
                // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
                //return (strtotime($V_Weekcards->Billing_Date) > 0 ? $V_Weekcards->Billing_Date : ' ');
                return $V_Weekcards->name;
            })

            ->addColumn('Checked' , function ($V_Weekcards) {
                if ($V_Weekcards->Checked == 1) {
                    //return  ' <a href="ProjectDisapprove/'.$V_Weekcards->id.'" title="goedkeuren" class="label label-success" onClick=\'return confirm("Weet je zeker dat het Weekcard goedkeuren?")\'>Goedgekeurd</a>';
                    return  ' <a href="javascript:void(0);" title="Deze weekstaat is afgehandeld" class="label label-success" >Afgehandeld</a>';
                } else {
                    return  '<span class="label label-danger">Open</span>
				';

                    //return  ' <a href="ProjectApprove/'.$V_Weekcards->id.'" title="Afkeuren" class="widget-icon" onClick=\'return confirm("Weet je zeker dat het Weekcard goedkeuren?")\'><span class="icon-star-empty"></span></a>';
                }
            })

            ->addColumn('Opties' , function ($V_Weekcards) {
                return '<a href="#" title="Inzicht" class="widget-icon" id="view-weekstaat" dataId='. $V_Weekcards->id .' onclick="showViewModel(' . $V_Weekcards->id . '); return false;" data-toggle="modal" data-target="#viewWeekStat">
				<span class="icon-eye-open"></span></a>
                <a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="Delete-weekstaat/'.$V_Weekcards->id.'" title="verwijderen" class="widget-icon" onClick=\'return confirm("Weet u het zeker of u deze weekstaat wilt verwijderen?")\'>
				<span class="icon-trash"></span></a>';
            })
            ->make(true);



    }

    public function UploadDocument(DocumentWeekcardRequest $request) {

        $post = $request->all();
        $file = $post['File'];
        $weekcard_Id = $post['weekcard_Id'];
        $input = array('File' => $file);
        $destinationPath = 'uploads/weekcard/document';
        $filename = ($weekcard_Id.'_'.$file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
        $post['File']->move($destinationPath,$filename);
        Session::flash('message', ' Werknemersdocument is succesvol bijgewerkt.');

        return redirect('admin/weekcard_email/'.$weekcard_Id);
    }

    public function DeleteDoc($id) {

        @unlink('uploads/weekcard/document/'. $id);
        $ids = explode('_',$id);
        Session::flash('message', ' Medewerkersdocument is succesvol verwijderd.');
        return redirect('admin/weekcard_email/'.$ids[0]);
    }



    function testEmail () {

        $id = '16049';
        $text = 'Test Messsage';
        $weeknumber = 201736;
        $Project = 'Khurram';
        //$email = 'khurram.lucky@gmail.com'; Input::get('email');
        $week_model = new Weekcard();
        $week_details = $week_model->WeekcardReportByID($id);
        $week_Doc = $week_model->GetAttachment($id);
        /*if (!empty($week_Doc)) {
                 foreach ($week_Doc as $Doc ) {
                     @$att[] = $Doc;
                 }
        }*/

        /*print_r($week_Doc);
        die;*/
        @$pdf['att']= $att;
        @$pdf['email']= 'khurram.lucky@gmail.com';


        $pdf['value'] = substr(@$week_details[0]->Weeknumber, -2).'-'.substr(@$week_details[0]->Weeknumber,0, -2);
        $week_Employees = $week_model->GetTimeCardEmployeeByWeekID($week_details[0]->weekcard_Id);
        //$EmployeeAgency = DB::table('tblemploymentagency')->select('Id,Email')->where('Id',$week_details[0]->Employmentagency_Id)->first();
        $pdf['pdf']= PDF::loadView('admin.weekstate.pdf', compact('week_details','week_Employees'));
        $EmailSent = Mail::raw($text, function($message) use ($pdf,$week_Doc) {
            $message->to(@$pdf['email'])
                // ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
                ->bcc('administratie@easycleanup.nl','Easy Clean Up BV')
                ->from('planning@easycleanup.nl','Easy Clean Up BV')
                ->subject('ECU Weekstaat '.@$pdf['value'].", Project:"." "." Test Project")
                ->attachData($pdf['pdf']
                    ->output(), "Weekstaat.pdf");

            if(count($week_Doc > 0)) {
                foreach($week_Doc as $file) {
                    $message->attach('uploads/weekcard/document/'.$file);
                }
            }


        });


    }

    private function getWeekDates($week, $year)
    {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $week_dates = [];
        $record = [];

        for ($i = 0; $i < 5; $i++) {
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
