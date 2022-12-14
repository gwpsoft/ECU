<?php

namespace App\Http\Controllers;

use Request;
use Session;
use Validator;
use DB;
use Input;
use Auth;
use Response;
use PDF;
use App\Shippingcompany;
use App\Projects;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    	
	public function index () {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		$Orders = DB::table('tblordercontainer')->where('project_name',Session::get('ProjectID'))->orderBy('id','DESC')->get(); 
		/*echo Session::get('front_userID');
		print_r($Orders);*/
	return view('front.orders.orders',compact('Orders'));
	}
	
	public function create() { 
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		$current_Username = Session::get('front_name'); 
		$CustomerID = Session::get('front_userID');
		 $contact_id = Session::get('contact_id');
		$ProjectID = Session::get('ProjectID');	
		$Projects = DB::table('tblproject')->where('Active',1)->where(array ('Id'=> $ProjectID))->get();
		//$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->get();
		$Contacts = DB::table('tblcontact')->select('*')->where('Active',1)->where('Id',$Projects[0]->Contact_Id)->get();
		/*print_r($Contacts);
		die;*/
		
	return view('front.orders.create',compact('Contacts','current_Username','Projects','contact_id'));	
	}
	
	function store() {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		$Order =  array (
			//'shippingcomapny_id' => Input::get('shippingcomapny_id'),
			'Email' => Input::get('Email'),
			'Fax' => Input::get('Fax'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => Input::get('Nummer'),
			'Customer_id' => Session::get('front_userID'),
			'Customer_Name' => Input::get('Customer_Name'),
			'Projectnummer' => Input::get('Projectnummer'),
			'project_name' => Input::get('project_id'),
			'Work_Address' => Input::get('Work_Address'),
			'Postcode' => Input::get('Postcode'),
			'Contact' => Input::get('Contact'),
			'phone_number' => Input::get('phone_number'),
			'output_Date' => Input::get('output_Date'),
			'Half_day_time' => Input::get('Half_day_time'),
			'Comments' => Input::get('Comments'),
			
			'3m3_plaats' => Input::get('3m3_plaats'),
			'3m3_Wissel' => Input::get('3m3_Wissel'),
			'3m3_Afvoer' => Input::get('3m3_Afvoer'),
			
			'6m3_plaats' => Input::get('6m3_plaats'),
			'6m3_Wissel' => Input::get('6m3_Wissel'),
			'6m3_Afvoer' => Input::get('6m3_Afvoer'),
			
			'10m3_plaats' => Input::get('10m3_plaats'),
			'10m3_Wissel' => Input::get('10m3_Wissel'),
			'10m3_Afvoer' => Input::get('10m3_Afvoer'),
			
			'10m3_plaats_dicht' => Input::get('10m3_plaats_dicht'),
			'10m3_Wissel_dicht' => Input::get('10m3_Wissel_dicht'),
			'10m3_Afvoer_dicht' => Input::get('10m3_Afvoer_dicht'),
			
			'20m3_plaats' => Input::get('20m3_plaats'),
			'20m3_Wissel' => Input::get('20m3_Wissel'),
			'20m3_Afvoer' => Input::get('20m3_Afvoer'),
			
			'40m3_plaats' => Input::get('40m3_plaats'),
			'40m3_Wissel' => Input::get('40m3_Wissel'),
			'40m3_Afvoer' => Input::get('40m3_Afvoer'),
			
			'3m3_Bsa' => Input::get('3m3_Bsa'),
			'3m3_Puin' => Input::get('3m3_Puin'),
			'3m3_Hout' => Input::get('3m3_Hout'),
			'3m3_Diverse' => Input::get('3m3_Diverse'),
			'3m3_Plastic_Folie' => Input::get('3m3_Plastic_Folie'),
			'3m3_Papier' => Input::get('3m3_Papier'),
			'3m3_Opmerkingen' => Input::get('3m3_Opmerkingen'),
			
			'6m3_Bsa' => Input::get('6m3_Bsa'),
			'6m3_Puin' => Input::get('6m3_Puin'),
			'6m3_Hout' => Input::get('6m3_Hout'),
			'6m3_Diverse' => Input::get('6m3_Diverse'),
			'6m3_Plastic_Folie' => Input::get('6m3_Plastic_Folie'),
			'6m3_Papier' => Input::get('6m3_Papier'),
			'6m3_Opmerkingen' => Input::get('6m3_Opmerkingen'),
			
			'10m3_Bsa' => Input::get('10m3_Bsa'),
			'10m3_Puin' => Input::get('10m3_Puin'),
			'10m3_Hout' => Input::get('10m3_Hout'),
			'10m3_Diverse' => Input::get('10m3_Diverse'),
			'10m3_Plastic_Folie' => Input::get('10m3_Plastic_Folie'),
			'10m3_Papier' => Input::get('10m3_Papier'),
			'10m3_Opmerkingen' =>Input::get('10m3_Opmerkingen'),
			
			'10m3_Bsa_dicht' => Input::get('10m3_Bsa_dicht'),
			'10m3_Puin_dicht' => Input::get('10m3_Puin_dicht'),
			'10m3_Hout_dicht' => Input::get('10m3_Hout_dicht'),
			'10m3_Diverse_dicht' => Input::get('10m3_Diverse_dicht'),
			'10m3_Plastic_Folie_dicht' => Input::get('10m3_Plastic_Folie_dicht'),
			'10m3_Papier_dicht' => Input::get('10m3_Papier_dicht'),
			'10m3_Opmerkingen_dicht' => Input::get('10m3_Opmerkingen_dicht'),
			
			'20m3_Bsa' => Input::get('20m3_Bsa'),
			'20m3_Puin' => Input::get('20m3_Puin'),
			'20m3_Hout' => Input::get('20m3_Hout'),
			'20m3_Diverse' => Input::get('20m3_Diverse'),
			'20m3_Plastic_Folie' => Input::get('20m3_Plastic_Folie'),
			'20m3_Papier' => Input::get('20m3_Papier'),
			'20m3_Opmerkingen' => Input::get('20m3_Opmerkingen'),
			'40m3_Bsa' => Input::get('40m3_Bsa'),
			'40m3_Puin' => Input::get('40m3_Puin'),
			'40m3_Hout' => Input::get('40m3_Hout'),
			'40m3_Diverse' => Input::get('40m3_Diverse'),
			'40m3_Plastic_Folie' => Input::get('40m3_Plastic_Folie'),
			'40m3_Papier' => Input::get('40m3_Papier'),
			'40m3_Opmerkingen' => Input::get('40m3_Opmerkingen'),
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		
		DB::table('tblordercontainer')->insert($Order);
		Session::flash('message', 'Bestel ingediend .. !');
		return redirect('OrderWasteContainers');
		}
	
	function edit ($id) {
		
		$CustomerID = Session::get('front_userID');
		$ContactID = Session::get('contact_id');
		$Shippingcompany = Shippingcompany::all();	
		$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->where(array ('Customer_id'=> $CustomerID))->get();
		$query = DB::table('tblordercontainer')->where(array ('id'=> $id))->first();
		/*print_r($query);
		die;*/
		
		$data = get_object_vars($query);
		return View('front.orders.edit',compact('data','Shippingcompany','Projects'));
		
	}
	
	
	function update() {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		$Nummer =  DB::table('tblordercontainer')->max('Nummer'); 
		$status = Input::get('Status');
		if ($status == 1) { $updateNummer = $Nummer+1; $Rev_Nummer =  Input::get('Rev_Nummer');}
		else {$updateNummer = Input::get('Nummer'); $Rev_Nummer = 0;}
		
		$Order =  array (
			//'shippingcomapny_id' => Input::get('shippingcomapny_id'),
			'Email' => Input::get('Email'),
			'Fax' => Input::get('Fax'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => $updateNummer,
			'Status' => Input::get('Status'),
			'Rev_Nummer' => $Rev_Nummer,
			'Customer_id' => Input::get('Customer_id'),
			'Customer_Name' => Input::get('Customer_Name'),
			'Projectnummer' => Input::get('Projectnummer'),
			'project_name' => Input::get('project_id'),
			'Work_Address' => Input::get('Work_Address'),
			'Postcode' => Input::get('Postcode'),
			'Contact' => Input::get('Contact'),
			'phone_number' => Input::get('phone_number'),
			'output_Date' => Input::get('output_Date'),
			'Half_day_time' => Input::get('Half_day_time'),
			'Comments' => Input::get('Comments'),
			
			'3m3_plaats' => Input::get('3m3_plaats'),
			'3m3_Wissel' => Input::get('3m3_Wissel'),
			'3m3_Afvoer' => Input::get('3m3_Afvoer'),
			
			'6m3_plaats' => Input::get('6m3_plaats'),
			'6m3_Wissel' => Input::get('6m3_Wissel'),
			'6m3_Afvoer' => Input::get('6m3_Afvoer'),
			
			'10m3_plaats' => Input::get('10m3_plaats'),
			'10m3_Wissel' => Input::get('10m3_Wissel'),
			'10m3_Afvoer' => Input::get('10m3_Afvoer'),
			
			'10m3_plaats_dicht' => Input::get('10m3_plaats_dicht'),
			'10m3_Wissel_dicht' => Input::get('10m3_Wissel_dicht'),
			'10m3_Afvoer_dicht' => Input::get('10m3_Afvoer_dicht'),
			
			'20m3_plaats' => Input::get('20m3_plaats'),
			'20m3_Wissel' => Input::get('20m3_Wissel'),
			'20m3_Afvoer' => Input::get('20m3_Afvoer'),
			
			'40m3_plaats' => Input::get('40m3_plaats'),
			'40m3_Wissel' => Input::get('40m3_Wissel'),
			'40m3_Afvoer' => Input::get('40m3_Afvoer'),
			
			'3m3_Bsa' => Input::get('3m3_Bsa'),
			'3m3_Puin' => Input::get('3m3_Puin'),
			'3m3_Hout' => Input::get('3m3_Hout'),
			'3m3_Diverse' => Input::get('3m3_Diverse'),
			'3m3_Plastic_Folie' => Input::get('3m3_Plastic_Folie'),
			'3m3_Papier' => Input::get('3m3_Papier'),
			'3m3_Opmerkingen' => Input::get('3m3_Opmerkingen'),
			
			'6m3_Bsa' => Input::get('6m3_Bsa'),
			'6m3_Puin' => Input::get('6m3_Puin'),
			'6m3_Hout' => Input::get('6m3_Hout'),
			'6m3_Diverse' => Input::get('6m3_Diverse'),
			'6m3_Plastic_Folie' => Input::get('6m3_Plastic_Folie'),
			'6m3_Papier' => Input::get('6m3_Papier'),
			'6m3_Opmerkingen' => Input::get('6m3_Opmerkingen'),
			
			'10m3_Bsa' => Input::get('10m3_Bsa'),
			'10m3_Puin' => Input::get('10m3_Puin'),
			'10m3_Hout' => Input::get('10m3_Hout'),
			'10m3_Diverse' => Input::get('10m3_Diverse'),
			'10m3_Plastic_Folie' => Input::get('10m3_Plastic_Folie'),
			'10m3_Papier' => Input::get('10m3_Papier'),
			'10m3_Opmerkingen' =>Input::get('10m3_Opmerkingen'),
			
			'10m3_Bsa_dicht' => Input::get('10m3_Bsa_dicht'),
			'10m3_Puin_dicht' => Input::get('10m3_Puin_dicht'),
			'10m3_Hout_dicht' => Input::get('10m3_Hout_dicht'),
			'10m3_Diverse_dicht' => Input::get('10m3_Diverse_dicht'),
			'10m3_Plastic_Folie_dicht' => Input::get('10m3_Plastic_Folie_dicht'),
			'10m3_Papier_dicht' => Input::get('10m3_Papier_dicht'),
			'10m3_Opmerkingen_dicht' => Input::get('10m3_Opmerkingen_dicht'),
			
			'20m3_Bsa' => Input::get('20m3_Bsa'),
			'20m3_Puin' => Input::get('20m3_Puin'),
			'20m3_Hout' => Input::get('20m3_Hout'),
			'20m3_Diverse' => Input::get('20m3_Diverse'),
			'20m3_Plastic_Folie' => Input::get('20m3_Plastic_Folie'),
			'20m3_Papier' => Input::get('20m3_Papier'),
			'20m3_Opmerkingen' => Input::get('20m3_Opmerkingen'),
			'40m3_Bsa' => Input::get('40m3_Bsa'),
			'40m3_Puin' => Input::get('40m3_Puin'),
			'40m3_Hout' => Input::get('40m3_Hout'),
			'40m3_Diverse' => Input::get('40m3_Diverse'),
			'40m3_Plastic_Folie' => Input::get('40m3_Plastic_Folie'),
			'40m3_Papier' => Input::get('40m3_Papier'),
			'40m3_Opmerkingen' => Input::get('40m3_Opmerkingen'),
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		if ($status == 1) {
		DB::table('tblordercontainer')->insertGetId($Order);
		}
		else {
		DB::table('tblordercontainer')
            ->where('id', Input::get('id'))
            ->update($Order);
		}
		Session::flash('message', 'Bijgewerkt Afvalcontainers !');
		return redirect('OrderWasteContainers');
		
		}
		
		function AjaxprojectName ($project_id) {
		$project = DB::table('tblproject')->select('Name')
			->where('id', '=', $project_id)
            ->first();
		return Response:: json($project);		
		}
		
		function Download_PDF ($id) {
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
			$data = DB::table('tblordercontainer')
		  ->join('tblproject', 'tblordercontainer.project_name', '=', 'tblproject.id' , 'left outer')
		  ->select('tblordercontainer.*','tblproject.Name' )
		->where('tblordercontainer.id', $id)->first();
		/*echo '<pre>';
		print_r($Order);
		die;*/
		$Order = get_object_vars($data);
		//$order['project_name'];
		
		$pdf= PDF::loadView('front.orders.pdf', compact('Order'));
		return $pdf->download('Afvalcontainer_BN-00'.$id.'.pdf');
	
	
	}
		
	
}
