<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request as Requests;

use DB;
use PDF;
use Mail;
use Input;
use Session;
use Request;
use Validator;
use App\reports;
use App\Projects;
use App\Weekcard;
use Carbon\Carbon;
use App\Tblemployee;
use App\Http\Controllers\Controller;
use App\EmploymentAgencyWeeklyReport;
use App\EmploymentAgencyWeeklyReportAttachment;
use App\EmploymentAgencyWeeklyReportDetail;

class EmploymentAgencyWeeklyReportController extends Controller
{
    public function store(Requests $request)
    {
        $weeknumber   = Request::input('weeknumber');
        $data         =  Request::input('Notes');
        $id           =  Request::input('id');
        $Report_model = new reports();

        // 1st Add data to employment_agency_weekly_reports table
        foreach ($request->newRecords as $key => $record) {
            if($key < 1) { //loop only executes once
                $data1 = new EmploymentAgencyWeeklyReport;
                $data1->Employmentagency_Id      = $record['Employmentagency_Id'];
                $data1->Employmentagency         = $record['Employmentagency'];
                $data1->Weeknumber               = $record['Weeknumber'];
                $data1->Employmentagency_address = $record['Employmentagency_address'];
                $data1->Employmentagency_zipcode = $record['Employmentagency_zipcode'];
                $data1->Employmentagency_city    = $record['Employmentagency_city'];
                $data1->Employmentagency_fax     = $record['Employmentagency_fax'];
                $data1->Employmentagency_fone    = $record['Employmentagency_fone'];
                $data1->Employmentagency_mobile  = $record['Employmentagency_mobile'];
                $data1->Employmentagency_email   = $record['Employmentagency_email'];
                $data1->Employmentagency_contact = $record['Employmentagency_contact'];
                $data1->save();

                ++$key;
            }


        }

        // 2nd add data in employment_agency_weekly_report_details table
        $employmentAgencyWeeklyReportID = EmploymentAgencyWeeklyReport::whereRaw('id = (select max(`id`) from employment_agency_weekly_reports)')->get();

        foreach ($request->newRecords as $key => $record) {
            // $name = explode(",", $record['Name']); // break name to make it like FirstName + LastName
            $data = new EmploymentAgencyWeeklyReportDetail;
            $data->employment_agency_weekly_report_id = $employmentAgencyWeeklyReportID[0]->id;
            $data->Project_Id           = $record['Project_Id'];
            $data->Project              = $record['Project'];
            $data->Employee_Id          = $record['Employee_Id'];
            // $data->Name                 = $name[1] . " " . $name[0];
            $data->Name                 = $record['Name'];
            $data->bsn                  = $record['Sofinumber'];
            $data->Mon                  = $record['Mon'];
            $data->Tue                  = $record['Tue'];
            $data->Wed                  = $record['Wed'];
            $data->Thu                  = $record['Thu'];
            $data->Fri                  = $record['Fri'];
            $data->Sat                  = $record['Sat'];
            $data->Sun                  = $record['Sun'];
            $data->Hours                = $record['Hours'];
            $data->individual_cost      = $record['individual_cost'];
            // $data->Cost                 = $record['Cost'];
            $data->Cost                 = $record['Hours'] * $record['individual_cost'];
            $data->Notes                = $record['Notes'];
            $data->Employmentagencynote = $record['Employmentagencynote'];
            $data->save();
        }

        Session::flash('message', ' Rapport: Data opgeslagen');
        return redirect('admin/report/employmentagencynotesduplicate/'.$employmentAgencyWeeklyReportID[0]->id);

    }

    public function show($id)
    {
        $record =  EmploymentAgencyWeeklyReport::findOrFail($id);
        $recordID            =  $record->id;
        $yearWeek            = $record->Weeknumber;
        $weeknumber          = $record->Weeknumber;
        $Employmentagency_Id = $record->Employmentagency_Id;
        $Report_model        = new reports();
        $firstday            = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
        $datestring          = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
        $hours = EmploymentAgencyWeeklyReportDetail::
                    where('employment_agency_weekly_report_id', '=', $id)
                    ->sum('Hours');

        $cost = EmploymentAgencyWeeklyReportDetail::
		            where('employment_agency_weekly_report_id', '=', $id)
		            ->sum('Cost');

        $files = EmploymentAgencyWeeklyReportAttachment::where('employment_agency_weekly_report_id', '=', $recordID)->get();

        $Sent_Date          = $record->Sent_Date;
        $Received_Date      = $record->Received_Date;
        $Billing_Date       = $record->Billing_Date;
        $Billing_no         = $record->Billing_no;
        $Notes              = $record->Notes;
        $Internal_Notes     = $record->Internal_Notes;
        $Checked            = $record->Checked;
        $Werkbrifje         = $record->Werkbrifje;
        $Notes              = $record->Notes;
        $Internal_Notes     = $record->Internal_Notes;
        $Employmentagency   = $record->Employmentagency;

        $AllStatus = DB::table('tblstatus')->where('active',1)->select('*')->orderBy('name','asc')->get();

        $week_model = new Weekcard();
        //$AllProjects = $week_model->GetAllProjects();
        $AllEmployees = $week_model->GetAllEmployees();

        return view('admin.employmentAgencyReports.report', compact('record', 'datestring', 'recordID', 'files', 'weeknumber', 'Sent_Date', 'Received_Date', 'Billing_Date', 'Billing_no', 'Checked', 'Werkbrifje', 'Notes', 'Internal_Notes', 'hours', 'cost', 'AllEmployees', 'Employmentagency', 'AllStatus'));
    }

    public function updateWeeklyData(Requests $request, $id)
    {

        $hours = floatval($request->Mon) + floatval($request->Tue) + floatval($request->Wed) + floatval($request->Thu) + floatval($request->Fri) + floatval($request->Sat) + floatval($request->Sun);

        $record = EmploymentAgencyWeeklyReportDetail::findOrFail($id);
        $record->Mon                  = $request->Mon;
        $record->Tue                  = $request->Tue;
        $record->Wed                  = $request->Wed;
        $record->Thu                  = $request->Thu;
        $record->Fri                  = $request->Fri;
        $record->Sat                  = $request->Sat;
        $record->Sun                  = $request->Sun;
        $record->Hours                = $hours;
        $record->individual_cost      = $request->individual_cost;
        $record->Cost                 = $request->individual_cost * $hours;
        $record->Employmentagencynote = $request->Employmentagencynote;
        $record->save();

        Session::flash('message', 'Record geüpdatet met succes');
        return response() -> json([
            'status' => 'success'
        ], 200);

    }

    public function employmentagencyrecordsupdate(Requests $request, $id)
    {
        $record = EmploymentAgencyWeeklyReport::findOrFail($id);
        $record->Sent_Date      = ($request->Sent_Date) ? $request->Sent_Date : "";
        $record->Received_Date  = ($request->Received_Date) ? $request->Received_Date : "";
        $record->Billing_Date   = ($request->Billing_Date) ? $request->Billing_Date : "";
        $record->Billing_no     = ($request->Billing_no) ? $request->Billing_no : "";
        $record->Notes          = ($request->Notes) ? $request->Notes : "";
        $record->Internal_Notes = ($request->Internal_Notes) ? $request->Internal_Notes : "";
        $record->Checked        = ($request->Checked) ? 1 : 0;
        $record->Werkbrifje     = ($request->Werkbrifje) ? 1 : 0;
        $record->status_id     = $request->status_id;
        $record->save();

        Session::flash('message', ' Record geüpdatet met succes');

        if (!empty(Input::get('Save'))) {
            return redirect('admin/report/employmentagencynotesduplicate/'.$id);
            //return redirect('admin/weekcard');
        }
        if (!empty(Input::get('Save_Close'))) {
            return redirect('admin/report/employmentagencyoverview/weeknumber/'.$request->weeknumber);
        }

        // if (!empty(Input::get('Save_New'))) {
        //     return redirect('admin/Add-New-weekstaat');
        // }

    }


    //////////// Below code is email of employment agency report ///////////////////////////////


    public function EmployementAgency_Email($id)
    {
        $record = EmploymentAgencyWeeklyReport::findOrFail($id);
        $recordID     = $record->id;
        $weeknumber   = $record->Weeknumber;
        $yearWeek     = $record->Weeknumber;
        $year         = substr($weeknumber, 0, 4);
        $week         = substr($weeknumber, 4, 6);
        $Report_model = new reports();
        $firstday     = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
        $datestring   = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
        $files        = EmploymentAgencyWeeklyReportAttachment::where('employment_agency_weekly_report_id', '=', $record->id)->get();

        $Employmentagency_Id = $id;

        return View('admin.employmentAgencyReports.email',compact('yearWeek','record','weeknumber', 'files', 'Employmentagency_Id', 'recordID', 'year', 'week'));

    }

    public function EmployementAgency_Email_Sent()
    {

        if ($_POST) {
            $id     = $_POST['record_id'];
            $record = EmploymentAgencyWeeklyReport::findOrFail($id);

            // Below error when we dont have employment agency email
            if(!$record->Employmentagency_email) {
                Session::flash('message', 'Geen e-mailadres van uitzendbureau');
                return redirect() -> back();
            }

            $employementagency_name = $record->Employmentagency;
            $email        = $record->Employmentagency_email;
            $recordID     = $record->id;
            $weeknumber   = $record->Weeknumber;
            $text 		  = $_POST['Text'];
            $Report_model = new reports();
            $firstday 	  = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
            $datestring   = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
            $attachFiles  = Input::get('fileid') ? Input::get('fileid') : '';

            $total        = EmploymentAgencyWeeklyReportDetail::
            where('employment_agency_weekly_report_id', '=', $id)
            ->sum('Hours');

            $emptyRows          = 8 - sizeof($record->employmentAgencyWeeklyReportDetails);
            $Sent_Date          = $record->Sent_Date;
            $Received_Date      = $record->Received_Date;
            $Billing_Date       = $record->Billing_Date;
            $Billing_no         = $record->Billing_no;
            $Notes              = $record->Notes;
            $Internal_Notes     = $record->Internal_Notes;
            $Checked            = $record->Checked;
            $Werkbrifje         = $record->Werkbrifje;
            $Notes              = $record->Notes;
            $Internal_Notes     = $record->Internal_Notes;

            $pdf= PDF::loadView('admin.employmentAgencyReports.pdf', compact('record','weeknumber','datestring', 'total', 'emptyRows', 'Sent_Date', 'Received_Date', 'Billing_Date', 'Billing_no', 'Checked', 'Werkbrifje', 'Notes', 'Internal_Notes'));
            $pdf->setPaper('a4' , 'portrait');
            $year = substr($weeknumber,0,4);
            $week = substr($weeknumber,4,6);
            Mail::raw($text, function($message) use ($pdf, $attachFiles, $email,$year,$week,$employementagency_name) {
                $message->to($email)
                ->from('planning@easycleanup.nl')
                ->subject("*ECU Weekstaat week $week-$year, $employementagency_name")
                // ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
                ->bcc('planning.ecu@outlook.com','Easy Clean Up BV')
                ->attachData($pdf->output(), "report.pdf");

                if ($attachFiles){
                    $files = EmploymentAgencyWeeklyReportAttachment::whereIn('id', $attachFiles)->get();
                    foreach($files as $file) {
                        $message->attach($file->file_path);
                    }
                }

            });
            Session::flash('message', 'Verzonden berichten');
            return redirect('admin/report/employmentagency_Email/'.$recordID);
        }

    }


    //////////// Above code is email work of employment agency report ///////////////////////////////

    //////////// Below code it to generate PDF of employment agency report ///////////////////////////////

    public function EmployementAgency_Generate_pdf($id)
    {
        $record       = EmploymentAgencyWeeklyReport::findOrFail($id);
        $weeknumber   = $record->Weeknumber;
        $Report_model = new reports();
        $firstday     = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
        $datestring   = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);

        $total        = EmploymentAgencyWeeklyReportDetail::
        where('employment_agency_weekly_report_id', '=', $id)
        ->sum('Hours');

        $emptyRows     = 15 - sizeof($record->employmentAgencyWeeklyReportDetails);

        $Sent_Date          = $record->Sent_Date;
        $Received_Date      = $record->Received_Date;
        $Billing_Date       = $record->Billing_Date;
        $Billing_no         = $record->Billing_no;
        $Notes              = $record->Notes;
        $Internal_Notes     = $record->Internal_Notes;
        $Checked            = $record->Checked;
        $Werkbrifje         = $record->Werkbrifje;
        $Notes              = $record->Notes;
        $Internal_Notes     = $record->Internal_Notes;


        // return view('admin.employmentAgencyReports.pdf', compact('record','weeknumber','datestring', 'total', 'emptyRows', 'Sent_Date', 'Received_Date', 'Billing_Date', 'Billing_no', 'Checked', 'Werkbrifje', 'Notes', 'Internal_Notes'));
        $pdf= PDF::loadView('admin.employmentAgencyReports.pdf', compact('record','weeknumber','datestring', 'total', 'emptyRows', 'Sent_Date', 'Received_Date', 'Billing_Date', 'Billing_no', 'Checked', 'Werkbrifje', 'Notes', 'Internal_Notes'));
        $pdf->setPaper('a4' , 'portrait');
        //return $pdf->stream();
        return $pdf->download('EmploymentagencyReport.pdf');

    }


    //////////// Above code it to generate PDF of employment agency report ///////////////////////////////

    /////////////////// Employment Agency Rports attachment work starts here ///////////////////

    public function uploadWeekstaatDocument(Requests $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'note'  => 'required',
            'File'  => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,bmp',
        ],[
            'note.required' => 'Notitieveld is verplicht'
        ]);

        $now = Carbon::now();
        $now = $now->year . $now->month;

        // move file on destination folder
        $post            = $request->all();
        $file            = $post['File'];
        $destinationPath = 'uploads/employementAgencyReports/document/' . $now;
        $filename 		 = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();

        $post['File']->move($destinationPath,$filename);

        // storing records in database table
        $attachment = new EmploymentAgencyWeeklyReportAttachment;
        $attachment->employment_agency_weekly_report_id = $request->record_id;
        $attachment->note 			 				    = $request->note;
        $attachment->added 			 				    = Carbon::now();
        $attachment->filename 	 				        = $filename;
        $attachment->file_path 	 				        = $destinationPath . '/' . $filename;
        $attachment->save();

        // Flash message
        Session::flash('message', 'Document met succes geüpload');
        return redirect() -> back();

    }

    public function editWeekstaatDocument($id)
    {
        $file = EmploymentAgencyWeeklyReportAttachment::findOrFail($id);

        return response() -> json([
            'data' => [
                'id'   => $file->id,
                'recordID' => $file->employment_agency_weekly_report_id,
                'note' => $file->note
            ]
        ], 200);
    }

    public function updateUploadWeekstaatDoc(Requests $request)
    {
        $this->validate($request, [
            'note'  => 'required',
        ],[
            'note.required' => 'Notitieveld is verplicht'
        ]);

        // storing records in database table
        $attachment = EmploymentAgencyWeeklyReportAttachment::findOrFail($request->fileId);
        $attachment->note 			 				 = $request->note;
        $attachment->added 			 				 = Carbon::now();

        $attachment->save();


        // Flash message
        Session::flash('message', 'Document succesvol bijgewerkt');

        return redirect() -> back();
    }

    public function deleteWeekstaatDocument($id)
    {
        $file = EmploymentAgencyWeeklyReportAttachment::findOrFail($id);
        //remove from drive
        unlink($file->file_path);
        // delete DB record
        $file->delete();

        // Flash message
        Session::flash('message', 'Document succesvol verwijderd');

        return redirect() -> back();
    }


    /////////////////// Employment Agency Rports attachment work ends here ///////////////////

    public function deleteEmploymentAgencyRecord($id)
    {
      $report = EmploymentAgencyWeeklyReport::findOrFail($id);
      $weekNo = $report->Weeknumber;

      // delete from EmploymentAgencyWeeklyReportAttachment
      $attachments = EmploymentAgencyWeeklyReportAttachment::where('employment_agency_weekly_report_id', '=', $id)->get();
      foreach ($attachments as $key => $attachment) {
          unlink($attachment->file_path);
          $attachment->delete();
      }

      // delete from EmploymentAgencyWeeklyReportDetail
      DB::table('employment_agency_weekly_report_details')->where('employment_agency_weekly_report_id', '=', $id)->delete();

      // delete from EmploymentAgencyWeeklyReport
      DB::table('employment_agency_weekly_reports')->where('id', '=', $id)->delete();

      // Flash message
      Session::flash('message', 'Record succesvol verwijderd');

      return redirect('admin/report/employmentagencyoverview/weeknumber/'.$weekNo);

    }

    public function deleteEmploymentAgencySingleRecord($id)
    {
        // delete from EmploymentAgencyWeeklyReportDetail
        DB::table('employment_agency_weekly_report_details')->where('id', '=', $id)->delete();
        // Flash message
        Session::flash('message', 'Record succesvol verwijderd');

        return redirect() -> back();
    }

    public function getEmployeeSingleRecord($id)
    {
        $record = Tblemployee::where('id', '=', $id)->first();

        return response() -> json([
            'data' => [
                'record' => $record
            ]
        ], 200);
    }

    public function addEmploymentAgencySingleRecord(Requests $request)
    {
        // return $request->all();

        $hours = floatval($request->Mon) + floatval($request->Tue) + floatval($request->Wed) + floatval($request->Thu) + floatval($request->Fri) + floatval($request->Sat) + floatval($request->Sun);

        $record = new EmploymentAgencyWeeklyReportDetail;
        $record->employment_agency_weekly_report_id = $request->employment_agency_weekly_report_id;
        $record->Employee_Id                        = $request->Employee_Id;
        $record->Name                               = $request->Name;
        $record->Mon                                = $request->Mon;
        $record->Tue                                = $request->Tue;
        $record->Wed                                = $request->Wed;
        $record->Thu                                = $request->Thu;
        $record->Fri                                = $request->Fri;
        $record->Sat                                = $request->Sat;
        $record->Sun                                = $request->Sun;
        $record->Hours                              = $hours;
        $record->individual_cost                    = $request->individual_cost;
        $record->Cost                               = $hours * $request->individual_cost;
        $record->Employmentagencynote               = $request->Employmentagencynote;

        $record->save();

        // Flash message
        Session::flash('message', 'Nieuw record met succes toegevoegd');

        return response() -> json([
            'success' => 'OK'
        ], 200);

    }

}
