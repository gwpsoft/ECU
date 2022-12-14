<?php

namespace App\Http\Controllers;

use App\reports;
use App\Projects;
use Session;
use Mail;
use Validator;
use DB;
use PDF;
use Request;
use Auth;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //
	
	public function Project_Overview_Containers($project_id=0,$startDate=0,$EndDate=0) {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		 if ($project_id == 0) { $project_id = '';}
		if ($startDate == 0) { $startDate = '';}
		if ($EndDate == 0) { $EndDate = '';}
		
		$user_id =  Session::get('front_userID');
		$AllProjects  = Projects:: where(array ('Active' => 1, 'Customer_id' => $user_id))->orderBy('Name','ASC')->get();	
		$Report_model = new reports();
		$ProjectWiseBons = $Report_model->Project_Overview_Containers_ByUsers($project_id,$user_id,$startDate,$EndDate);
		$MarketPrice = DB::table('tblmarketrate')->first();	
		
		return View('front.users.ProjectWiseContainerBon',compact('MarketPrice','AllProjects','ProjectWiseBons','project_id'));
	
	}
	
	public function PDF_Containers($project_id=0,$startDate=0,$EndDate=0) {
	
		if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		if ($project_id == 0) { $project_id = '';}
		if ($startDate == 0) { $startDate = '';}
		if ($EndDate == 0) { $EndDate = '';}
		
		$user_id =  Session::get('front_userID');
		$AllProjects  = Projects:: where(array ('Active' => 1, 'Customer_id' => $user_id))->orderBy('Name','ASC')->get();	
		$Report_model = new reports();
		$ProjectWiseBons = $Report_model->Project_Overview_Containers_ByUsers($project_id,$user_id,$startDate,$EndDate);
		$Project = DB::table('tblproject')
		->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.id')
		->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.id', 'left outer')
		->select('tblproject.Name as Pro_Name', 'tblcontact.Lastname as Con_Lastname', 'tblcontact.Firstname as Con_Firstname',
		'tblcontact.Email as Con_Email','tblcustomer.Name as Cus_Name')
		->where('tblproject.id', '=', $ProjectWiseBons[0]->Project_Id)
		->first();
		
		$MarketPrice = DB::table('tblmarketrate')->first();
		$pdf= PDF::loadView('front.users.pdf_ProjectWiseContainerBon',
		compact('MarketPrice','AllProjects','ProjectWiseBons','project_id','Project','startDate','EndDate'));
		return $pdf->download('ProjectWiseContainer.pdf');	
	}
	
}
