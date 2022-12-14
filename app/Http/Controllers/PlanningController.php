<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Message;
use DB;
use URL;
use Mail;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		
		$id = Session::get('front_userID');		
		 $contact = Session::get('contact_id');	
		$GetUserPlannings = DB:: table( 'tbl_planing_employee' )->select('tblproject.Id as project_id', 'tblproject.Name as project_name',  'tblproject.Location as Location', 'tbl_planing_employee.date as plan_date', 'tbl_planing_employee.plan_id as plan_id','tbl_planing_employee.Notes as Notes','tbl_planing_employee.Geschikt','tblfunctie.name as functie','tbl_planing_employee.employee_id')
		->join('tblproject', 'tbl_planing_employee.project_id', '=', 'tblproject.Id')
		->join('tblfunctie', 'tbl_planing_employee.Geschikt', '=', 'tblfunctie.code' , 'LEFT')
		 -> where( 'employee_id' , '=' , $contact )->orderBy('tbl_planing_employee.date','DESC')->get();
		 
		/* echo '<pre>';
		 print_r($GetUserPlannings);
		 die;*/
		 		
		return view('front.employee.planning',compact('GetUserPlannings'));		
    }
	
	
	
	
	
   
}
