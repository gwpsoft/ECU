<?php

namespace App\Http\Controllers\admin;
use App\Quote;
use App\User;
use App\Http\Requests\frontend\QuoteRequest;
use Request;
use Session;
use Mail;
use Validator;
use DB;

use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    //
	public function index() {
	
	$data = Quote::get();	
	echo '<pre>';
		print_r($data); die;
	return View('admin.quote.allquotes')->with('data', $data);
    }
	
	public function get_ClientProjects($id){
	 
	    $Project_Quote = DB::table('tblquote')->where('client_id','=',$id)->get();	 		
		return View('admin.quote.allquote',compact('Project_Quote'));	
    }
	
	function edit_ClientProject ($id) {
				
		 $Project_Quote = DB::table('tblquote')->where('id','=',$id)->first();
		 return View('admin.quote.edit',compact('Project_Quote'));
	}	
	
	function Update_ClientProject() {
		
			
		$Project_Quote_Info = Quote::findOrfail($_POST['id']);
		$Project_Quote_Info->update($_POST);
		
		Mail::send('admin/quote/mailers',array('quote'=> $_POST), function($message){
		$GetUserInfo = DB::table('users')->where('id','=',$_POST['client_id'])->first();
		$message->to($GetUserInfo->email,$GetUserInfo->name)->from('khurram.asml@gmail.com')->subject('Enquiry');
			
		});
				
		Session::flash('message', ' Aanvraagformulier bijgewerkt.');
		return redirect('admin/view_clientProjects/'.$_POST['client_id']);		
	}
	
	function ActiveClient($id) {
		
		DB:: table( 'users' )-> where( 'id' , '=' , $id)-> update( array('status' => 1 ));
		Session::flash('message', 'Client succesvol activeren.');
		return redirect('admin/clients');
		
	}
	
	function InactiveClient($id) {
		
		DB:: table( 'users' )-> where( 'id' , '=' , $id)-> update( array('status' => 0 ));
		Session::flash('message', 'client succesvol te inactiveren.');
		return redirect('admin/clients');
		
		
		
	}
	
	
	
	
}
