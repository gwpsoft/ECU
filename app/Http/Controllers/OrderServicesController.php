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
use App\Department;
use App\Http\Controllers\Controller;

class OrderServicesController extends Controller
{
    	
	public function index () {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		 
		
		$Orders = DB::table('tblorder_services')->where('Contact_id',Session::get('contact_id'))->orderBy('id','DESC')->get(); 
		
	return view('front.OrderServices.orders',compact('Orders'));
	}
	
	public function create() { 
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		 $MaxNummer =  DB::table('tblorder_services')->max('Nummer');
		 $Nummer = sprintf('%02d',$MaxNummer+1);
		$current_Username = Session::get('front_name'); 
		$CustomerID = Session::get('front_userID');
		 $contact_id = Session::get('contact_id');
		$ProjectID = Session::get('ProjectID');	
		
		$Projects = DB::table('tblproject')->where('Active',1)->where(array ('Id'=> $ProjectID))->get();
		$departments = Department::orderBy('Name','ASC')->where('Id',$Projects[0]->Department_Id)->first();
		$Dept = $Projects[0]->Department_Id;
		//$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->get();
		$Contacts = DB::table('tblcontact')->select('*')->where('Active',1)->where('Id',$Projects[0]->Contact_Id)->get();
		
		
	return view('front.OrderServices.create',compact('Contacts','current_Username','Projects','contact_id','Nummer','departments','Dept'));	
	}
	
	function store() {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		 //$Nummer =  DB::table('tblorder_services')->max('Nummer'); 
		 $Nummer =  DB::table('tblorder_services')->count(); 
		$status = Input::get('Status');
		if ($status == 1) { $Rev_Nummer = $Nummer; /*$Rev_Nummer =  Input::get('Rev_Nummer');*/ }
		else { $updateNummer = Input::get('Nummer'); $Rev_Nummer = 0;}
		 if (empty(Input::get('Nummer'))) { $updateNummer = $Nummer+1;}
		 
		 
		$Order =  array (
			//'shippingcomapny_id' => Input::get('shippingcomapny_id'),
			/*'Email' => Input::get('Email'),*/
			'Department_Id' => Input::get('Department_Id'),	
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => $updateNummer,
			'Rev_Nummer' => $Rev_Nummer,
			'Customer_id' => Session::get('front_userID'),
			'Customer_Name' => Input::get('Customer_Name'),
			'Projectnummer' => 1, //Input::get('Projectnummer'),
			'project_name' => Input::get('project_id'),
			'Work_Address' => Input::get('Work_Address'),
			'Postcode' => Input::get('Postcode'),
			'Afdeling' => Input::get('Afdeling'),
			'Contact_id' => Input::get('con_id'),
			'phone_number' => Input::get('phone_number'),
			'con_Telefoonnummer' => Input::get('con_Telefoonnummer'),
			'con_Mobilenummer' => Input::get('con_Mobilenummer'),
			'con_Aangenomendoor' => Input::get('con_Aangenomendoor'),
			'Uitvoerder' => Input::get('Uitvoerder'),
			'Begindatum' => Input::get('Begindatum'),
			'Begintijd' => Input::get('Begintijd'),
			'Aantal_Mensen' => Input::get('Aantal_Mensen'),			
			'Hoeveel_Dagen' => Input::get('Hoeveel_Dagen'),
			'Werkzaamheden' => Input::get('Werkzaamheden'),
			'Melden_Bij' => Input::get('Melden_Bij'),			
			'Telefoonnummer' => Input::get('Telefoonnummer'),
			'Benodigheden' => Input::get('Benodigheden'),
			'Opmerkingen' => Input::get('Opmerkingen'),			
			'Anders' => Input::get('Anders'),
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		
		DB::table('tblorder_services')->insert($Order);
		Session::flash('message', 'Bestel ingediend .. !');
		return redirect('OrderServices');
		}
	
	function edit ($id) {
		
		$current_Username = Session::get('front_name'); 
		$CustomerID = Session::get('front_userID');
		$contact_id = Session::get('contact_id');
		$ProjectID = Session::get('ProjectID');	
		$Shippingcompany = Shippingcompany::all();	
		$ProjectID = Session::get('ProjectID');	
		$Projects = DB::table('tblproject')->where('Active',1)->where(array ('Id'=> $ProjectID))->get();
		//$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->where(array ('Customer_id'=> $CustomerID))->get();
		$query = DB::table('tblorder_services')->where(array ('id'=> $id, 'Contact_id'=> $contact_id))->first();
		$departments = Department::orderBy('Name','ASC')->where('Id',$Projects[0]->Department_Id)->first();
		$Dept = $Projects[0]->Department_Id;
		$Contacts = DB::table('tblcontact')->select('*')->where('Active',1)->where('Id',$Projects[0]->Contact_Id)->get();
		$data = get_object_vars($query);
		return View('front.OrderServices.edit',compact('data','Shippingcompany','Contacts','Projects','Dept','contact_id','Nummer','departments','current_Username'));
		
	}
	
	
	function update() {
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		
		$Nummer =  DB::table('tblorder_services')->where('Nummer',Input::get('Nummer'))->count(); 
		
		
		//echo $Nummer ; die;
		
		$status = Input::get('Status');
		if ($status == 1) { $Rev_Nummer = $Nummer; /*$Rev_Nummer =  Input::get('Rev_Nummer');*/}
		else { $updateNummer = Input::get('Nummer'); $Rev_Nummer = 0;}
		
		$Order =  array (
			'Email' => Input::get('Email'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => Input::get('Nummer'),
			'Status' => Input::get('Status'),
			'Rev_Nummer' => $Rev_Nummer,
			'Department_Id' => Input::get('Department_Id'),	
			'Customer_id' => Input::get('Customer_id'),
			'Customer_Name' => Input::get('Customer_Name'),
			'Uitvoerder' => Input::get('Uitvoerder'),
			'Contact_id' => Input::get('contact_id'),
			//'Projectnummer' => Input::get('Projectnummer'),
			'project_name' => Input::get('project_id'),
			'Work_Address' => Input::get('Work_Address'),
			'Postcode' => Input::get('Postcode'),
			'con_Telefoonnummer' => Input::get('con_Telefoonnummer'),
			'con_Mobilenummer' => Input::get('con_Mobilenummer'),
			'con_Aangenomendoor' => Input::get('con_Aangenomendoor'),
			'phone_number' => Input::get('phone_number'),
			'Begindatum' => Input::get('Begindatum'),
			'Begintijd' => Input::get('Begintijd'),
			'Aantal_Mensen' => Input::get('Aantal_Mensen'),			
			'Hoeveel_Dagen' => Input::get('Hoeveel_Dagen'),
			'Werkzaamheden' => Input::get('Werkzaamheden'),
			'Melden_Bij' => Input::get('Melden_Bij'),			
			'Telefoonnummer' => Input::get('Telefoonnummer'),
			'Benodigheden' => Input::get('Benodigheden'),
			'Opmerkingen' => Input::get('Opmerkingen'),			
			'Anders' => Input::get('Anders'),
			'Comments' => Input::get('Comments'),
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		if ($status == 1) {
		DB::table('tblorder_services')->insertGetId($Order);
		}
		else {
		DB::table('tblorder_services')
            ->where('id', Input::get('id'))
            ->update($Order);
		}
		Session::flash('message', 'Bijgewerkt Afvalcontainers !');
		return redirect('OrderServices');
		
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
		 $current_Username = Session::get('front_name'); 
		 $data = DB::table('tblorder_services')
		->join('tblcontact', 'tblorder_services.Contact_id', '=', 'tblcontact.Id' , 'left')
		->select('tblorder_services.*', 'tblcontact.Firstname as con_Firstname','tblcontact.Lastname as con_Lastname' )
		->where('tblorder_services.id', $id)->first();
		if (empty($data)) {
			return redirect('admin/404');			
		}
		
		$Order = get_object_vars($data);
		$project = DB::table('tblproject')->where('Id',$Order['project_name'])->first();		
		$pdf= PDF::loadView('front.OrderServices.pdf', compact('Order','project'));
		return $pdf->download('Aanvraag_Personeel_AP-00'.$id.'.pdf');
	
	
	}
		
	
}
