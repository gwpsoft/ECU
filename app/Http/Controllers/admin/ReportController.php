<?php

namespace App\Http\Controllers\admin;
use App\reports;
use App\Projects;
use App\EmploymentAgencyReportsAttachment;
use Session;
use Mail;
use Validator;
use DB;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Requests;
use Carbon\Carbon;
use App\EmploymentAgencyWeeklyReportDetail;

class ReportController extends Controller
{

	public function Total($yearWeek = 0) {
	//DB::enableQueryLog();
		$Report_model = new reports();
		if (empty($yearWeek)) {	$yearWeek = date('YW');	}
		$OverviewWeek_Billable = $Report_model->OverviewWeek($yearWeek,1);
		// $OverviewWeek_Non_Billable_record = $Report_model->OverviewWeek($yearWeek,0);
		$OverviewWeek_Non_Billable_record = $this->OverviewWeek($yearWeek);
		$OverviewWeekByProject  = $Report_model->getProjectIDByGroup($yearWeek);
		$OverviewWeekByEmployee  = $Report_model->getByEmployeeID($yearWeek);
		$OverviewWeekByProjectManager  = $Report_model->getProjectManagerByGroup($yearWeek);
		/*dd(DB::getQueryLog());
		die;*/

		return View('admin.reports.overview_week',compact('OverviewWeekByProjectManager','OverviewWeekByEmployee','OverviewWeekByProject','Report_model','OverviewWeek_Billable','OverviewWeek_Non_Billable_record','yearWeek'));
	}

	public function Employee_OverView ($yearWeek = 0) {

		if (empty($yearWeek)) {	$yearWeek = date('YW');	}
		$Report_model = new reports();
		$EmployeeOverView = $Report_model->EmployeeOverView($yearWeek);
		return View('admin.reports.employee_overview',compact('yearWeek','EmployeeOverView'));
	}

	public function EmployeeAgency_Overview($yearWeek = 0) {
		// dd("HEELO");

		if (empty($yearWeek)) {	$yearWeek = date('YW');	}

		$Report_model = new reports();

 // dd($EmployeeAgency_OverView);
		 if (strpos($yearWeek, 'open') !== false) {
			 $openweek = substr($yearWeek,0,-4);
			 $EmployeeAgency_OverView = $Report_model->employmentagencyReport($openweek);
			 foreach ($EmployeeAgency_OverView as $key => $data) {
				 $records = DB::select('
					 select count(*) as records, id, Sent_Date, Received_Date, Billing_Date, status_id, Checked from employment_agency_weekly_reports where Checked = 0 and Employmentagency_Id = :EMPAID and Weeknumber = :WEEKNO
				 ',[
					 "EMPAID" => $data->Employmentagency_Id,
					 "WEEKNO" => $data->Weeknumber,
				 ]);

				 $data->records 				= $records[0]->records;
				 $data->duplicateDataID = $records[0]->id;
				 $data->Sent_Date		    = $records[0]->Sent_Date;
				 $data->Received_Date 	= $records[0]->Received_Date;
				 $data->Billing_Date  	= $records[0]->Billing_Date;
				 $data->Checked	    	  = $records[0]->Checked;
				 $data->status_id	    	= $records[0]->status_id;
				 // dd($data);

			 }
		 }
		 else{
			 $EmployeeAgency_OverView = $Report_model->employmentagencyReport($yearWeek);
			 foreach ($EmployeeAgency_OverView as $key => $data) {
				 $records = DB::select('
					 select count(*) as records, id, Sent_Date, Received_Date, Billing_Date, status_id, Checked from employment_agency_weekly_reports where
					 Employmentagency_Id = :EMPAID and Weeknumber = :WEEKNO
				 ',[
					 "EMPAID" => $data->Employmentagency_Id,
					 "WEEKNO" => $data->Weeknumber,
				 ]);

				 $data->records 				= $records[0]->records;
				 $data->duplicateDataID = $records[0]->id;
				 $data->Sent_Date		    = $records[0]->Sent_Date;
				 $data->Received_Date 	= $records[0]->Received_Date;
				 $data->Billing_Date  	= $records[0]->Billing_Date;
				 $data->Checked	    	  = $records[0]->Checked;
				 $data->status_id	      = $records[0]->status_id;
				 // dd($data);

			 }
		}


		foreach ($EmployeeAgency_OverView as $key => $data) {
			$hours = EmploymentAgencyWeeklyReportDetail::
			            where('employment_agency_weekly_report_id', '=', $data->duplicateDataID)
			            ->sum('Hours');

			$total_cost = EmploymentAgencyWeeklyReportDetail::
									where('employment_agency_weekly_report_id', '=', $data->duplicateDataID)
									->sum('Cost');

			$data->hours 		  = $hours;
			$data->total_cost = $total_cost;
		}

		foreach ($EmployeeAgency_OverView as $key => $data) {
			$status = DB::select('select name from tblstatus where id = :ID', ['ID' => $data->status_id]);
			if ($status) {
				$data->status_name = $status[0]->name;

			} else {
				$data->status_name = "";
			}

		}

		// dd($EmployeeAgency_OverView);

		return View('admin.reports.employement_agency_overview',compact('yearWeek','EmployeeAgency_OverView'));
	}


	public function ProjectManager_OverView ($yearWeek = 0) {

		if (empty($yearWeek)) {	$yearWeek = date('YW');	}
		$Report_model = new reports();
		$ProjectManagerOverView = $Report_model->ProjectManagerOverView($yearWeek);
		return View('admin.reports.projectmanager_overview',compact('yearWeek','ProjectManagerOverView'));
	}

	public function weekcardoverviewchecked ($yearWeek = 0) {

		if (empty($yearWeek)) {	$yearWeek = date('YW');	}
		$Report_model = new reports();
		$WeekcardOverView = $Report_model->WeekcardOverviewCheck($yearWeek);
		return View('admin.reports.weekly_status_review',compact('yearWeek','WeekcardOverView'));
	}

	public function HoursOverview($yearWeek = 0) {

		if (empty($yearWeek)) {	$yearWeek = date('YW');	}
		$Report_model = new reports();
		$HoursOverview = $Report_model->HoursOverviewCheck($yearWeek);
		return View('admin.reports.hours_overview',compact('yearWeek','HoursOverview'));
	}

	public function ProjectFixed_Overview() {

		$Report_model = new reports();
		$ProjectFixed = $Report_model->ProjectFixed_Overview();
		return View('admin.reports.project_fix_overview',compact('ProjectFixed'));
	}

	public function ExpiredEmployee_Overview() {

		$Report_model = new reports();
		$ExpiredEmployee = $Report_model->ExpiredEmployee();

		return View('admin.reports.employee_expired_overview',compact('ExpiredEmployee'));

	}

	public function EmployementAgencyNote($id,$weeknumber) {

		$Report_model = new reports;
		$firstday = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
		$datestring = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
		// $EmployeeAgency_OverView = $Report_model->specificEmploymentAgencyReport($weeknumber,$id);
		$EmployeeAgency_OverView = $Report_model->employmentagencyReport($weeknumber,$id);

		// dd($EmployeeAgency_OverView);

		foreach ($EmployeeAgency_OverView as $key => $data) {
			$records = DB::select('
				select count(*) as records, id from employment_agency_weekly_reports where
				Employmentagency_Id = :EMPAID and Weeknumber = :WEEKNO
			',[
				"EMPAID" => $data->Employmentagency_Id,
				"WEEKNO" => $data->Weeknumber,
			]);

			$data->records = $records[0]->records;
			$data->duplicateDataID = $records[0]->id;
		}

		foreach ($EmployeeAgency_OverView as $key => $data) {
			$individual_cost = DB::select(' select Cost as individual_cost, Firstname, Lastname from tblemployee e where e.id = :EMPID', ['EMPID' => $data->Employee_Id]);
			$data->individual_cost = $individual_cost[0]->individual_cost;
			$data->Name = $individual_cost[0]->Firstname . " " . $individual_cost[0]->Lastname;
		}
		// dd($EmployeeAgency_OverView);

		// Below will check if its data is copied to tblemploymentagencynotes2 or not. False mean no data copied and vice versa
		$actualData = false;

		foreach ($EmployeeAgency_OverView as $key => $data) {
			if ($data->records > 0) {
				$actualData = true;
				break;
			}
		}

		$yearWeek = $weeknumber;
		$Employmentagency_Id = $EmployeeAgency_OverView[0]->Employmentagency_Id;

		// dd($EmployeeAgency_OverView); // Hours

	return View('admin.reports.employement_agency_note',compact('datestring','EmployeeAgency_OverView', 'actualData', 'yearWeek', 'Employmentagency_Id'));

	}

	public function EmployementAgencyNoteDuplicate($id, $weeknumber)
	{
		$records = DB::select('
			select * from tblemploymentagencynotes2 WHERE
			Employmentagency_Id = :ID and Weeknumber = :WEEKNO
		', [
				'ID' => $id,
				'WEEKNO' => $weeknumber
		]);

		$files = DB::select('
			select * from tblemploymentagencynotes2_attachments WHERE
			employmentagency_Id = :ID and weeknumber = :WEEKNO
		', [
				'ID' => $id,
				'WEEKNO' => $weeknumber
		]);

		$yearWeek = $weeknumber;
		$Employmentagency_Id = $id;
		$Report_model = new reports();
		$firstday = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
		$datestring = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);

		return view('admin.reports.employement_agency_note_duplicate', compact('records','datestring', 'files', 'weeknumber', 'Employmentagency_Id', 'yearWeek'));
	}


	/////////////////// Employment Agency Rports attachment work starts here ///////////////////

	public function uploadWeekstaatDocument(Requests $request)
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
		$destinationPath = 'uploads/employementAgencyReports/document/' . $now;
		$filename 			 = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
		// dd($destinationPath . '/' . $filename);
		$post['File']->move($destinationPath,$filename);

		// storing records in database table
		$attachment = new EmploymentAgencyReportsAttachment;
		$attachment->employmentagency_id = $request->Employmentagency_Id;
		$attachment->weeknumber 				 = $request->weeknumber;
		$attachment->note 			 				 = $request->note;
		$attachment->added 			 				 = Carbon::now();
		$attachment->filename 	 				 = $filename;
		$attachment->file_path 	 				 = $destinationPath . '/' . $filename;
		$attachment->save();

		// Flash message
		Session::flash('message', 'Document met succes geüpload');
		// return redirect('admin/Edit-weekstaat/'.$request->weekcard_id);
		return redirect() -> back();

	}

	public function deleteWeekstaatDocument($id)
	{
		$file = EmploymentAgencyReportsAttachment::findOrFail($id);
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
		$file = EmploymentAgencyReportsAttachment::findOrFail($id);

		return response() -> json([
			'data' => [
				'id'   => $file->id,
				'employmentagencyID' => $file->employmentagency_id,
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
		$attachment = EmploymentAgencyReportsAttachment::findOrFail($request->fileId);
		$attachment->employmentagency_id = $request->employmentagencyID;
		$attachment->note 			 				 = $request->note;
		$attachment->added 			 				 = Carbon::now();

		$attachment->save();


		// Flash message
		Session::flash('message', 'Document succesvol bijgewerkt');

		return redirect() -> back();


	}

		/////////////////// Employment Agency Rports attachment work ends here ///////////////////

	public function postEmployementAgencyNoteDuplicate(Requests $request, $id)
	{
		$hours = $request->Mon + $request->Tue+ $request->Wed + $request->Thu + $request->Fri + $request->Sat + $request->Sun;

		// return $request->all();
		DB::update('
			update tblemploymentagencynotes2 set
				Mon = :MON, Tue = :TUE, Wed = :WED, Thu = :THU, Fri = :FRI, Sat = :SAT, Sun = :SUN, Hours = :HOURS, Employmentagencynote = :NOTE
				where id = :ID
		', [
			'ID' 		=> $request->id,
			'MON' 	=> $request->Mon,
			'TUE' 	=> $request->Tue,
			'WED' 	=> $request->Wed,
			'THU' 	=> $request->Thu,
			'FRI' 	=> $request->Fri,
			'SAT' 	=> $request->Sat,
			'SUN' 	=> $request->Sun,
			'HOURS' => $hours,
			'NOTE'	=> $request->Employmentagencynote
		]);

		Session::flash('message', 'Record geüpdatet met succes');
		return response() -> json([
			'status' => 'success'
		], 200);
	}

	public function Update_EmployementAgencyNote(Requests $request) {

		$weeknumber = Request::input('weeknumber');
		$data =  Request::input('Notes');
		$id =  Request::input('id');
		// dd($request->all());
		// dd($request->newRecords);

		$Report_model = new reports();

		// remove old data from tblemploymentagencynotes2
		DB::delete('delete from tblemploymentagencynotes2 where
						Employmentagency_Id = :EMPAID and
						Weeknumber = :WEEKNO
		', [
				"EMPAID" => $request->newRecords[0]['Employmentagency_Id'],
				'WEEKNO' => $request->newRecords[0]['Weeknumber']
		]);


			foreach ($request->newRecords as $key => $record) {
				// dd($record['Weeknumber']);
				DB::insert('
				insert into tblemploymentagencynotes2 set
				Weeknumber = :WEEKNO, Employee_Id = :EMPID, Name = :NAME,
				Employmentagency_Id = :EMPAID, Employmentagency = :EMPA, Employmentagency_address = :EMPAA,
				Employmentagency_zipcode = :EMPAZ, Employmentagency_fax = :EMPAFAX, Employmentagency_fone = :EMPAFONE, Employmentagency_mobile = :EMPAMOB, Employmentagency_email = :EMPAEMAIL,
				Employmentagency_contact = :EMPACONTACT, Employmentagency_city = :EMPACITY, Mon = :MON,
				Tue = :TUE, Wed = :WED, Thu = :THU, Fri = :FRI, Sat = :SAT, Sun = :SUN, Project = :PROJECT, Project_Id = :PROJECTID, Hours = :HOURS, Cost = :COST, Notes = :NOTES, Employmentagencynote = :EMPAGENCYNOTE, bsn = :BSN
				', [
					'WEEKNO' 				=> $record['Weeknumber'],
					'EMPID' 				=> $record['Employee_Id'],
					'NAME' 					=> $record['Name'],
					'EMPAID' 				=> $record['Employmentagency_Id'],
					'BSN' 					=> $record['Sofinumber'],
					'EMPA' 					=> $record['Employmentagency'],
					'EMPAA' 				=> $record['Employmentagency_address'],
					'EMPAZ' 				=> $record['Employmentagency_zipcode'],
					'EMPAFAX' 			=> $record['Employmentagency_fax'],
					'EMPAFONE' 			=> $record['Employmentagency_fone'],
					'EMPAMOB' 			=> $record['Employmentagency_mobile'],
					'EMPAEMAIL' 		=> $record['Employmentagency_email'],
					'EMPACONTACT' 	=> $record['Employmentagency_contact'],
					'EMPACITY' 			=> $record['Employmentagency_city'],
					'MON' 					=> $record['Mon'],
					'TUE' 					=> $record['Tue'],
					'WED' 					=> $record['Wed'],
					'THU' 					=> $record['Thu'],
					'FRI' 					=> $record['Fri'],
					'SAT' 					=> $record['Sat'],
					'SUN' 					=> $record['Sun'],
					'PROJECT' 			=> $record['Project'],
					'PROJECTID' 		=> $record['Project_Id'],
					'HOURS' 				=> $record['Hours'],
					'COST' 					=> $record['Cost'],
					'NOTES' 			  => $record['Notes'],
					'EMPAGENCYNOTE' => $record['Employmentagencynote'],
				]);
			}

		Session::flash('message', ' Rapport: Data opgeslagen');
		return redirect('admin/report/employmentagencynotes/id/'.$id.'/weeknumber/'.$weeknumber);
	}

	public function HistoryEmployeeProject($filter = 0) {

		$Report_model = new reports();
		$HistoryEmployeeProject = $Report_model->projecthistoryReport($filter);

		return View('admin.reports.history_employee_project',compact('HistoryEmployeeProject'));

	}

	public function HistoryProjectEmployee($filter = 0) {

		$Report_model = new reports();
		$HistoryEmployeeProject = $Report_model->employeehistoryReport($filter);

		return View('admin.reports.history_project_employee',compact('HistoryEmployeeProject'));

	}

	public function Project_Overview_Containers($project_id=0,$startDate=0,$EndDate=0) {


		/*echo $project_id = Input::get('project_id');
		echo $startDate = Input::get('start_date');
		echo $EndDate = Input::get('end_date');
		die;*/
		/*echo $project_id,$startDate,$EndDate;
		die;*/
		$AllProjects  = Projects:: where('Active',1)->orderBy('Name','ASC')->get();
		$Report_model = new reports();
		$ProjectWiseBons = $Report_model->Project_Overview_Containers($project_id,$startDate,$EndDate);
		if ($project_id == 0) { $project_id = '';}
		if ($startDate == 0) { $startDate = '';}
		if ($EndDate == 0) { $EndDate = '';}
		return View('admin.reports.ProjectWiseContainerBon',compact('AllProjects','ProjectWiseBons','project_id','startDate','EndDate'));

	}

	private function OverviewWeek ($weeknumber) {

		$weeknumber = $this->_fixweeknumber($weeknumber);

		return $results = DB::select( DB::raw("SELECT
										w.Weeknumber Name,
										'none' Id,
										format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
										format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate)),2) Rate,
										format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate_Cost)),2) Cost,
										format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate)) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate_Cost)),2) Calculated
								FROM
										tblweekcard w
										JOIN tbltimecard t
												ON w.Id = t.Weekcard_Id
										JOIN tblproject p
												ON w.Project_Id = p.Id
										JOIN tblemployee e
												ON t.Employee_Id = e.Id
										JOIN tblprojectmanager pm
												ON p.Projectmanager_Id = pm.Id
								WHERE
										w.Weeknumber like '" . $weeknumber . "%'
										AND t.Billable = 0  GROUP BY
								 w.Weeknumber") );

			}

			private function _fixweeknumber( $weeknumber )
			 {
					 if ( substr($weeknumber, -2) == '00' ) {
							 $weeknumber = substr($weeknumber, 0,-2);
					 }
					 return $weeknumber;
			 }




}
