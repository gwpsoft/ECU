<?php

namespace App\Http\Controllers\admin;
use App\Keetcard;
use App\Comment;
use App\Http\Requests\WeekstateRequest;
use Session;
use Mail;
use Validator;
use DB;
use PDF;
use Input;
use Datatables;
use Carbon\Carbon;
use App\KeetcardAttachment;
use App\KeetWeekcard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeetcardController extends Controller
{
    //

	public function GetAll () {

		/*$week_model = new Weekcard();
		$AllWeekState = $week_model->GetAllWeekState();
		return View('admin.weekstate.allweekstate',compact('AllWeekState'));*/
		return View('admin.keet.allkeet_ajax');
	}

	/*public function AddKeetonderhoud() {

	$week_model = new Keetcard();
	$AllProjects = $week_model->GetAllProjects();

	return View('admin.weekstate.create',compact('AllProjects'));
	}*/

	public function AddKeetonderhoud($ProjectID = 0) {

	$week_model = new Keetcard();
	// $AllProjects = $week_model->GetAllProjects();
	$AllProjects = DB::table('tblproject')->where('Active', '=', 1)->select('id', 'Name')->orderBy('Name','ASC')->get();
	$AllStatus = DB::table('tblstatus')->where('active',1)->select('*')->orderBy('name','asc')->get();

	return View('admin.keet.create',compact('AllProjects','ProjectID', 'AllStatus'));
	}

public function getKeetData($id)
{
	// $keet = DB::table('tblkeetcard')->select('*')->where('id','=',$id)->first();
	$keet = DB::table('tbl_keet_weekcard')->where('id','=',$id)->select('*')->first();

	return response()->json($keet);
}

public function saveKeetData(Request $request)
{
	// dd($request);
	$keet = DB::table('tblkeetcard')->select('*')->where('id','=',$id)->first();

	return response()->json($keet);
}


	public function PostKeetonderhoud (WeekstateRequest $request) {
		 // dd($request->all());
/*	echo '<pre>';
print_r($request->all()); die;*/
$project_detail = DB::table('tblproject')->select('*')
						->where('Id','=',$request->Project_Id)
						->first();
						// dd($project_detail);
	if (empty($request->Checked) ) { $check = 0;} else { $check = 1; }
			$data = array (
					'fr_Keeknumber' => $request->year.$request->week,
					'to_Keeknumber' => $request->to_year.$request->to_week,
					'Project_Id' => $request->Project_Id,
					'Sent_Date' => $request->Sent_Date,
					'Received_Date' =>$request->Received_Date,
					'Checked' => $check,
					'Notes' => $request->Notes,
					'Billing_Date' => $request->Billing_Date,
					'Billing_no' => $request->Billing_no,
					'created_at' => time(),
					'updated_at' => time(),
					'status_id' => $request->status_id,
					'unit' => $project_detail->unit,
					'number_chain' => $project_detail->number_chain,
					'price' => $project_detail->price,
					'purchase_price' => $project_detail->purchase_price,
					'number_times' => $project_detail->number_times,
					'prijsafspraak' => $project_detail->prijsafspraak,
					'comments' => $project_detail->comments,

				);

		$Keet_ID = DB::table('tblkeetcard')->insertGetId($data);
		//echo $week_ID; die;
		if (!empty($request->Save)) {
			Session::flash('message', ' Nieuwe Weekstaat Keetonderhoud is met success toegevoegd.');
			return redirect('admin/Edit-Keetonderhoud/'.$Keet_ID);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Nieuwe Weekstaat Keetonderhoud is met success toegevoegd.');
		return redirect('admin/Keetonderhoud');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Nieuwe Weekstaat Keetonderhoud is met success toegevoegd.');
		return redirect('admin/Add-Keetonderhoud');
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


	public function EditKeetonderhoud($id) {

		$Keetcard = new Keetcard();
		$comment_model = new Comment();
		$AllProjects = $Keetcard->GetAllProjects();
		$AllEmployees = $Keetcard->GetAllEmployees();
		$GetWeekCardDetails = $Keetcard->GetKeetcardDetails($id);
		// dd($GetWeekCardDetails);
		$Comments = DB::table('tblcomments')->select('*')->orderBy('comments','ASC')->get();
		$GetTimeCards = $Keetcard->GetKeetTimeCards($id);
		$AllStatus = DB::table('tblstatus')->where('active',1)->select('*')->orderBy('name','asc')->get();
		$attachments = KeetcardAttachment::where('keetcard_id', '=', $id)->get();
		/*echo '<pre>';
		print_r($GetTimeCards);
		die;*/
		$weeks = DB::table('tblkeetcard')->where('id', '=', $id)->first();
		$from = (int)$weeks->fr_Keeknumber;
		$to = (int)$weeks->to_Keeknumber;
		$total_weeks = range($from,$to);
// dd($total_weeks);
		if (empty($GetWeekCardDetails)) {
		return redirect('admin/404');
		}

		$record 						 = $this->sumAllHoursForKetterhoundReport($id);
		$sumAllHours  			 = $record->hours;
		$sumAllAmount 			 = $record->amount;
		$sumAllPurchasePrice = $record->purchase_price;

		// dd($record);

		/*echo '<pre>';
		print_r($Comments);
		die;	'GetTimeCards',*/

 		return View('admin.keet.edit',compact('AllProjects','GetWeekCardDetails','AllEmployees','Comments','GetTimeCards', 'AllStatus', 'attachments', 'id', 'total_weeks', 'sumAllHours', 'sumAllAmount', 'sumAllPurchasePrice'));
	}

	public function updateKeetWeekCardData(Request $request)
	{
		$data = $request->data;

		$record = KeetWeekcard::findOrFail($data['id']);
		$record->price_agreement = $data['price_agreement'];

		if ($data['price_agreement'] == 0) { // means if per KEER
			$record->times_per_week  = $data['times_per_week'];
			$record->unit 				   = $data['unit'];
			$record->number_of_units = ($data['unit'] == 0) ? $data['number_of_units'] : null ;

		} else { // if per UUR
			$record->times_per_week  = null;
			$record->unit 				   = null;
			$record->number_of_units = null;
		}


		$record->price					 = $data['price'];
		$record->purchase_price  = $data['purchase_price'];
		$record->comments				 = $data['comments'];
		$record->save();

		$this->saveTotalAmount($data['id']);

		Session::flash('message', 'Record geüpdatet met succes');

		return response([
			'message' => 'successful'
		], 200);

	}

		/////////////////////// Keethound attachment work starts here ///////////////////

		public function uploadWeekstaatDocument(Request $request)
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
			$post = $request->all();
			$file = $post['File'];
			$keetcard_id     = $request['weekcard_id'];
			$destinationPath = 'uploads/keetonderhoud/document/' . $keetcard_id;
			$filename 			 = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();

			$post['File']->move($destinationPath,$filename);

			// storing records in database table
			$attachment = new KeetcardAttachment;
			$attachment->keetcard_id = $keetcard_id;
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
			$file = KeetcardAttachment::findOrFail($id);
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
			$file = KeetcardAttachment::findOrFail($id);

			return response() -> json([
				'data' => [
					'id'   => $file->id,
					'weekCardID' => $file->keetcard_id,
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
			$attachment = KeetcardAttachment::findOrFail($request->fileId);
			$attachment->keetcard_id = $request->weekCardID;
			$attachment->note 			 = $request->note;
			$attachment->added 			 = Carbon::now();

			$attachment->save();


			// Flash message
			Session::flash('message', 'Document succesvol bijgewerkt');

			return redirect() -> back();


		}


		/////////////////////// Keethound attachment work starts here ///////////////////

	public function ViewKeetonderhoud($id) {

		$Keetcard = new Keetcard();
		$comment_model = new Comment();
		$AllProjects = $Keetcard->GetAllProjects();
		$AllEmployees = $Keetcard->GetAllEmployees();
		$GetWeekCardDetails = $Keetcard->GetKeetcardDetails($id);
		$Comments = DB::table('tblcomments')->select('*')->orderBy('comments','ASC')->get();
		$GetTimeCards = $Keetcard->GetKeetTimeCards($id);
		/*echo '<pre>';
		print_r($GetTimeCards);
		die;*/

		$weeks = DB::table('tblkeetcard')->where('id', '=', $id)->first();
		$from = (int)$weeks->fr_Keeknumber;
		$to = (int)$weeks->to_Keeknumber;
		$total_weeks = range($from,$to);

		$record 						 = $this->sumAllHoursForKetterhoundReport($id);
		$sumAllHours  			 = $record->hours;
		$sumAllAmount 			 = $record->amount;
		$sumAllPurchasePrice = $record->purchase_price;


		if (empty($GetWeekCardDetails)) {
		return redirect('admin/404');
		}

		/*echo '<pre>';
		print_r($Comments);
		die;	'GetTimeCards',*/

 		return View('admin.keet.view',compact('AllProjects','GetWeekCardDetails','AllEmployees','Comments','GetTimeCards', 'total_weeks', 'sumAllHours', 'sumAllAmount', 'sumAllPurchasePrice'));
	}

	function Update_Keetonderhoud () {
		//print_r($_POST); die;

		$id = $_POST['id'];

		if (empty($_POST['Checked']) ) { $check = 0;} else { $check = 1; }
		$data = array (

						'fr_Keeknumber' => $_POST['year'].$_POST['week'],
						'to_Keeknumber' => $_POST['to_year'].$_POST['to_week'],
						'Sent_Date' => $_POST['Sent_Date'],
						'Received_Date' => @$_POST['Received_Date'],
						'Project_Id' => @$_POST['Project_Id'],
						'Checked' => $check,
						'Notes' => $_POST['Notes'],
						'Billing_Date' => $_POST['Billing_Date'],
						'Billing_no' => $_POST['Billing_no'],
						'notice' => $_POST['notice'],
						'updated_at' =>time(),
						'status_id' => $_POST['status_id'],
					);
		$Keetcard = new Keetcard();
		$Keetcard->UpdateKeetcard($id,$data);

			if (!empty($_POST['Save'])) {
			Session::flash('message', ' Weekstaat Keetonderhoud succesvol bijgewerkt..');
			return redirect('admin/Edit-Keetonderhoud/'.$id);
			//return redirect('admin/weekcard');
		}
		if (!empty($_POST['Save_Close'])) {
		Session::flash('message', ' Weekstaat Keetonderhoud succesvol bijgewerkt..');
		return redirect('admin/Keetonderhoud');
		}

		if (!empty($_POST['Save_New'])) {
		Session::flash('message', ' Weekstaat Keetonderhoud succesvol bijgewerkt..');
		return redirect('admin/Add-Keetonderhoud');
		}





		/*Session::flash('message', ' Weekcard succesvol bijgewerkt..');
		return redirect('admin/weekcard');	*/
	}

	function Post_Keetonderhoud () {

		/*echo '<pre>';
		print_r($_POST);
		die;*/
		$explode = explode('_',$_POST['Employee_Id']);
		$Employee_Id = $explode[0];
		$Employmentagency_id = $explode[1];
		$week_ID = $_POST['weekcard_id'];
		//if (@$_POST['Checked'] =='') { $check = 0;} else { $check = 1; }
		if ($_POST['notes'] == 'other') {
		$Note = $_POST['note_other'];
		} else {
		$Note = $_POST['notes'];
		}
		for($i=0;$i < count($_REQUEST['weeknumber']); $i++) {
		$data = array (
						'Weekcard_Id' => $_POST['weekcard_id'],
						'Employee_Id' => $Employee_Id,
						'weeknumber' => $_REQUEST['weeknumber'][$i],
						'Mon' => $_POST['hours_1'],
						'Tue' => $_POST['hours_2'],
						'Wed' => $_POST['hours_3'],
						'Thu' => $_POST['hours_4'],
						'Fri' => $_POST['hours_5'],
						'Sat' => $_POST['hours_6'],
						'Sun' => $_POST['hours_7'],
						//'Billable' => $check,
						'Notes' => $Note,
						'Employmentagency_id' => $Employmentagency_id,
						);

		$Keetcard = new Keetcard();
		$AllProjects = $Keetcard->AddKeetTimeCard($data);

		// Update KeetWeekcard
		$this->updateKeetWeekcard($_POST['weekcard_id'], $_REQUEST['weeknumber'][$i]);

		}
		/*print_r($data);

		die;*/

		Session::flash('message', 'Time Card succesvol ingevoegd !');

			if(!empty($_POST['weekprojects'])) {
				return redirect('admin/ProjectsByWeek/'.$_POST['Weeknumber']);
			} else {
				return redirect('admin/Edit-Keetonderhoud/'.$week_ID);
			}

	}
		public function DeleteKeetTimeCard ($id) { //--

		$Keetcard = new Keetcard();
		$record = DB::table('tbl_keet_timecard')->where('id', $id)->select('Weekcard_Id', 'weeknumber')->first();
		$GetTimeCardWeekID = $Keetcard->GetKeetTimeCardWeekID($id);
		$week_ID = $GetTimeCardWeekID->Weekcard_Id;
		$Keetcard->DeleteKeetTimeCards($id);

		$this->updateKeetWeekcard($record->Weekcard_Id, $record->weeknumber);

		Session::flash('message', 'tijd card succesvol verwijderd !');
		return redirect('admin/Edit-Keetonderhoud/'.$week_ID);
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

		public function DeleteKeetonderhoud ($id) {

		$Keetcard = new Keetcard();

		// Delete Attachements
		$attachments = KeetcardAttachment::where('keetcard_id', '=', $id)->get();
		if (sizeof($attachments) > 0) {
			foreach ($attachments as $attachment) {
				unlink($attachment->file_path);
				$attachment->delete();
			}
		}

		//Delete records from tbl_keet_timecard
		DB::delete('
			delete from tbl_keet_timecard
			where Weekcard_Id = :ID
		', ['ID' => $id]);

		//Delete records from tbl_keet_weekcard
		DB::delete('
			delete from tbl_keet_weekcard
			where Weekcard_Id = :ID
		', ['ID' => $id]);

		// Delete record from tblkeetcard
		$Keetcard->DeleteKeetcard($id);
		Session::flash('message', 'Weekstaat Keetonderhoud succesvol verwijderd!');
		return redirect('admin/Keetonderhoud');
		}

		public function AjaxUpdateKeettime()
		{
			$hours_1 = Input::get('hours_1');
			$hours_2 = Input::get('hours_2');
			$hours_3 = Input::get('hours_3');
			$hours_4 = Input::get('hours_4');
			$hours_5 = Input::get('hours_5');
			$hours_6 = Input::get('hours_6');
			$hours_7 = Input::get('hours_7');
			$rate = Input::get('rate');
			$rate_cost = Input::get('rate_cost');
			$checked = Input::get('checked');
			$notes = Input::get('notes');
			$timecard_id = Input::get('timecard_id');
			$weekcard_id = Input::get('weekcard_id');
			if ($checked == 1){ $check =1;} else { $check =0;}
				$data = array(
							'Mon' => $hours_1,
							'Tue' => $hours_2,
							'Wed' => $hours_3,
							'Thu' => $hours_4,
							'Fri' => $hours_5,
							'Sat' => $hours_6,
							'Sun' => $hours_7,
							'Rate' => $rate,
							'Rate_Cost' => $rate_cost,
							'Billable' => $check,
							'Notes' => $notes,
							'Weekcard_Id' => $weekcard_id
						);
				DB::table('tbl_keet_timecard')->where('id', $timecard_id)->update($data);
				$record = DB::table('tbl_keet_timecard')->where('id', $timecard_id)->select('Weekcard_Id', 'weeknumber')->first();
				$this->updateKeetWeekcard($record->Weekcard_Id, $record->weeknumber);

				Session::flash('message', ' Regel van gewerkte uren is met success bijgewerkt.');
				// return redirect() -> back();

		}


		public function Update_WeekTime () {

		//print_r($_POST); die;


		$week_model = new Weekcard();
		$week_ID = $_POST['weekcard_id'];
		// dd($week_ID);
		$Timecard_ID = $_POST['timecard_id'];
		if (@$_POST['Received_Date'] =='') { $check = 0;} else { $check = 1; }

			$data = array (
						//'Weekcard_Id' => $_POST['weekcard_id'],
						//'Employee_Id' => $Employee_Id,
						'Mon' => $_POST['hours_1'],
						'Tue' => $_POST['hours_2'],
						'Wed' => $_POST['hours_3'],
						'Thu' => $_POST['hours_4'],
						'Fri' => $_POST['hours_5'],
						'Sat' => $_POST['hours_6'],
						'Sun' => $_POST['hours_7'],
						'Billable' => $check,
						'Notes' => $_POST['notes'],
						//'Employmentagency_id' => $Employmentagency_id,
						);
		$WeekcardData = array (
								'id' => $_POST['id'],
								'Sent_Date' => $_POST['Sent_Date'],
								'Received_Date' => $_POST['Received_Date'],
								'Project_Id' => @$_POST['Project_Id'],
								'Checked' => $check,
								'Notes' => $_POST['Notes'],
								'Weeknumber' => $_POST['year'].$_POST['week']
								);

		$week_model->UpdateWeekCard($week_ID,$WeekcardData);
		$UpdateTimecard = $week_model->UpdateTimecard($data,$Timecard_ID);
		// $this->updateKeetWeekcard();

			if (!empty($_POST['Save'])) {
			Session::flash('message', ' Time Card succesvol ingevoegd !');
			return redirect('admin/Edit-weekstaat/'.$week_ID);
			//return redirect('admin/weekcard');
		}
		if (!empty($_POST['Save_Close'])) {
		Session::flash('message', ' Time Card succesvol ingevoegd !');
		return redirect('admin/weekcard');
		}

		if (!empty($_POST['Save_New'])) {
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
			return View('admin.weekstate.weekstaat_projectwise',compact('AllProjects','AllEmployees'));
		}

		public function ProjectsByWeek ($yearWeek = 0) {

			$week_model = new Weekcard();
			//$AllProjects = $week_model->GetAllProjects();
			$AllEmployees = $week_model->GetAllEmployees();
			$Get_Projects = $week_model->GetProjectsByWeek ($yearWeek);
			$Comments = DB::table('tblcomments')->select('*')->orderBy('comments','ASC')->get();
			return View('admin.weekstate.weekstaat_projectwise',compact('AllProjects','AllEmployees','Get_Projects','Comments'));
		}




		public function KeetWeekcardPDF ($id) {

			$Keetcard = new Keetcard();
			$GetWeekCardDetails = $Keetcard->GetKeetcardDetails($id);
			$week_details = $Keetcard->KeetWeekcardReportByID($id);
			if (empty($week_details)) {
			return redirect('admin/404');
			}
			//$week_Employees = $Keetcard->GetTimeCardEmployeeByWeekID($week_details[0]->Weeknumber);
			$week_Employees = $Keetcard->GetTimeCardEmployeeByWeekID($id);

			$weeks = DB::table('tblkeetcard')->where('id', '=', $id)->first();
			$from = (int)$weeks->fr_Keeknumber;
			$to = (int)$weeks->to_Keeknumber;
			$total_weeks = range($from,$to);

			$record = $this->sumAllHoursForKetterhoundReport($id);
			$sumAllHours  = $record->hours;
			$sumAllAmount = $record->amount;

			$weekstaat_Id = $id;
			// return view ('admin.keet.pdf', compact('week_details','week_Employees','GetWeekCardDetails', 'weekstaat_Id', 'total_weeks', 'sumAllHours', 'sumAllAmount'));
			$pdf= PDF::loadView('admin.keet.pdf', compact('week_details','week_Employees','GetWeekCardDetails', 'weekstaat_Id', 'total_weeks', 'sumAllHours', 'sumAllAmount'));
			$pdf->setPaper('a4' , 'portrait');
			return $pdf->download('Keetonderhoud-'. $id .'.pdf');

		}

		public function Weekcard_email($id) {

			$Keetcard = new Keetcard();
				$week_details = $Keetcard->KeetWeekcardReportByID($id);
				if (empty($week_details)) {
				return redirect('admin/404');
			}

			$attachments = KeetcardAttachment::where('keetcard_id', '=', $id)->get();


			$GetEmails = DB::table('tblproject')->select('*')->where('Id','=',$week_details[0]->Project_Id)->get();

			$projectName = $week_details[0]->Project;

			return View('admin.keet.email',compact('week_details','GetEmails','GetWeekCardDetails', 'id', 'projectName', 'attachments', 'id'));
		}

		public function weekcard_sent() {

			$id = Input::get('weekcard_Id');
			$text = Input::get('Text');
			$weeknumber = Input::get('weeknumber');
			$weekstaat_Id = Input::get('weekstaat_Id');
			$attachFiles = Input::get('fileid') ? Input::get('fileid') : '';
			// dd($weekstaat_Id);

			//$email = 'khurram.lucky@gmail.com'; Input::get('email');

			$Keetcard = new Keetcard();
			$week_details = $Keetcard->KeetWeekcardReportByID($id);
			$GetWeekCardDetails = $Keetcard->GetKeetcardDetails($id);

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

		$weeks = DB::table('tblkeetcard')->where('id', '=', $id)->first();
		$from = (int)$weeks->fr_Keeknumber;
		$to = (int)$weeks->to_Keeknumber;
		$total_weeks = range($from,$to);

		$record = $this->sumAllHoursForKetterhoundReport($id);
		$sumAllHours  = $record->hours;
		$sumAllAmount = $record->amount;


			/*echo '<pre>';
			print_r($week_details);
			 die;*/
			$pdf['value'] = $week_details[0]->Weeknumber;			//die;
			$week_Employees = $Keetcard->GetTimeCardEmployeeByWeekID($id);
			//$EmployeeAgency = DB::table('tblemploymentagency')->select('Id,Email')->where('Id',$week_details[0]->Employmentagency_Id)->first();
			$pdf['pdf']= PDF::loadView('admin.keet.pdf', compact('week_details','week_Employees','GetWeekCardDetails', 'weekstaat_Id', 'total_weeks', 'sumAllHours', 'sumAllAmount'));
			@$pdf['email']= $AanTo;
			@$pdf['email_cc'] = $CCTo;

			$fromDate = substr($week_details[0]->fr_Keeknumber, 4, 2) . '-' . substr($week_details[0]->fr_Keeknumber, 0, 4);
			// dd($from);
			$toDate   = substr($week_details[0]->to_Keeknumber, 4, 2) . '-' . substr($week_details[0]->to_Keeknumber, 0, 4);

			if (!empty($CCTo) && !empty($AanTo)) {
			$EmailSent = Mail::raw($text, function($message) use ($pdf, $weekstaat_Id, $fromDate, $toDate, $week_details, $attachFiles) {
			$message->to(@$pdf['email'])
								// ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
								->bcc('planning.ecu@outlook.com','Easy Clean Up BV')
								->cc(@$pdf['email_cc'])
								->from('planning@easycleanup.nl')
								->subject('Weekstaat Keetonderhoud van de week ' . $fromDate . ' t/m ' . $toDate . ' van het project: ' . $week_details[0]->Project)
								->attachData($pdf['pdf']
								->output(), "Keetonderhoud-". $weekstaat_Id .".pdf");

								if ($attachFiles){
									$files = KeetcardAttachment::whereIn('id', $attachFiles)->get();
										foreach($files as $file) {
											$message->attach($file->file_path);
										}
								}

							});


			}
			if (empty($CCTo) && !empty($AanTo)) {
			$EmailSent = Mail::raw($text, function($message) use ($pdf, $weekstaat_Id, $fromDate, $toDate, $week_details, $attachFiles) {
			$message->to(@$pdf['email'])
							// ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
							->bcc('planning.ecu@outlook.com','Easy Clean Up BV')
							->from('planning@easycleanup.nl')
							->subject('Weekstaat Keetonderhoud van de week ' . $fromDate . ' t/m ' . $toDate . ' van het project: ' . $week_details[0]->Project)
							->attachData($pdf['pdf']
							->output(), "Keetonderhoud-". $weekstaat_Id .".pdf");

							if ($attachFiles){
								$files = KeetcardAttachment::whereIn('id', $attachFiles)->get();
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

			return redirect('admin/Keetonderhoudweekcard_email/'.$id);
		}


		function getKeekcards () {


			$V_Weekcards = DB::table('v_getKeethoundRecords')->select('*');


			 return Datatables::of($V_Weekcards)
			 ->addColumn('fr_Keeknumber' , function ($V_Weekcards) {
				return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->fr_Keeknumber.'</a>';
			 })
			 ->addColumn('to_Keeknumber' , function ($V_Weekcards) {
				return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->to_Keeknumber.'</a>';
			 })
			 ->addColumn('Project_Name' , function ($V_Weekcards) {
				return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Project_Name.'</a>';
			 })
			 ->addColumn('Sent_Date' , function ($V_Weekcards) {
				 if ($V_Weekcards->Sent_Date == "0000-00-00" || $V_Weekcards->Sent_Date == "") {
				 return "";
				}
				return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Sent_Date.'</a>';
			 })
			  ->addColumn('Received_Date' , function ($V_Weekcards) {
					if ($V_Weekcards->Received_Date == "0000-00-00" || $V_Weekcards->Received_Date == "") {
 				 	return "";
 				 }
				return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Received_Date.'</a>';
			 })
			 ->addColumn('Billing_Date' , function ($V_Weekcards) {
				 if ($V_Weekcards->Billing_Date == "0000-00-00" || $V_Weekcards->Billing_Date == "") {
				 	return "";
				 }
			 return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->Billing_Date.'</a>';
			})
			->addColumn('Status' , function ($V_Weekcards) {
				return '<a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="">'.$V_Weekcards->status.'</a>';
			 })
			 ->addColumn('Checked' , function ($V_Weekcards) {
				if ($V_Weekcards->Checked == 1) {
					return  ' <a href="ProjectDisapprove/'.$V_Weekcards->id.'" title="afgehandeld" class="label label-success" onClick=\'return confirm("Weet je zeker dat het Weekcard afgehandeld?")\'>Afgehandeld</a>';
				} else {
				return  ' <a href="ProjectApprove/'.$V_Weekcards->id.'" title="Afkeuren" class="label label-danger" onClick=\'return confirm("Weet je zeker dat het Weekcard afgehandeld?")\'>Open</a>';
				}
			 })

			 ->addColumn('Opties' , function ($V_Weekcards) {
				return '<a href="view-Keetonderhoud/'.$V_Weekcards->id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="Edit-Keetonderhoud/'.$V_Weekcards->id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="Keetonderhoud_weekcard_pdf/'. $V_Weekcards->id .'" title="Afdrukken" class="widget-icon">
				<span class="icon-print"></span></a>
				<a href="Keetonderhoudweekcard_email/'. $V_Weekcards->id .'" title="E-mailen" class="widget-icon">
				<span class="icon-envelope"></span></a>
				<a href="Delete-Keetonderhoud/'.$V_Weekcards->id.'" title="Verwijderen" class="widget-icon" onClick=\'return confirm("Weet u het zeker of u deze keetonderhoud weekstaat wilt verwijderen?")\'>
				<span class="icon-trash"></span></a>
				';
				 })
			 ->make(true);



			}

			private function updateKeetWeekcard($weekcard_id, $weekno)
			{

				$oldRecord = $this->checkDataExists($weekcard_id, $weekno);

				if($oldRecord) {
					$record = KeetWeekcard::where('Weekcard_Id', '=', $weekcard_id)
																->where('weeknumber', '=', $weekno)
																->first();
					$hours = $this->sumHours($weekcard_id, $weekno);

					$record->hours = $hours;
					$record->save();

					$this->saveTotalAmount($record->id);

				} else {
					//insert new record

					$projectRecord = $this->getRecordFromProjectsTable($weekcard_id);
					$hours         = $this->sumHours($weekcard_id, $weekno);
					// dd($hours);
					$projectID		 = $this->getProjectIDFromTable($weekcard_id);

					$newRecord = new KeetWeekcard;
					$newRecord->Weekcard_Id = $weekcard_id;
					$newRecord->weeknumber  = $weekno;
					$newRecord->price_agreement = $projectRecord->prijsafspraak;
					$newRecord->times_per_week  = $projectRecord->number_times;
					$newRecord->unit  			    = $projectRecord->unit;
					$newRecord->number_of_units = $projectRecord->number_chain;
					$newRecord->price 					= $projectRecord->price;
					$newRecord->purchase_price 	= $projectRecord->purchase_price;
					$newRecord->comments			 	= $projectRecord->comments;
					$newRecord->hours						= $hours;
					$newRecord->Project_Id			= $projectID;

					$newRecord->save();
					$getNewRecordID = KeetWeekcard::max('id');

					$this->saveTotalAmount($getNewRecordID);
					// dd($getNewRecordID);

				}


			}

			private function sumHours($weekcard_id, $weekno)
			{
				$hours = DB::table('tbl_keet_timecard')
											->where('Weekcard_Id', '=', $weekcard_id)
											->where('weeknumber', '=', $weekno)
											->select(DB::raw('SUM(Mon+Tue+Wed+Thu+Fri+Sat+Sun) as hours'))
											->pluck('hours');
				return $hours;
			}

			private function getRecordFromProjectsTable($id)
			{
				$getProjectID = $this->getProjectIDFromTable($id);

				$projectRecords = DB::table('tblproject')
													->where('Id', '=', $getProjectID)
													->select('prijsafspraak', 'number_times', 'unit', 'number_chain','price', 'purchase_price', 'comments')
													->first();

				return $projectRecords;

			}

			private function checkDataExists($weekcard_id, $weekno)
			{
				return !! KeetWeekcard::where('Weekcard_Id', '=', $weekcard_id)
														->where('weeknumber', '=', $weekno)
														->count();
			}

			private function getProjectIDFromTable($id)
			{
				$keetcard = DB::table('tblkeetcard')
												->where('id', '=', $id)
												->select('Project_Id')
												->first();

				return $keetcard->Project_Id;
			}

			private function saveTotalAmount($id)
			{
				$record = KeetWeekcard::findOrFail($id);
				$record->total_purchase_price = $this->calculateKeetcardWeeklyPurchasePrice($id);
				$record->total_amount   			= $this->calculateKeetcardWeeklyAmount($id);
				$record->save();
			}

			private function calculateKeetcardWeeklyAmount($id)
			{
				$record = KeetWeekcard::findOrFail($id);
				$total_amount = 0;

				if($record->price_agreement) { // per uur (if not 0)
					$total_amount = $record->price * $record->hours;
					return $total_amount;


				} else { // per keer (if 0)

						if ($record->unit) { // price per project (if not 0)
							$total_amount = $record->times_per_week * $record->price ;
							return $total_amount;

						} else { // price per unit
							$total_amount = $record->times_per_week * $record->number_of_units * $record->price;
							return $total_amount;

						}

				}

			}

			private function sumAllHoursForKetterhoundReport($id)
			{
				// return KeetWeekcard::where('Weekcard_Id', '=', $id)
				// 									->select(DB::raw('SUM(hours) as hours'), DB::raw('SUM(total_amount) as amount'))
				// 									->first();

				return KeetWeekcard::where('Weekcard_Id', '=', $id)
													->where('hours', '<>', 0)
													->select(DB::raw('SUM(hours) as hours'), DB::raw('SUM(total_amount) as amount'), DB::raw('SUM(total_purchase_price) as purchase_price'))
													->first();
			}

			private function calculateKeetcardWeeklyPurchasePrice($id)
			{
				$record = KeetWeekcard::findOrFail($id);
				$total_amount = 0;

				if($record->price_agreement) { // per uur (if not 0)
					$total_amount = $record->purchase_price * $record->hours;
					return $total_amount;


				} else { // per keer (if 0)

						if ($record->unit) { // price per project (if not 0)
							$total_amount = $record->times_per_week * $record->purchase_price ;
							return $total_amount;

						} else { // price per unit
							$total_amount = $record->times_per_week * $record->number_of_units * $record->purchase_price;
							return $total_amount;

						}

				}
			}


}
