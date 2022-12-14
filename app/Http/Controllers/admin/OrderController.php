<?php

namespace App\Http\Controllers\admin;

//use Request;
use Config;
use Session;
use Validator;
use DB;
use Datatables;
use Input;
use Auth;
use Response;
use PDF;
use Mail;
use App\Shippingcompany;
use App\Customers;
use App\Contact;
use App\Department;
use App\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    //

	function index () {

		//$data = DB::table('v_orders')->select('*')->orderBy('id','DESC')->skip(0)->take(50)->get();

		//$data = DB::table('v_orders')->select('*');
		//dd($data);
		//getorders();
		/*$data = DB::table('tblordercontainer')
		->join('tblproject', 'tblordercontainer.project_name', '=', 'tblproject.Id', 'left')
		->join('tblshippingcompany', 'tblordercontainer.Shippingcompany_id', '=', 'tblshippingcompany.id' , 'left')
		->join('tblcustomer', 'tblordercontainer.Customer_id', '=', 'tblcustomer.Id', 'left')
		->select('tblordercontainer.id', 'tblordercontainer.Rev_Nummer','tblordercontainer.Order_Date','tblordercontainer.output_Date')->get();*/

		return View('admin.ordercontainers.orders');
	}

	function getorders (){
		$data = DB::table('v_orders')->select('*');
		//dd($data);

  return Datatables::of($data)
	->addColumn('ID' , function ($data) {
	 return $data->id;
	})
	->addColumn('Rev_Nummer' , function ($data) {

		/*if ($data->status == 1) { $updateNummer = $Nummer; $Rev_Nummer =  $Nummer."-0".$Nummer+1;} // the client is still wowrking on this logic - will be revised laterz -- Fahad
		else { $updateNummer = $Nummer; $Rev_Nummer = 0;}*/

	if($data->Status == 1){
	return "BN-".$data->Nummer."-".sprintf('%02d',$data->Rev_Nummer);
	}
	else{

			return "BN-".$data->Nummer;
	}
		//return $data->Rev_Nummer;
		/*if ($data->Rev_Nummer != 0) {
								 $RevNumber = '-'.$data->Rev_Nummer;
							} else {
							 $RevNumber = '';
						 }*/
		//if($data->Rev_Nummer!=0){
		return "BN-".sprintf('%02d',$data->Rev_Nummer);
		//}
		//else {
			// code...
		//}


	  //return '<a href="Edit-weekstaat/'.$data->Rev_Nummer.'" title="Bewerken" class="">'.$data->Rev_Nummer.'</a>';
	})
	->addColumn('Order_Date' , function ($data) {
	  $OrderDate = (strtotime($data->Order_Date) > 0 ? $data->Order_Date : ' ');
	 return  $OrderDate;
	})
	 ->addColumn('output_Date' , function ($data) {
		 $OutputDate = (strtotime($data->output_Date) > 0 ? $data->output_Date : ' ');
 	 return  $OutputDate;
	 // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
	 //return (strtotime($V_Weekcards->Received_Date) > 0 ? $V_Weekcards->Received_Date : ' ');
	})
	->addColumn('Customer' , function ($data) {
		return $data->Customer;
	 // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
	 //return (strtotime($V_Weekcards->Billing_Date) > 0 ? $V_Weekcards->Billing_Date : ' ');
	})
	->addColumn('Project' , function ($data) {
		return $data->Project;
	 // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
	 //return ($V_Weekcards->name);
	})

	->addColumn('Code' , function ($data) {
		return $data->Code;
	})
	->addColumn('email_sent' , function ($data) {
		//return $data->email_sent;
if($data->email_sent==0){
	return '<span class="label label-danger">In afwachting</span>';
}
else {
	return '<span class="label label-success">Sent (By '.$data->sender.')</span>';
}
	 // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
	 //return ($V_Weekcards->name);
	})
	/*->addColumn('sender_name' , function ($data) {
		return $data->sender_name;
	 // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
	 //return ($V_Weekcards->name);
 })*/
	->addColumn('status' , function ($data) {
		//return $data->Status;
		if($data->Status==0){
			return '<span class="label label-success">Besteld</span>';
		}
		else if ($data->Status==1) {
			return '<span class="label label-warning">Gewijzigd</span>';
		}
		else{
			return '<span class="label label-danger">Geannuleerd</span>';
		}
	 // $SentDate = (strtotime($V_Weekcards->Sent_Date) > 0 ? $V_Weekcards->Sent_Date : ' ');
	 //return ($V_Weekcards->name);
	})

	->addColumn('Opties' , function ($data) {
  //$view_url = URL::to( 'admin/View_OrderWasteContainer',$data->id);
	return '<a href="View_OrderWasteContainer/'.$data->id.'" title="Inzien" class="widget-icon"><span class="icon-eye-open"></span></a>
	<a href="Edit_OrderWasteContainer/'.$data->id.'" title="Bewerken" class="widget-icon"><span class="icon-pencil"></span></a>
	<a href="Delete-OrderWasteContainer/'.$data->id.'" title="Bewerken" class="widget-icon" onClick=\'return confirm("Weet u het zeker of u deze weekstaat wilt verwijderen?")\'><span class="icon-trash"></span></a>
	<a href="Order_print/'.$data->id.'" title="Afdrukken" class="widget-icon"><span class="icon-print"></span></a>
	<a href="Order_email/'.$data->id.'" title="e-mail" class="widget-icon"><span class="icon-envelope"></span></a>';
	/*<a href='echo URL:: to(\'/Edit_OrderWasteContainer\',$data->id );' title='Bewerken' class='widget-icon'><span class='icon-pencil'></span></a>
	<a href='echo URL:: to(\'.admin/Delete-OrderWasteContainer.\',$data->id );' title='Bewerken' class='widget-icon'onClick=\'return confirm(Weet u het zeker of u deze weekstaat wilt verwijderen?)\'><span class='icon-trash'></span></a>
	<a href='echo URL:: to(\'.admin/Order_print.\',$data->id );' title='Afdrukken' class='widget-icon'onClick=\'return confirm(Weet u het zeker of u deze weekstaat wilt verwijderen?)\'><span class='icon-print'></span></a>
	<a href='echo URL:: to(\'.admin/Order_print.\',$data->id );'' title='e-mail' class='widget-icon'><span class='icon-envelope'></span></a>";*/
					 /*<a href="Edit-weekstaat/'.$V_Weekcards->id.'" title="Bewerken" class="widget-icon">
	 <span class="icon-pencil"></span></a>
	 <a href="Delete-weekstaat/'.$V_Weekcards->id.'" title="verwijderen" class="widget-icon" onClick=\'return confirm("Weet u het zeker of u deze weekstaat wilt verwijderen?")\'>
	 <span class="icon-trash"></span></a>';*/

		})
	->make(true);

	}

	function create () {

			$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
			$departments = Department::orderBy('Name','ASC')->get();
			$contacts = Contact::orderBy('Firstname','ASC')->get();
			$Nummer =  DB::table('tblordercontainer')->max('Nummer');
			$latestNummer = $Nummer+1;
			$Shippingcompany = Shippingcompany::orderBy('Companyname','DESC')->get();
			$Projects = Projects::where('Active',1)->orderBy('Name','ASC')->get();

		return View('admin.ordercontainers.create',compact('customers', 'departments', 'contacts','Shippingcompany','Projects','latestNummer'));
		}

	function store () {

		//echo '<pre>';
		//$url = $request->fullUrlWithQuery();
		//print_r($_GET); die;

		$Nummer =  DB::table('tblordercontainer')->max('Nummer');
		//Fahad code starts here
		$source =Input::get('source'); // $request->source;

		/*if($source == 'ecuapp'){

			$project_id = $request->project_id;
			$contact_id = $request->contact_id;

			$project = DB::table('tblproject')
			->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
			->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
			->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
			->select('tblproject.*', 'tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email',
			'tblproject.Notes as pro_Note','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname')
			->where('tblproject.Id',$project_id)->first();

			$contact = DB::table('tblcontact')
			->select('*')
			->where('tblcontact.Id',$contact_id)->first();

			$order =  array (
			'shippingcompany_id' => $project->Shippingcompany_id ,
			'Email' => $contact->Email,
			'Fax' => $contact->Fax,
			'Order_Date' => $request->order_date,
			'time' => $request->order_time,
			'Nummer' => $Nummer+1,
			'Customer_id' => $contact_id,
			'Afdeling' => $project->DeptName,
			'Uitvoerder' => $project->Contact_Firstname." ".$project->Contact_Lastname,
			'Customer_Name' => $project->CustomerName,
			'Projectnummer' => $project->Id,
			'ECU_Project_nr' => 'unknown column',
			'project_name' => $project->Name,
			'Work_Address' => $project->Address,
			'Postcode' => $project->City,
			//'Contact' => Input::get('Contact'),
			'phone_number' => $contact->Phone,
			//'output_Date' => Input::get('output_Date'),
			//'Half_day_time' => Input::get('Half_day_time'),
			//'Comments' => Input::get('Comments'),

			'3m3_plaats' => $request->_3m3_plaats,
			'3m3_Wissel' => $request->_3m3_Wissel,
			'3m3_Afvoer' => $request->_3m3_Afvoer,

			'6m3_plaats' => $request->_6m3_plaats,
			'6m3_Wissel' => $request->_6m3_Wissel,
			'6m3_Afvoer' => $request->_6m3_Afvoer,

			'10m3_plaats' => $request->_10m3_plaats,
			'10m3_Wissel' => $request->_10m3_Wissel,
			'10m3_Afvoer' => $request->_10m3_Afvoer,

			'10m3_plaats_dicht' => $request->_10m3_plaats_dicht,
			'10m3_Wissel_dicht' => $request->_10m3_Wissel_dicht,
			'10m3_Afvoer_dicht' => $request->_10m3_Afvoer_dicht,

			'20m3_plaats' => $request->_20m3_plaats,
			'20m3_Wissel' => $request->_20m3_Wissel,
			'20m3_Afvoer' => $request->_20m3_Afvoer,

			'40m3_plaats' => $request->_40m3_plaat,
			'40m3_Wissel' => $request->_40m3_Wissel,
			'40m3_Afvoer' => $request->_40m3_Afvoer,

			'3m3_Bsa' => $request->_3m3_Bsa,
			'3m3_Puin' => $request->_3m3_Puin,
			'3m3_Hout' => $request->_3m3_Hout,
			'3m3_Diverse' => $request->_3m3_Diverse,
			'3m3_Plastic_Folie' => $request->_3m3_Plastic_Folie,
			'3m3_Papier' => $request->_3m3_Papier,
			'3m3_Opmerkingen' => $request->_3m3_Opmerkingen,

			'6m3_Bsa' => $request->_6m3_Bsa,
			'6m3_Puin' => $request->_6m3_Puin,
			'6m3_Hout' => $request->_6m3_Hout,
			'6m3_Diverse' => $request->_6m3_Diverse,
			'6m3_Plastic_Folie' => $request->_6m3_Plastic_Folie,
			'6m3_Papier' => $request->_6m3_Papier,
			'6m3_Opmerkingen' => $request->_6m3_Opmerkingen,

			'10m3_Bsa' => $request->_10m3_Bsa,
			'10m3_Puin' => $request->_10m3_Puin,
			'10m3_Hout' => $request->_10m3_Hout,
			'10m3_Diverse' => $request->_10m3_Diverse,
			'10m3_Plastic_Folie' => $request->_10m3_Plastic_Folie,
			'10m3_Papier' => $request->_10m3_Papier,
			'10m3_Opmerkingen' => $request->_10m3_Opmerkingen,

			'10m3_Bsa_dicht' => $request->_10m3_Bsa_dicht,
			'10m3_Puin_dicht' => $request->_10m3_Puin_dicht,
			'10m3_Hout_dicht' => $request->_10m3_Hout_dicht,
			'10m3_Diverse_dicht' => $request->_10m3_Diverse_dicht,
			'10m3_Plastic_Folie_dicht' => $request->_10m3_Plastic_Folie_dicht,
			'10m3_Papier_dicht' => $request->_10m3_Papier_dicht,
			'10m3_Opmerkingen_dicht' => $request->_10m3_Opmerkingen_dicht,

			'20m3_Bsa' => $request->_20m3_Bsa,
			'20m3_Puin' => $request->_20m3_Puin,
			'20m3_Hout' => $request->_20m3_Hout,
			'20m3_Diverse' => $request->_20m3_Diverse,
			'20m3_Plastic_Folie' => $request->_20m3_Plastic_Folie,
			'20m3_Papier' => $request->_20m3_Papier,
			'20m3_Opmerkingen' => $request->_20m3_Opmerkingen,

			'40m3_Bsa' => $request->_40m3_Bsa,
			'40m3_Puin' => $request->_40m3_Puin,
			'40m3_Hout' => $request->_40m3_Hout,
			'40m3_Diverse' => $request->_40m3_Diverse,
			'40m3_Plastic_Folie' => $request->_40m3_Papier,
			'40m3_Papier' => $request->_40m3_Papier,
			'40m3_Opmerkingen' => $request->_40m3_Opmerkingen,
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		//print_r($order);
		//die;
			$input = DB::table('tblordercontainer')->insertGetId($order);


			if($input)
			{
				$user_info = array('status' => 1, 'id' => $input);

				return json_encode($user_info);
			}
			else
			{
				$user_info = array('status' => 0, 'message' => 'failed to insert record');

				return json_encode($user_info);
			}

		} */
		if($source == 'ecuapp'){

			$project_id = Input::get('project_id');
			$contact_id = Input::get('contact_id');

			$project = DB::table('tblproject')
	->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
	->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
	->select('tblproject.*', 'tblcustomer.Id as CustomerID', 'tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email','tbldepartment.Id as DeptID',
	'tblproject.Notes as pro_Note','tblcontact.Id as Contact_ID','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname')
	->where('tblproject.Id',$project_id)->first();



			/*$project = DB::table('tblproject')
			->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
			->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
			->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
			->select('tblproject.*', 'tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email',
			'tblproject.Notes as pro_Note','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname')
			->where('tblproject.Id',$project_id)->first();*/

			$contact = DB::table('tblcontact')
			->select('*')
			->where('tblcontact.Id',$project->Contact_ID)->first();

			$order =  array (
			'shippingcompany_id' => $project->Shippingcompany_id ,
			'Email' => $contact->Email,
			'Fax' => $contact->Fax,
			'Order_Date' => Input::get('order_date'),
			'time' => Input::get('order_time'),
			'Nummer' => $Nummer+1,
			'dept_id' => $project->DeptID,
			'Customer_id' => $project->CustomerID,
			'Afdeling' => ($project->DeptName ? $project->DeptName : 'NULL'),
			'Uitvoerder' => $project->Contact_Firstname." ".$project->Contact_Lastname,
			'Customer_Name' => $project->CustomerName,
			'Projectnummer' => $project->Customer_Ref,
			'ECU_Project_nr' => $project->Project_Ref,
			'project_name' => $project->Id,
			'Work_Address' => $project->Address,
			'Postcode' => $project->City,
			'Ordered_by' => $contact->Firstname." ".$contact->Lastname,
			'Contact' => Input::get('contact_id'),
			'phone_number' => $contact->Phone,
			'output_Date' => Input::get('output_Date'),
			'Half_day_time' => Input::get('Half_day_time'),
			'Comments' => Input::get('Comments'),

			'rl_plaats' => Input::get('_rl_plaats'),
			'rl_Wissel' => Input::get('_rl_Wissel'),
			'rl_Afvoer' => Input::get('_rl_Afvoer'),



			'3m3_plaats' => Input::get('_3m3_plaats'),
			'3m3_Wissel' => Input::get('_3m3_Wissel'),
			'3m3_Afvoer' => Input::get('_3m3_Afvoer'),

			'6m3_plaats' => Input::get('_6m3_plaats'),
			'6m3_Wissel' => Input::get('_6m3_Wissel'),
			'6m3_Afvoer' => Input::get('_6m3_Afvoer'),

			'10m3_plaats' => Input::get('_10m3_plaats'),
			'10m3_Wissel' => Input::get('_10m3_Wissel'),
			'10m3_Afvoer' => Input::get('_10m3_Afvoer'),

			'10m3_plaats_dicht' => Input::get('_10m3_plaats_dicht'),
			'10m3_Wissel_dicht' => Input::get('_10m3_Wissel_dicht'),
			'10m3_Afvoer_dicht' => Input::get('_10m3_Afvoer_dicht'),

			'20m3_plaats' => Input::get('_20m3_plaats'),
			'20m3_Wissel' => Input::get('_20m3_Wissel'),
			'20m3_Afvoer' => Input::get('_20m3_Afvoer'),

			'30m3_plaats' => Input::get('_30m3_plaats'),
			'30m3_Wissel' => Input::get('_30m3_Wissel'),
			'30m3_Afvoer' => Input::get('_30m3_Afvoer'),

			'40m3_plaats' => Input::get('_40m3_plaat'),
			'40m3_Wissel' => Input::get('_40m3_Wissel'),
			'40m3_Afvoer' => Input::get('_40m3_Afvoer'),

			'rl_Bsa' => Input::get('_rl_Bsa'),
			'rl_Puin' => Input::get('_rl_Puin'),
			'rl_Hout' => Input::get('_rl_Hout'),
			'rl_Diverse' => Input::get('_rl_Diverse'),
			'rl_Plastic_Folie' => Input::get('_rl_Plastic_Folie'),
			'rl_Papier' => Input::get('_rl_Papier'),
			'rl_Opmerkingen' => (Input::get('_rl_Opmerkingen') == '0' ? '' : Input::get('_rl_Opmerkingen')),

			'3m3_Bsa' => Input::get('_3m3_Bsa'),
			'3m3_Puin' => Input::get('_3m3_Puin'),
			'3m3_Hout' => Input::get('_3m3_Hout'),
			'3m3_Diverse' => Input::get('_3m3_Diverse'),
			'3m3_Plastic_Folie' => Input::get('_3m3_Plastic_Folie'),
			'3m3_Papier' => Input::get('_3m3_Papier'),
			'3m3_Opmerkingen' => (Input::get('_3m3_Opmerkingen') == '0' ? '' : Input::get('_3m3_Opmerkingen')),

			'6m3_Bsa' => Input::get('_6m3_Bsa'),
			'6m3_Puin' => Input::get('_6m3_Puin'),
			'6m3_Hout' => Input::get('_6m3_Hout'),
			'6m3_Diverse' => Input::get('_6m3_Diverse'),
			'6m3_Plastic_Folie' => Input::get('_6m3_Plastic_Folie'),
			'6m3_Papier' => Input::get('_6m3_Papier'),
			'6m3_Opmerkingen' => (Input::get('_6m3_Opmerkingen') == '0' ? '' : Input::get('_6m3_Opmerkingen')),

			'10m3_Bsa' => Input::get('_10m3_Bsa'),
			'10m3_Puin' => Input::get('_10m3_Puin'),
			'10m3_Hout' => Input::get('_10m3_Hout'),
			'10m3_Diverse' => Input::get('_10m3_Diverse'),
			'10m3_Plastic_Folie' => Input::get('_10m3_Plastic_Folie'),
			'10m3_Papier' => Input::get('_10m3_Papier'),
			'10m3_Opmerkingen' => (Input::get('_10m3_Opmerkingen') == '0' ? '' : Input::get('_10m3_Opmerkingen') ),

			'10m3_Bsa_dicht' => Input::get('_10m3_Bsa_dicht'),
			'10m3_Puin_dicht' => Input::get('_10m3_Puin_dicht'),
			'10m3_Hout_dicht' => Input::get('_10m3_Hout_dicht'),
			'10m3_Diverse_dicht' => Input::get('_10m3_Diverse_dicht'),
			'10m3_Plastic_Folie_dicht' => Input::get('_10m3_Plastic_Folie_dicht'),
			'10m3_Papier_dicht' => Input::get('_10m3_Papier_dicht'),
			'10m3_Opmerkingen_dicht' => (Input::get('_10m3_Opmerkingen_dicht') == '0' ? '' : Input::get('_10m3_Opmerkingen_dicht')),

			'20m3_Bsa' => Input::get('_20m3_Bsa'),
			'20m3_Puin' => Input::get('_20m3_Puin'),
			'20m3_Hout' => Input::get('_20m3_Hout'),
			'20m3_Diverse' => Input::get('_20m3_Diverse'),
			'20m3_Plastic_Folie' => Input::get('_20m3_Plastic_Folie'),
			'20m3_Papier' => Input::get('_20m3_Papier'),
			'20m3_Opmerkingen' => (Input::get('_20m3_Opmerkingen') == '0' ? '' : Input::get('_20m3_Opmerkingen')),

			'30m3_Bsa' => Input::get('_30m3_Bsa'),
			'30m3_Puin' => Input::get('_30m3_Puin'),
			'30m3_Hout' => Input::get('_30m3_Hout'),
			'30m3_Diverse' => Input::get('_30m3_Diverse'),
			'30m3_Plastic_Folie' => Input::get('_30m3_Plastic_Folie'),
			'30m3_Papier' => Input::get('_30m3_Papier'),
			'30m3_Opmerkingen' => (Input::get('_30m3_Opmerkingen') == '0' ? '' : Input::get('_30m3_Opmerkingen')),

			'40m3_Bsa' => Input::get('_40m3_Bsa'),
			'40m3_Puin' => Input::get('_40m3_Puin'),
			'40m3_Hout' => Input::get('_40m3_Hout'),
			'40m3_Diverse' => Input::get('_40m3_Diverse'),
			'40m3_Plastic_Folie' => Input::get('_40m3_Papier'),
			'40m3_Papier' => Input::get('_40m3_Papier'),
			'40m3_Opmerkingen' => (Input::get('_40m3_Opmerkingen') == '0' ? '' : Input::get('_40m3_Opmerkingen')),
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		/*print_r($order);
		die;*/
			$input = DB::table('tblordercontainer')->insertGetId($order);


			if($input)
			{
				$user_info = array('status' => 1, 'id' => $input);

				return json_encode($user_info);
			}
			else
			{
				$user_info = array('status' => 0, 'message' => 'failed to insert record');

				return json_encode($user_info);
			}

		}
		//Fahad code ends here
		$Order =  array (
			'Shippingcompany_id' => Input::get('shippingcomapny_id'),
			'Email' => Input::get('Email'),
			'Ship_Email' => Input::get('Ship_Email'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => $Nummer+1,
			'Customer_id' => Input::get('Customer_id'),
			'Afdeling' => Input::get('Afdeling'),
			'dept_id' => Input::get('dept'),
			'Uitvoerder' => Input::get('Uitvoerder'),
			'Customer_Name' => Input::get('Customer_Name'),
			'Projectnummer' => Input::get('Projectnummer'),
			'ECU_Project_nr' => Input::get('ECU_Project_nr'),
			'project_name' => Input::get('project_name'),
			'Work_Address' => Input::get('Work_Address'),
			'Postcode' => Input::get('Postcode'),
			'Contact' => Input::get('contact_id'),
			'phone_number' => Input::get('phone_number'),
			'u_phone_number' => Input::get('u_phone_number'),
			'output_Date' => Input::get('output_Date'),
			'Half_day_time' => Input::get('Half_day_time'),
			'Ordered_by' => Auth::user()->name,
			'Comments' => Input::get('Comments'),

			'rl_plaats' => Input::get('rl_plaats'),
			'rl_Wissel' => Input::get('rl_Wissel'),
			'rl_Afvoer' => Input::get('rl_Afvoer'),


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


			'30m3_plaats' => Input::get('30m3_plaats'),
			'30m3_Wissel' => Input::get('30m3_Wissel'),
			'30m3_Afvoer' => Input::get('30m3_Afvoer'),


			'40m3_plaats' => Input::get('40m3_plaats'),
			'40m3_Wissel' => Input::get('40m3_Wissel'),
			'40m3_Afvoer' => Input::get('40m3_Afvoer'),

			'rl_Bsa' => Input::get('rl_Bsa'),
			'rl_Puin' => Input::get('rl_Puin'),
			'rl_Hout' => Input::get('rl_Hout'),
			'rl_Diverse' => Input::get('rl_Diverse'),
			'rl_Plastic_Folie' => Input::get('rl_Plastic_Folie'),
			'rl_Papier' => Input::get('rl_Papier'),
			'rl_Opmerkingen' => Input::get('rl_Opmerkingen'),

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

			'30m3_Bsa' => Input::get('30m3_Bsa'),
			'30m3_Puin' => Input::get('30m3_Puin'),
			'30m3_Hout' => Input::get('30m3_Hout'),
			'30m3_Diverse' => Input::get('30m3_Diverse'),
			'30m3_Plastic_Folie' => Input::get('30m3_Plastic_Folie'),
			'30m3_Papier' => Input::get('30m3_Papier'),
			'30m3_Opmerkingen' => Input::get('30m3_Opmerkingen'),


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

			$input = DB::table('tblordercontainer')->insertGetId($Order);

		if (!empty(Input::get('Save'))) {
		Session::flash('message', ' Bestel ingediend ..!');
		return redirect('admin/Edit_OrderWasteContainer/'.$input);
			//return redirect('admin/weekcard');
		}
		if (!empty(Input::get('Save_Close'))) {
		Session::flash('message', ' Bestel ingediend ..!');
		return redirect('admin/OrderWasteContainer');
		}

		if (!empty(Input::get('Save_New'))) {
		Session::flash('message', ' Bestel ingediend ..!');
		return redirect('admin/create_order');
		}
			/*Session::flash('message', 'Bestel ingediend .. !');
			return redirect('admin/OrderWasteContainer');	*/
		}



	function destroy ($id) {

		$data = DB::table('tblordercontainer')->where('id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', 'Verwijderde Afval containers !');
		return redirect('admin/OrderWasteContainer');
		}
	}

	function view ($id) {

		$query = DB::table('tblordercontainer')->where('id', $id)->first();
		$data = get_object_vars($query);
		//print_r($data);
		$ShippingComany = DB::table('tblshippingcompany')->where('id', $data['Shippingcompany_id'])->first();
		$ProjectName = DB::table('tblproject')->where('id', $query->project_name)->first();
		$customer = DB::table('tblcustomer')->where('Id',$data['Customer_id'])->first();
		$contact = DB::table('tblcontact')->where('Id',$data['Contact'])->first();
		//print_r($ShippingComany); die;
		return View('admin.ordercontainers.view',compact('data','ShippingComany','ProjectName','customer','contact'));

	}

	function show ($id) {


		$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
		$departments = Department::orderBy('Name','ASC')->get();
		//$contacts = Contact::orderBy('Firstname','ASC')->get();
		$Shippingcompany = Shippingcompany::orderBy('Companyname','DESC')->get();
		$Projects = Projects::where('Active',1)->orderBy('Name','ASC')->get();
		$query = DB::table('tblordercontainer')->where('id', $id)->first();
		$ContactID = DB::table('tblcontact')->where('id', $query->Contact)->first();
		$ProjectInfo = Projects::where('Id',$query->project_name)->First();
		$data = get_object_vars($query);
		$contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$query->dept_id)->get();
		/*echo '<pre>';
		print_r($data);
		die;*/
		// dd($ContactID);
		$ShippingEmail = DB::table('tblshippingcompany')->where('id', $data['Shippingcompany_id'])->first();
		return View('admin.ordercontainers.edit',compact('customers','ProjectInfo', 'departments','ContactID', 'contacts', 'ShippingEmail','data','Shippingcompany','Projects'));

	}

	function update() {


		$Nummer =  DB::table('tblordercontainer')->where('Nummer',Input::get('Nummer'))->count();

		//Fahad code starts here
		$source = Input::get('source'); //$request->source;
	/*	if($source == 'ecuapp')
		{
			$project_id = $request->project_id;
			$contact_id = $request->contact_id;
			$services_id = $request->id;
			$status = $request->status;

			// new logic
			if ($status == 1) { $Rev_Nummer = $Nummer; }
			else { $Rev_Nummer = 0;}

			$project = DB::table('tblproject')
			->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
			->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
			->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
			->select('tblproject.*', 'tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email',
			'tblproject.Notes as pro_Note','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname')
			->where('tblproject.Id',$project_id)->first();



			$contact = DB::table('tblcontact')
			->select('*')
			->where('tblcontact.Id',$contact_id)->first();


			$order =  array (
			'shippingcompany_id' => $project->Shippingcompany_id ,
			'Email' => $contact->Email,
			'Fax' => $contact->Fax,
			'Order_Date' => $request->order_date,
			'time' => $request->order_time,
			'Nummer' => $updateNummer,
			'Status' => $status,
			'Customer_id' => $contact_id,
			'Afdeling' => $project->DeptName,
			'Uitvoerder' => $project->Contact_Firstname." ".$project->Contact_Lastname,
			'Customer_Name' => $project->CustomerName,
			'Projectnummer' => $project->Id,
			'ECU_Project_nr' => 'unknown column',
			'project_name' => $project->Name,
			'Work_Address' => $project->Address,
			'Postcode' => $project->City,
			'phone_number' => $contact->Phone,

			'3m3_plaats' => $request->_3m3_plaats,
			'3m3_Wissel' => $request->_3m3_Wissel,
			'3m3_Afvoer' => $request->_3m3_Afvoer,

			'6m3_plaats' => $request->_6m3_plaats,
			'6m3_Wissel' => $request->_6m3_Wissel,
			'6m3_Afvoer' => $request->_6m3_Afvoer,

			'10m3_plaats' => $request->_10m3_plaats,
			'10m3_Wissel' => $request->_10m3_Wissel,
			'10m3_Afvoer' => $request->_10m3_Afvoer,

			'10m3_plaats_dicht' => $request->_10m3_plaats_dicht,
			'10m3_Wissel_dicht' => $request->_10m3_Wissel_dicht,
			'10m3_Afvoer_dicht' => $request->_10m3_Afvoer_dicht,

			'20m3_plaats' => $request->_20m3_plaats,
			'20m3_Wissel' => $request->_20m3_Wissel,
			'20m3_Afvoer' => $request->_20m3_Afvoer,

			'40m3_plaats' => $request->_40m3_plaat,
			'40m3_Wissel' => $request->_40m3_Wissel,
			'40m3_Afvoer' => $request->_40m3_Afvoer,

			'3m3_Bsa' => $request->_3m3_Bsa,
			'3m3_Puin' => $request->_3m3_Puin,
			'3m3_Hout' => $request->_3m3_Hout,
			'3m3_Diverse' => $request->_3m3_Diverse,
			'3m3_Plastic_Folie' => $request->_3m3_Plastic_Folie,
			'3m3_Papier' => $request->_3m3_Papier,
			'3m3_Opmerkingen' => $request->_3m3_Opmerkingen,

			'6m3_Bsa' => $request->_6m3_Bsa,
			'6m3_Puin' => $request->_6m3_Puin,
			'6m3_Hout' => $request->_6m3_Hout,
			'6m3_Diverse' => $request->_6m3_Diverse,
			'6m3_Plastic_Folie' => $request->_6m3_Plastic_Folie,
			'6m3_Papier' => $request->_6m3_Papier,
			'6m3_Opmerkingen' => $request->_6m3_Opmerkingen,

			'10m3_Bsa' => $request->_10m3_Bsa,
			'10m3_Puin' => $request->_10m3_Puin,
			'10m3_Hout' => $request->_10m3_Hout,
			'10m3_Diverse' => $request->_10m3_Diverse,
			'10m3_Plastic_Folie' => $request->_10m3_Plastic_Folie,
			'10m3_Papier' => $request->_10m3_Papier,
			'10m3_Opmerkingen' => $request->_10m3_Opmerkingen,

			'10m3_Bsa_dicht' => $request->_10m3_Bsa_dicht,
			'10m3_Puin_dicht' => $request->_10m3_Puin_dicht,
			'10m3_Hout_dicht' => $request->_10m3_Hout_dicht,
			'10m3_Diverse_dicht' => $request->_10m3_Diverse_dicht,
			'10m3_Plastic_Folie_dicht' => $request->_10m3_Plastic_Folie_dicht,
			'10m3_Papier_dicht' => $request->_10m3_Papier_dicht,
			'10m3_Opmerkingen_dicht' => $request->_10m3_Opmerkingen_dicht,

			'20m3_Bsa' => $request->_20m3_Bsa,
			'20m3_Puin' => $request->_20m3_Puin,
			'20m3_Hout' => $request->_20m3_Hout,
			'20m3_Diverse' => $request->_20m3_Diverse,
			'20m3_Plastic_Folie' => $request->_20m3_Plastic_Folie,
			'20m3_Papier' => $request->_20m3_Papier,
			'20m3_Opmerkingen' => $request->_20m3_Opmerkingen,

			'40m3_Bsa' => $request->_40m3_Bsa,
			'40m3_Puin' => $request->_40m3_Puin,
			'40m3_Hout' => $request->_40m3_Hout,
			'40m3_Diverse' => $request->_40m3_Diverse,
			'40m3_Plastic_Folie' => $request->_40m3_Papier,
			'40m3_Papier' => $request->_40m3_Papier,
			'40m3_Opmerkingen' => $request->_40m3_Opmerkingen,
			'created_at' => date('Y-m-d h:i:s', time()),
		);

		if ($status == 1) {
			$insert_order = DB::table('tblordercontainer')->insertGetId($order);
			if($insert_order)
			{


			return json_encode(array('status' => 1, 'message'=> 'container order updated!' ));

			}
			else
			{
			return json_encode(array('status' => 0, 'message'=> 'order update failed' ));

			}
		}
		else {
			$update_order = DB::table('tblordercontainer')
            ->where('id',$services_id)
            ->update($order);
			if($update_order)
			{


				return json_encode(array('status' => 1, 'messsage'=> 'Order cancelled' ));

			}
			else
			{

				return json_encode(array('status' => 0, 'messsage'=> 'Cancel order failed' ));
			}
		}



		}
		*/


		if($source == 'ecuapp')
		{
			$project_id = Input::get('project_id');
			$contact_id = Input::get('contact_id');
			$services_id = Input::get('id');
			$status = Input::get('status');

			// new logic
			if ($status == 1) { $Rev_Nummer = $Nummer; /*$Rev_Nummer =  Input::get('Rev_Nummer');*/}
			else { /*$updateNummer = Input::get('Nummer');*/ $Rev_Nummer = 0;}

			//old logic
			/*if ($status == 1) { $updateNummer = $Nummer; $Rev_Nummer =  $Nummer."-0".$Nummer+1;} // the client is still wowrking on this logic - will be revised laterz -- Fahad
			else { $updateNummer = $Nummer; $Rev_Nummer = 0;}*/

			$project = DB::table('tblproject')
	->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
	->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
	->select('tblproject.*', 'tblcustomer.Id as CustomerID','tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email','tbldepartment.Id as DeptID',
	'tblproject.Notes as pro_Note','tblcontact.Id as Contact_ID','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname')
	->where('tblproject.Id',$project_id)->first();



			$contact = DB::table('tblcontact')
			->select('*')
			->where('tblcontact.Id',$project->Contact_ID)->first();


			$order =  array (
			'shippingcompany_id' => $project->Shippingcompany_id ,
			'Email' => $contact->Email,
			'Fax' => $contact->Fax,
			'Order_Date' => Input::get('order_date'),
			'time' => Input::get('order_time'),
			'Nummer' => $Rev_Nummer,
			'Status' => $status,
			'Customer_id' => $project->CustomerID,
			'Afdeling' => $project->DeptName,
			'Uitvoerder' => $project->Contact_Firstname." ".$project->Contact_Lastname,
			'Customer_Name' => $project->CustomerName,
			'project_name' => $project->Id,
			'ECU_Project_nr' => $project->Project_Ref,
			'Projectnummer' => $project->customer_ref,
			'Work_Address' => $project->Address,
			'Postcode' => $project->City,
			'Contact' => Input::get('Contact'),
			'phone_number' => $contact->Phone,
			'output_Date' => Input::get('output_Date'),
			'Half_day_time' => Input::get('Half_day_time'),
			'dept_id'=> $project->DeptID,

			'Comments' => Input::get('Comments'),
			'rl_plaats' => Input::get('_rl_plaats'),
			'rl_Wissel' => Input::get('_rl_Wissel'),
			'rl_Afvoer' => Input::get('_rl_Afvoer'),


			'3m3_plaats' => Input::get('_3m3_plaats'),
			'3m3_Wissel' => Input::get('_3m3_Wissel'),
			'3m3_Afvoer' => Input::get('_3m3_Afvoer'),

			'6m3_plaats' => Input::get('_6m3_plaats'),
			'6m3_Wissel' => Input::get('_6m3_Wissel'),
			'6m3_Afvoer' => Input::get('_6m3_Afvoer'),

			'10m3_plaats' => Input::get('_10m3_plaats'),
			'10m3_Wissel' => Input::get('_10m3_Wissel'),
			'10m3_Afvoer' => Input::get('_10m3_Afvoer'),

			'10m3_plaats_dicht' => Input::get('_10m3_plaats_dicht'),
			'10m3_Wissel_dicht' => Input::get('_10m3_Wissel_dicht'),
			'10m3_Afvoer_dicht' => Input::get('_10m3_Afvoer_dicht'),

			'20m3_plaats' => Input::get('_20m3_plaats'),
			'20m3_Wissel' => Input::get('_20m3_Wissel'),
			'20m3_Afvoer' => Input::get('_20m3_Afvoer'),

			'30m3_plaats' => Input::get('_30m3_plaats'),
			'30m3_Wissel' => Input::get('_30m3_Wissel'),
			'30m3_Afvoer' => Input::get('_30m3_Afvoer'),

			'40m3_plaats' => Input::get('_40m3_plaat'),
			'40m3_Wissel' => Input::get('_40m3_Wissel'),
			'40m3_Afvoer' => Input::get('_40m3_Afvoer'),

			'rl_Bsa' => Input::get('_rl_Bsa'),
			'rl_Puin' => Input::get('_rl_Puin'),
			'rl_Hout' => Input::get('_rl_Hout'),
			'rl_Diverse' => Input::get('_rl_Diverse'),
			'rl_Plastic_Folie' => Input::get('_rl_Plastic_Folie'),
			'rl_Papier' => Input::get('_rl_Papier'),
			'rl_Opmerkingen' => (Input::get('_rl_Opmerkingen') == 0 ? ' ' : Input::get('_rl_Opmerkingen') ),

			'3m3_Bsa' => Input::get('_3m3_Bsa'),
			'3m3_Puin' => Input::get('_3m3_Puin'),
			'3m3_Hout' => Input::get('_3m3_Hout'),
			'3m3_Diverse' => Input::get('_3m3_Diverse'),
			'3m3_Plastic_Folie' => Input::get('_3m3_Plastic_Folie'),
			'3m3_Papier' => Input::get('_3m3_Papier'),
			'3m3_Opmerkingen' => (Input::get('_3m3_Opmerkingen') == 0 ? ' ' : Input::get('_3m3_Opmerkingen')),

			'6m3_Bsa' => Input::get('_6m3_Bsa'),
			'6m3_Puin' => Input::get('_6m3_Puin'),
			'6m3_Hout' => Input::get('_6m3_Hout'),
			'6m3_Diverse' => Input::get('_6m3_Diverse'),
			'6m3_Plastic_Folie' => Input::get('_6m3_Plastic_Folie'),
			'6m3_Papier' => Input::get('_6m3_Papier'),
			'6m3_Opmerkingen' => (Input::get('_6m3_Opmerkingen') == 0 ? ' ' : Input::get('_6m3_Opmerkingen')),

			'10m3_Bsa' => Input::get('_10m3_Bsa'),
			'10m3_Puin' => Input::get('_10m3_Puin'),
			'10m3_Hout' => Input::get('_10m3_Hout'),
			'10m3_Diverse' => Input::get('_10m3_Diverse'),
			'10m3_Plastic_Folie' => Input::get('_10m3_Plastic_Folie'),
			'10m3_Papier' => Input::get('_10m3_Papier'),
			'10m3_Opmerkingen' => (Input::get('_10m3_Opmerkingen') == 0 ? ' ' : Input::get('_10m3_Opmerkingen')),

			'10m3_Bsa_dicht' => Input::get('_10m3_Bsa_dicht'),
			'10m3_Puin_dicht' => Input::get('_10m3_Puin_dicht'),
			'10m3_Hout_dicht' => Input::get('_10m3_Hout_dicht'),
			'10m3_Diverse_dicht' => Input::get('_10m3_Diverse_dicht'),
			'10m3_Plastic_Folie_dicht' => Input::get('_10m3_Plastic_Folie_dicht'),
			'10m3_Papier_dicht' => Input::get('_10m3_Papier_dicht'),
			'10m3_Opmerkingen_dicht' => (Input::get('_10m3_Opmerkingen_dicht') == 0 ? ' ' : Input::get('_10m3_Opmerkingen_dicht')),

			'20m3_Bsa' => Input::get('_20m3_Bsa'),
			'20m3_Puin' => Input::get('_20m3_Puin'),
			'20m3_Hout' => Input::get('_20m3_Hout'),
			'20m3_Diverse' => Input::get('_20m3_Diverse'),
			'20m3_Plastic_Folie' => Input::get('_20m3_Plastic_Folie'),
			'20m3_Papier' => Input::get('_20m3_Papier'),
			'20m3_Opmerkingen' => (Input::get('_20m3_Opmerkingen') == 0 ? ' ' : Input::get('_20m3_Opmerkingen')),

			'30m3_Bsa' => Input::get('_30m3_Bsa'),
			'30m3_Puin' => Input::get('_30m3_Puin'),
			'30m3_Hout' => Input::get('_30m3_Hout'),
			'30m3_Diverse' => Input::get('_30m3_Diverse'),
			'30m3_Plastic_Folie' => Input::get('_30m3_Plastic_Folie'),
			'30m3_Papier' => Input::get('_30m3_Papier'),
			'30m3_Opmerkingen' => (Input::get('_30m3_Opmerkingen') == 0 ? ' ' : Input::get('_30m3_Opmerkingen')),

			'40m3_Bsa' => Input::get('_40m3_Bsa'),
			'40m3_Puin' => Input::get('_40m3_Puin'),
			'40m3_Hout' => Input::get('_40m3_Hout'),
			'40m3_Diverse' => Input::get('_40m3_Diverse'),
			'40m3_Plastic_Folie' => Input::get('_40m3_Papier'),
			'40m3_Papier' => Input::get('_40m3_Papier'),
			'40m3_Opmerkingen' => (Input::get('_40m3_Opmerkingen') == 0 ? ' ' : Input::get('_40m3_Opmerkingen')),
			'created_at' => date('Y-m-d h:i:s', time()),
		);

		if ($status == 1) {
			$insert_order = DB::table('tblordercontainer')->insertGetId($order);
			if($insert_order)
			{


			return json_encode(array('status' => 1, 'message'=> 'container order updated!' ));

			}
			else
			{
			return json_encode(array('status' => 0, 'message'=> 'order update failed' ));

			}
		}
		else {
			$update_order = DB::table('tblordercontainer')
            ->where('id',$services_id)
            ->update($order);

			//print_r($update_order);
			//die;

			if($update_order)
			{


				return json_encode(array('status' => 1, 'messsage'=> 'Order cancelled' ));

			}
			else
			{

				return json_encode(array('status' => 0, 'messsage'=> 'Cancel order failed' ));
			}
		}



		}


  //Fahad code ends here

		//print_r($_POST); die;

		$status = Input::get('Status');
		if ($status == 1) { $Rev_Nummer = $Nummer; /*$Rev_Nummer =  Input::get('Rev_Nummer');*/}
		else { /*$updateNummer = Input::get('Nummer');*/ $Rev_Nummer = 0;}

		$Order =  array (
			'Shippingcompany_id' => Input::get('shippingcomapny_id'),
			'Email' => Input::get('Email'),
			'Ship_Email' => Input::get('Ship_Email'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => Input::get('Nummer'),
			'Status' => Input::get('Status'),
			'Rev_Nummer' => $Rev_Nummer,
			'Customer_id' => Input::get('Customer_id'),
			'Customer_Name' => Input::get('Customer_Name'),
			'ECU_Project_nr' => Input::get('ECU_Project_nr'),
			'Afdeling' => Input::get('Afdeling'),
			'Uitvoerder' => Input::get('Uitvoerder'),
			'Projectnummer' => Input::get('Projectnummer'),
			'project_name' => Input::get('project_name'),
			'Work_Address' => Input::get('Work_Address'),
			'Postcode' => Input::get('Postcode'),
			'Contact' => Input::get('contact_id'),
			'phone_number' => Input::get('phone_number'),
			'u_phone_number' => Input::get('u_phone_number'),
			'output_Date' => Input::get('output_Date'),
			'Half_day_time' => Input::get('Half_day_time'),
			'Comments' => Input::get('Comments'),
			'dept_id'=> Input::get('DeptID'),
			//'Approved_by' => Auth::user()->name,
			'rl_plaats' => Input::get('rl_plaats'),
			'rl_Wissel' => Input::get('rl_Wissel'),
			'rl_Afvoer' => Input::get('rl_Afvoer'),


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

			'30m3_plaats' => Input::get('30m3_plaats'),
			'30m3_Wissel' => Input::get('30m3_Wissel'),
			'30m3_Afvoer' => Input::get('30m3_Afvoer'),



			'40m3_plaats' => Input::get('40m3_plaats'),
			'40m3_Wissel' => Input::get('40m3_Wissel'),
			'40m3_Afvoer' => Input::get('40m3_Afvoer'),


			'rl_Bsa' => Input::get('rl_Bsa'),
			'rl_Puin' => Input::get('rl_Puin'),
			'rl_Hout' => Input::get('rl_Hout'),
			'rl_Plastic_Folie' => Input::get('rl_Plastic_Folie'),
			'rl_Papier' => Input::get('rl_Papier'),
			'rl_Diverse' => Input::get('rl_Diverse'),
			'rl_Opmerkingen' => Input::get('rl_Opmerkingen'),
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


			'30m3_Bsa' => Input::get('30m3_Bsa'),
			'30m3_Puin' => Input::get('30m3_Puin'),
			'30m3_Hout' => Input::get('30m3_Hout'),
			'30m3_Diverse' => Input::get('30m3_Diverse'),
			'30m3_Plastic_Folie' => Input::get('30m3_Plastic_Folie'),
			'30m3_Papier' => Input::get('30m3_Papier'),
			'30m3_Opmerkingen' => Input::get('30m3_Opmerkingen'),


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

		 if (!empty(Input::get('Save_Close'))) {
			Session::flash('message', 'Bijgewerkt Afvalcontainers !');
			return redirect('admin/OrderWasteContainer');
			//return redirect('admin/weekcard');
		}
		if (!empty(Input::get('Save'))) {
		Session::flash('message', 'Bijgewerkt Afvalcontainers !');
		return redirect('admin/Edit_OrderWasteContainer/'.Input::get('id'));
		}


		}

	function AjaxprojectInfo ($project_id) {

		//echo $project_id; die;
		$project = DB::table('tblproject')
            ->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.id')
			->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.id', 'left outer')
            ->select('tblproject.*', 'tblcontact.*','tblcustomer.*')
			->where('tblproject.id', '=', $project_id)
            ->first();
		return Response:: json($project);

	}

	function Download_PDF ($id) {

		$data = DB::table('tblordercontainer')
		->join('tblshippingcompany', 'tblordercontainer.Shippingcompany_id', '=', 'tblshippingcompany.id' , 'left outer')
		->select('tblordercontainer.*','tblshippingcompany.Fax as ship_Fax', 'tblshippingcompany.Email as ship_Email','tblshippingcompany.Companyname' )
		->where('tblordercontainer.id', $id)->first();
		$Order = get_object_vars($data);

		/*echo '<pre>';
		print_r($Order);
		die;*/

		//$order['project_name'];
		$customer = DB::table('tblcustomer')->where('Id',$Order['Customer_id'])->first();
		$contact = DB::table('tblcontact')->where('Id',$Order['Contact'])->first();
		/*echo '<pre>';
		print_r($customer);
		die;*/


		$project = DB::table('tblproject')->where('id',$Order['project_name'])->first();
		// return view('admin.ordercontainers.pdf', compact('Order','project','customer','contact'));
		$pdf= PDF::loadView('admin.ordercontainers.pdf', compact('Order','project','customer','contact'));
		return $pdf->download('Afvalcontainer_BN-00'.$Order['Nummer'].'.pdf');
	}

	function Email ($id) {

		$data = DB::table('tblordercontainer')
		->join('tblshippingcompany', 'tblordercontainer.Shippingcompany_id', '=', 'tblshippingcompany.id' , 'left outer')
		->select('tblordercontainer.*','tblshippingcompany.Fax as ship_Fax', 'tblshippingcompany.Email as ship_Email','tblshippingcompany.Companyname' )
		->where('tblordercontainer.id', $id)->first();
		$Order = get_object_vars($data);
		$project = DB::table('tblproject')->where('id',$Order['project_name'])->first();
		return View('admin.ordercontainers.email',compact('data','project'));
	}

	//Fahad code starts here
	function containerlist (Request $request) {

		$contact_id = $request->id; //4234;//
		//$Projects = DB::select( DB::raw("SELECT Id FROM tblproject WHERE Active = '1' and ProjectTO REGEXP '$contact_id'") );
		//SELECT * FROM tblordercontainer WHERE tblordercontainer.project_name IN()
		//$containerlist = DB::table('tblordercontainer')->->whereIn('tblordercontainer.project_name', array($Projects))->orderBy('id','DESC')->get();
		$containerlist =DB::select( DB::raw("SELECT * FROM `tblordercontainer` WHERE `project_name` in (SELECT Id FROM tblproject WHERE Active = '1' and ProjectTO REGEXP '$contact_id') order by id DESC"));


		//where('tblordercontainer.Contact',array($Projects))
		//print_r($containerlist); die;
		//$containerlist = DB::table('tblordercontainer')->where('tblordercontainer.Contact',$contact_id)->orderBy('id','DESC')->get();

		if ($containerlist)
		{
			return json_encode(array('status' => 1, 'containerlist' => $containerlist));
		}
		else
		{
			return json_encode(array('status' => 0, 'messsage'=> 'no list' ));
		}

	}
	//Fahad code ends here

	function Order_sent () {


		Config::set('mail.driver', env('CONTACT_DRIVER'));
		Config::set('mail.host', env('CONTACT_HOST'));
		Config::set('mail.port', env('CONTACT_PORT'));
		Config::set('mail.encryption', env('CONTACT_ENCRYPTION'));
		Config::set('mail.username', env('CONTACT_MAIL'));
		Config::set('mail.password', env('CONTACT_PASSWORD'));


		$id = Input::get('id');
		$email = Input::get('email');
		$text = Input::get('Text');
		$pro_name = Input::get('pro_name');
		//$from = 'containers@easycleanup.nl';
		$data = DB::table('tblordercontainer')
		->join('tblshippingcompany', 'tblordercontainer.Shippingcompany_id', '=', 'tblshippingcompany.id' , 'left outer')
		->select('tblordercontainer.*','tblshippingcompany.Fax as ship_Fax', 'tblshippingcompany.Email as ship_Email','tblshippingcompany.Companyname' )
		->where('tblordercontainer.id', $id)->first();
		$Order = get_object_vars($data);
		$Nummer = $Order['Nummer'];
		$Companyname = $Order['Companyname'];
		$customer = DB::table('tblcustomer')->where('Id',$Order['Customer_id'])->first();
		$contact = DB::table('tblcontact')->where('Id',$Order['Contact'])->first();

		$project = DB::table('tblproject')->where('id',$Order['project_name'])->first();
		$pdf= PDF::loadView('admin.ordercontainers.pdf', compact('Order','project','customer','contact'));
		//return $pdf->download('Afvalcontainer_BN-00'.$id.'.pdf');
		Mail::raw($text, function($message) use ($pdf,$email,$Nummer,$Companyname) {
		$message->to($email,$Companyname) //->cc('khurram_asml@hotmail.com','Khurram')
            //$message->to("",$Companyname)
		->cc('containers@easycleanup.nl','Easy Clean Up BV')
            //->cc('hamzaesoft@gmail.com','Easy Clean Up BV')
		// ->bcc('azeem_zaheer@hotmail.com','Easy Clean Up BV')
		->bcc('containers.ecu@outlook.com','Easy Clean Up BV')
		//->->getHeaders()->addTextHeader('Containers', 'containers@easycleanup.nl')
		->replyTo('containers@easycleanup.nl','Containers')
		->From('containers@easycleanup.nl','Easy Clean Up BV')
		->subject('Subject: ECU bestelling - BN-00'.@$Nummer)
		->attachData($pdf->output(), "Afvalcontainers - BN-00".$Nummer.".pdf"); });

		$status_update = array ('email_sent' => 1, 'sender_name' => Auth::user()->name ,'Approved_by' => Auth::user()->name);
		DB::table('tblordercontainer')
            ->where('id', Input::get('id'))
            ->update($status_update);

		Config::set('mail.driver', env('MAIL_DRIVER'));
		Config::set('mail.host', env('MAIL_HOST'));
		Config::set('mail.port', env('MAIL_PORT'));
		Config::set('mail.encryption', env('MAIL_ENCRYPTION'));
		Config::set('mail.username', env('MAIL_USERNAME'));
		Config::set('mail.password', env('MAIL_PASSWORD'));

		Session::flash('message', 'Email verzonden');
		return redirect('admin/OrderWasteContainer/');



		}

	public function GetContactByAjax($id,$cid)   {

		$Contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$id)->get();
		echo '<select class="select2" name="contact_id" id="Contact_id" onchange="GetContact();" style="width: 100%;padding:2px 7px;">';
		echo '<option value="">Naam selecteren</option>';
		foreach ($Contacts as $Contact) {

			if ($Contact->Id == $cid) { $select = "selected='selected'"; }
			else {$select = '';}

		echo '<option value="'.$Contact->Id.'"'.$select.' > '.$Contact->Firstname.' '.$Contact->Lastname.'</option>';
		}
		echo '</select>';
		die;
	}

	public function GetContactByAjax_Melden($id,$cid)   {

		$Contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$id)->get();
		echo '<select class="select2" name="Melden_Bij" id="Melden_Bij" onchange="GetContact2();" style="width: 100%;padding:2px 7px;">';
		echo '<option value="">Naam selecteren</option>';
		foreach ($Contacts as $Contact) {

			if ($Contact->Id == $cid) { $select = "selected='selected'"; }
			else {$select = '';}

		echo '<option value="'.$Contact->Id.'"'.$select.' > '.$Contact->Firstname.' '.$Contact->Lastname.'</option>';
		}
		echo '</select>';
		die;
	}


	function email_test () {

		Config::set('mail.driver', env('CONTACT_DRIVER'));
		Config::set('mail.host', env('CONTACT_HOST'));
		Config::set('mail.port', env('CONTACT_PORT'));
		Config::set('mail.encryption', env('CONTACT_ENCRYPTION'));
		Config::set('mail.username', env('CONTACT_MAIL'));
		Config::set('mail.password', env('CONTACT_PASSWORD'));


		//dd(Config::get('mail')); //die;
		$email = 'khurram.lucky@gmail.com';
		$text = 'This is a Testing Email...';

		Mail::raw($text, function($message) use ($email) {
		$message->to($email,'Khurram')->cc('containers@easycleanup.nl','easycleanup')
		->subject('Afvalcontainers mailen naar');

		 });






		}

}
