<?php

namespace App\Http\Controllers\admin;
use App\reports;
use App\EmploymentAgencyReportsAttachment;
use Request;
use Session;
use Validator;
use DB;
use Input;
use PDF;
use Mail;
use App\Http\Controllers\Controller;


class GenerateController extends Controller
{
    //
	public function EmployementAgency_Generate_pdf($id,$weeknumber){

	$Report_model = new reports();
	$firstday = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
	$datestring = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
	// $EmployeeAgency = $Report_model->employmentagencyReport($weeknumber,$id);
	$EmployeeAgency = DB::select('
		select * from tblemploymentagencynotes2 where Employmentagency_Id = :EMPAID and Weeknumber = :WEEKNO
	', [
		"EMPAID" => $id,
		"WEEKNO" => $weeknumber
	]);
	//View('admin.reports.pdf',compact('yearWeek','EmployeeAgency_OverView'));
	// return view('admin.reports.pdf', compact('EmployeeAgency','weeknumber','datestring'));
	$pdf= PDF::loadView('admin.reports.pdf', compact('EmployeeAgency','weeknumber','datestring'));
	//return $pdf->stream();
	return $pdf->download('Weekstaat.pdf');
	}



	public function EmployementAgency_Email($id,$weeknumber){

	$Report_model = new reports();
	$firstday = $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
	$datestring = date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
	// $EmployeeAgency = $Report_model->employmentagencyReport($weeknumber,$id);
	$EmployeeAgency = DB::select('
		select * from tblemploymentagencynotes2 where Employmentagency_Id = :EMPAID and Weeknumber = :WEEKNO
	', [
		"EMPAID" => $id,
		"WEEKNO" => $weeknumber
	]);

	$files = DB::select('
		select * from tblemploymentagencynotes2_attachments WHERE
		employmentagency_Id = :ID and weeknumber = :WEEKNO
	', [
			'ID' 		 => $id,
			'WEEKNO' => $weeknumber
	]);

	$Employmentagency_Id = $id;
	/*$pdf= PDF::loadView('admin.reports.pdf', compact('EmployeeAgency','weeknumber','datestring'));
	$attachment =  $pdf->download('sheet.pdf');*/
	/*echo '<pre>';
	print_r($EmployeeAgency); die;*/
	return View('admin.reports.email',compact('yearWeek','EmployeeAgency','weeknumber', 'files', 'Employmentagency_Id'));
	}

	public function EmployementAgency_Email_Sent(){

		if ($_POST) {
		$id = $_POST['Employmentagency_Id'];
		$weeknumber 	= $_POST['weeknumber'];
		$text 			  = $_POST['Text'];
		$Report_model = new reports();
		$firstday 		= $Report_model->getFirstDayOfWeek(substr($weeknumber,0,4),substr($weeknumber,4,2));
		$datestring 	= date('d-m-Y',$firstday) . ' t/m ' . date('d-m-Y',$firstday+60*60*24*6);
		$attachFiles  = Input::get('fileid') ? Input::get('fileid') : '';

		// $EmployeeAgency = $Report_model->employmentagencyReport($weeknumber,$id);
		$EmployeeAgency = DB::select('
			select * from tblemploymentagencynotes2 where Employmentagency_Id = :EMPAID and Weeknumber = :WEEKNO
		', [
			"EMPAID" => $id,
			"WEEKNO" => $weeknumber
		]);
		$pdf= PDF::loadView('admin.reports.pdf', compact('EmployeeAgency','weeknumber','datestring'));
		//$attachment =  $pdf->download('Weekstaat.pdf');
		//$attachment = $pdf->stream();

		Mail::raw($text, function($message) use ($pdf, $attachFiles) {
			$message->to('khurram.lucky@gmail.com'/*$EmployeeAgency[0]->Employmentagency_email*/,/*$EmployeeAgency[0]->Employmentagency*/'Khurram')
			->from('khurram.asml@gmail.com')
			->subject('Werkbonnen mailen naar')
			->attachData($pdf->output(), "Weekstaat.pdf");

			if ($attachFiles){
				$files = EmploymentAgencyReportsAttachment::whereIn('id', $attachFiles)->get();
					foreach($files as $file) {
						$message->attach($file->file_path);
					}
			}

		});
			Session::flash('message', 'Messages Sent');
			return redirect('admin/report/employmentagency_Email/id/'.$id.'/weeknumber/'.$weeknumber);
		}

	}



}
