<?php

namespace App\Http\Controllers\admin;

//use Request;
use Session;
use Validator;
use DB;
use Input;
use Auth;
use Response;
use PDF;
use Mail;
use Datatables;
use App\Shippingcompany;
use App\Customers;
use App\Contact;
use App\Department;
use App\Projects;
use Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // change

class OrderServicesController extends Controller
{
    //

	// function index () {
	//
	// 	$data = DB::table('tblorder_services')->select('*')->orderBy('id','DESC')->get();
	//
	// 	return View('admin.order_services.orders')->withData($data);
	// }
	function index () {

		// $data = DB::table('tblorder_services')->select('*')->orderBy('id','DESC')->get();

		return View('admin.order_services.orders');
	}

	//////////server side rendering starts from here//////////////
	function getAllOrders () {

		$V_orders = DB::table('v_getallorderservices')->select('*');

			return Datatables::of($V_orders)
				 ->addColumn('ID' , function ($V_orders) {
					return $V_orders->id;
				 })
				 ->addColumn('Aanvraagnr' , function ($V_orders) {
					 if ($V_orders->Rev_Nummer == 0) {
						 return substr($V_orders->Aanvraagnr, 0, -2);
					 	// return $V_orders->Aanvraagnr
					 }
						return $V_orders->Aanvraagnr;
				 })
				 ->addColumn('Project' , function ($V_orders) {
						return $V_orders->ProjectName;
				 })
					->addColumn('Datum aanvraag' , function ($V_orders) {
						return $V_orders->created_at;
				 })
				 ->addColumn('Begindatum' , function ($V_orders) {
						return $V_orders->Begindatum;
				 })
				 ->addColumn('Aantal mensen' , function ($V_orders) {
				 		return $V_orders->Aantal_Mensen;
				})
				 ->addColumn('Hoeveel dagen' , function ($V_orders) {
				 		return $V_orders->Hoeveel_Dagen;
				})
				 ->addColumn('Werkzaamheden' , function ($V_orders) {
				 		return $V_orders->Werkzaamheden;
				})
				 ->addColumn('Afgehandled' , function ($V_orders) {
					 // return $V_orders->Afgehandled;
					 if ($V_orders->Afgehandled == 1) {
						 return '<span class="label label-success">Afgehandeld</span>';
					 }
					 return '<span class="label label-danger">Open</span>';
				 })
				 ->addColumn('Opties' , function ($V_orders) {
                     if ($V_orders->Afgehandled == 0) {
                         $proceed = '<a href="plandata/' . $V_orders->id . '" title="Afdrukken" class="btn btn-secondary" style="backround-color:#718e84; margin-top:20px;">Doorgaan Verzoek</a>';
                     } else {
                         $proceed = '';
                     }
                     return '<a href="View_OrderServices/' . $V_orders->id . '" title="Inzien" class="widget-icon"><span class="icon-eye-open"></span></a>
					<a href="Edit_OrderServices/' . $V_orders->id . '" title="Bewerken" class="widget-icon"><span class="icon-pencil"></span></a>

					<a href="Delete_OrderServices/' . $V_orders->id . '" title="verwijderen" class="widget-icon"
					onclick= \'return confirm("Weet u het zeker of u deze personeelsaanvraag wilt verwijderen ?")\'
					><span class="icon-trash"></span></a>

					<a href="OrderServices_print/' . $V_orders->id . '" title="Afdrukken" class="widget-icon"><span class="icon-print"></span></a>' .$proceed.'';
					 })
				 ->make(true);



		}
	//////////server side rendering ends here//////////////

	function create () {

			$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
			$departments = Department::orderBy('Name','ASC')->get();
			$contacts = Contact::orderBy('Firstname','ASC')->get();
			$Nummer =  DB::table('tblorder_services')->max('Nummer');
			$latestNummer = $Nummer+1;
			$Shippingcompany = Shippingcompany::orderBy('Companyname','DESC')->get();
			$Projects = Projects::where('Active',1)->orderBy('Name','ASC')->get();

		return View('admin.order_services.create',compact('customers', 'departments', 'contacts','Shippingcompany','Projects','latestNummer'));
		}

	function store () {
		// dd(Input::get('more_notes'));
		$Nummer =  DB::table('tblorder_services')->max('Nummer');

	/*	print_r($_POST); die;*/
		//Fahad code starts here
		$source = Input::get('source'); //$request->source;
		if($source == 'ecuapp')
		{
			//parameters
			$project_id = Input::get('project_id'); //$request->project_id;
			$contact_id = Input::get('contact_id'); //$request->contact_id;
			$begindatum = Input::get('begindatum'); //$request->begindatum;
			$begintijd  = Input::get('begintijd');//$request->begintijd;
			$aantal_Mensen = Input::get('aantal_Mensen');//$request->aantal_Mensen;
			$hoeveel_Dagen =Input::get('hoeveel_Dagen'); //$request->hoeveel_Dagen;
			$werkzaamheden =Input::get('werkzaamheden'); //$request->werkzaamheden;
			$melden_Bij = Input::get('melden_Bij'); //$request->melden_Bij;
			$telefoonnummer = Input::get('telefoonnummer'); //$request->telefoonnummer;
			$benodigheden = Input::get('benodigheden');//$request->benodigheden;
			$opmerkingen = Input::get('opmerkingen'); //$request->opmerkingen;
			$anders = Input::get('anders'); //$request->anders;
			$Order_Date = Input::get('Order_Date'); //$request->opmerkingen;
			$time = Input::get('time'); //$request->anders;
			$more_notes = Input::get('more_notes'); //$request->more_notes;

			//$project_data = DB::table('tblproject')->select('*')->where('id',$project_id)->get();
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

			$melden_Bij_Info = DB::table('tblcontact')
			->select('*')
			->where('tblcontact.Id',$melden_Bij)->first();

			$User_Info =  DB::table('users')
                ->select('*')
                ->where('contact_id',$contact_id)->first();
			if($User_Info )
            {
                $EmailToCustomer = $User_Info->email;
            }
			else
            {
                $EmailToCustomer = "";
            }
			//print_r($project);
			//die;


			//echo $project->Name;

			$order = array(
			/*'Begindatum' =>$begindatum,
			'Begintijd' =>  $begintijd,*/
			'Order_Date' => $Order_Date,
			'time' =>$time,
			'Nummer' => ($Nummer+1),
			'Afdeling' => $project->DeptName,
			'Uitvoerder' => $project->Contact_Firstname." ".$project->Contact_Lastname,
			'Postcode' => $project->City,
			'Contact_id' => $contact_id,
			'phone_number' => $project->Contact_phone,
			'project_name' => $project->Id,
			'more_notes' => Input::get('more_notes'),
			'Work_Address' => $project->Address,
			'con_Telefoonnummer' =>  $contact ? $contact->Phone : "",
  //              'con_Telefoonnummer' => "",
			'con_Mobilenummer' =>  $contact ? $contact->Mobile :"",
                //'con_Mobilenummer' =>"",
			'con_Aangenomendoor' => $melden_Bij,
			'Begindatum' => $begindatum,
			'Begintijd' => $begintijd,
			'Aantal_Mensen' => $aantal_Mensen,
			'Hoeveel_Dagen' => $hoeveel_Dagen,
			'Werkzaamheden' => $werkzaamheden,
			'Melden_Bij' => $melden_Bij,
			'Telefoonnummer' => $telefoonnummer,
			'Benodigheden' => $benodigheden,
			'Opmerkingen' => $opmerkingen,
			'Anders' => $anders,
			'Department_Id' => $project->Department_Id,
			'created_at' => date('Y-m-d h:i:s', time()),
		);
		//print_r($order);
		//die;

		$input = DB::table('tblorder_services')->insertGetId($order);

		unset($input['Melden_Bij']);
		if($input)
		{
			$order['Melden_Bij'] = ($melden_Bij_Info ? $melden_Bij_Info->Firstname : "").' '.($melden_Bij_Info ? $melden_Bij_Info->Lastname : "");
			$user_info = array('status' => 1, 'id' => $order);
            Config::set('mail.driver', env('CONTACT_DRIVER'));
            Config::set('mail.host', env('CONTACT_HOST'));
            Config::set('mail.port', env('CONTACT_PORT'));
            Config::set('mail.encryption', env('CONTACT_ENCRYPTION'));
            Config::set('mail.username', env('CONTACT_MAIL'));
            Config::set('mail.password', env('CONTACT_PASSWORD'));
            if($EmailToCustomer!="")
            {
                $Message = "Hey! we have received Your Personal Request";
                Mail::raw($Message, function ($message) use ($EmailToCustomer) {
                    $message->to($EmailToCustomer)
                        ->subject
                        ('Personal Request');
                    // $message->html("true");
                    //$message->from('thedeveloper00000@gmail.com','HAMZA SAAb');
                    $message->from('planning@easycleanup.nl', 'Planing');
                });

            }
            $Message = "Received a Personal Request from ".($User_Info ? $User_Info->name : "");
            Mail::raw($Message, function ($message){
                $message->to("planning@easycleanup.nl")
                    ->subject
                    ('Personal Request');
                // $message->html("true");
                //$message->from('thedeveloper00000@gmail.com','HAMZA SAAb');
                $message->from('planning@easycleanup.nl', 'Planing');
            });
			return json_encode($user_info);
		}
		else
		{
			$user_info = array('status' => 0, 'message' => 'failed to insert record');

			return json_encode($user_info);
		}
		//print_r($input);
		//die;



		}
	/*	print_r($_POST); die;*/
		/*Fahad code ends here*/


		$Order =  array (
			//'Shippingcompany_id' => Input::get('shippingcomapny_id'),
			//'Email' => Input::get('Email'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'Nummer' => ($Nummer+1),
			'Afdeling' => Input::get('Afdeling'),
			'Uitvoerder' => Input::get('Uitvoerder'),
			'Postcode' => Input::get('Postcode'),
			'Contact_id' => Input::get('contact_id'),
			'phone_number' => Input::get('phone_number'),
			'project_name' => Input::get('project_name'),
			'more_notes' => Input::get('more_notes'),
			'Work_Address' => Input::get('Work_Address'),
			'con_Telefoonnummer' => Input::get('con_Telefoonnummer'),
			'con_Mobilenummer' => Input::get('con_Mobilenummer'),
			'con_Aangenomendoor' => Input::get('con_Aangenomendoor'),
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
			'Department_Id' => Input::get('Department_Id'),
			/*
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
			'40m3_Opmerkingen' => Input::get('40m3_Opmerkingen'),*/
			'created_at' => date('Y-m-d h:i:s', time()),
		);

			$input = DB::table('tblorder_services')->insertGetId($Order);

			 if (!empty(Input::get('Save'))) {
			Session::flash('message', ' Bestel ingediend ..!');
			return redirect('admin/Edit_OrderServices/'.$input);
			//return redirect('admin/weekcard');
		}
		if (!empty(Input::get('Save_Close'))) {
		Session::flash('message', ' Bestel ingediend ..!');
		return redirect('admin/BestelformulierDiensten');
		}

		if (!empty(Input::get('Save_New'))) {
		Session::flash('message', ' Bestel ingediend ..!');
		return redirect('admin/create_order');
		}
			/*Session::flash('message', 'Bestel ingediend .. !');
			return redirect('admin/OrderWasteContainer');	*/
		}



	function destroy ($id) {

		$data = DB::table('tblorder_services')->where('id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', 'Verwijderde Afval containers !');
		return redirect('admin/BestelformulierDiensten');
		}
	}

	function view ($id) {

		$query = DB::table('tblorder_services')->where('id', $id)->first();
		//echo $query->Department_Id; die;
		$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
		$departments = Department::orderBy('Name','ASC')->get();
		$contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$query->Department_Id)->get();
		$Shippingcompany = Shippingcompany::orderBy('Companyname','DESC')->get();
		$Projects = Projects::where('Active',1)->orderBy('Name','ASC')->get();

		if (empty($query)) {
			return redirect('admin/404');
		}
		$data = get_object_vars($query);
		return View('admin.order_services.view',compact('customers', 'departments', 'contacts', 'data','Shippingcompany','Projects'));

	}

	function show ($id) {

		$query = DB::table('tblorder_services')->where('id', $id)->first();
		//echo $query->Department_Id; die;
		$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
		$departments = Department::orderBy('Name','ASC')->get();
		$contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$query->Department_Id)->get();
		$Shippingcompany = Shippingcompany::orderBy('Companyname','DESC')->get();
		$Projects = Projects::where('Active',1)->orderBy('Name','ASC')->get();

		if (empty($query)) {
			return redirect('admin/404');
		}
		$data = get_object_vars($query);
		// dd($data);
		return View('admin.order_services.edit',compact('customers', 'departments', 'contacts', 'data','Shippingcompany','Projects'));

	}

	function update() {


		$Nummer =  DB::table('tblorder_services')->where('Nummer',Input::get('Nummer'))->count();
		$source = Input::get('source');
		$afgehandled = Input::get('afgehandled') ? 1 : 0;


		if($source == 'ecuapp')
		{
			$Rev_Nummer = Input::get('rev_number');
			 $status = Input::get('status');
            //return $status;
			if ($status == 1) { $updateNummer = $Nummer; $Rev_Nummer =  $Nummer."-0".($Nummer+1);}
			else { $updateNummer = $Nummer; $Rev_Nummer = 0;}

		//parameter list
			/*$project_id = $request->project_id;
			$contact_id = $request->contact_id;
			$services_id = $request->id;
			$begindatum = $request->begindatum;
			$begintijd  = $request->begintijd;
			$aantal_Mensen = $request->aantal_Mensen;
			$hoeveel_Dagen =$request->hoeveel_Dagen;
			$werkzaamheden =$request->werkzaamheden;
			$melden_Bij = $request->melden_Bij;
			$telefoonnummer = $request->telefoonnummer;
			$benodigheden = $request->benodigheden;
			$opmerkingen = $request->opmerkingen;
			$anders = $request->anders;*/


			$project_id = Input::get('project_id'); //$request->project_id;
			$more_notes = Input::get('more_notes'); //$request->more_notes;
			$contact_id = Input::get('contact_id'); //$request->contact_id;
			$services_id = Input::get('id'); //$request->id;
			$begindatum = Input::get('begindatum'); //$request->begindatum;
			$begintijd  = Input::get('begintijd');//$request->begintijd;
			$aantal_Mensen = Input::get('aantal_Mensen');//$request->aantal_Mensen;
			$hoeveel_Dagen =Input::get('hoeveel_Dagen'); //$request->hoeveel_Dagen;
			$werkzaamheden =Input::get('werkzaamheden'); //$request->werkzaamheden;
			$melden_Bij = Input::get('melden_Bij'); //$request->melden_Bij;
			$telefoonnummer = Input::get('telefoonnummer'); //$request->telefoonnummer;
			$benodigheden = Input::get('benodigheden');//$request->benodigheden;
			$opmerkingen = Input::get('opmerkingen'); //$request->opmerkingen;
			$anders = Input::get('anders'); //$request->anders;
			$Order_Date = Input::get('Order_Date'); //$request->opmerkingen;
			$time = Input::get('time'); //$request->anders;
			 //$afgehandled = Input::get('afgehandled') ? 1 : 0; //$request->afgehandled;


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

			 $order = array(
			'Order_Date' => $Order_Date,
			'time' => $time,
			'afgehandled' => ($afgehandled == 1) ? 1 : 0,
			'Nummer' => $updateNummer,
			'Rev_Nummer' => $Rev_Nummer,
			'Status' => $status,
			'Afdeling' => $project->DeptName,
			'Uitvoerder' => $project->Contact_Firstname." ".$project->Contact_Lastname,
			'Postcode' => $project->City,
			'Contact_id' => $contact_id,
			'phone_number' => $project->Contact_phone,
			'more_notes' => $project->more_notes,
			'project_name' => $project->Id,
			'Work_Address' => $project->Address,
			'con_Telefoonnummer' => ($contact ? $contact->Phone : " "),
			'con_Mobilenummer' => ($contact ? $contact->Mobile : " "),
			'con_Aangenomendoor' => $melden_Bij,
			'Begindatum' => $begindatum,
			'Begintijd' => $begintijd,
			'Aantal_Mensen' => $aantal_Mensen,
			'Hoeveel_Dagen' => $hoeveel_Dagen,
			'Werkzaamheden' => $werkzaamheden,
			'Melden_Bij' => $melden_Bij,
			'Telefoonnummer' => $telefoonnummer,
			'Benodigheden' => $benodigheden,
			'Opmerkingen' => $opmerkingen,
			'Anders' => $anders,
			'Department_Id' => $project->Department_Id,
			'created_at' => date('Y-m-d h:i:s', time()),
		);

		if ($status == 1) {
			$insert_order = DB::table('tblorder_services')->where('id',$services_id)
                ->update($order);//->insertGetId($order);
			if($insert_order)
			{


			return json_encode(array('status' => 1, 'message'=> 'order updated!' ));

			}
			else
			{
			return json_encode(array('status' => 0, 'message'=> 'update failed' ));

			}
		}
		else {
			$update_order = DB::table('tblorder_services')
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
		//Fahad code ends here

		//echo $Nummer ; die;
			//print_r($_POST); die;

		$status = Input::get('Status');
		if ($status == 1) { $Rev_Nummer = $Nummer; /*$Rev_Nummer =  Input::get('Rev_Nummer');*/}
		else { $updateNummer = Input::get('Nummer'); $Rev_Nummer = 0;}

		// $afgehandled = Input::get('afgehandled') ? 1 : 0;

		$Order =  array (
			//'Shippingcompany_id' => Input::get('Shippingcomapny_id'),
			'Email' => Input::get('Email'),
			'Order_Date' => Input::get('Order_Date'),
			'time' => Input::get('time'),
			'afgehandled' => ($afgehandled == 1) ? 1 : '',
			'Nummer' => Input::get('Nummer'),
			'Status' => Input::get('Status'),
			'Rev_Nummer' => $Rev_Nummer,
			'Department_Id' => Input::get('Department_Id'),
			'Contact_id' => Input::get('Contact_id'),
			'Afdeling' => Input::get('Afdeling'),
			'Uitvoerder' => Input::get('Uitvoerder'),
			'Postcode' => Input::get('Postcode'),
			'Contact_id' => Input::get('Contact_id'),
			'phone_number' => Input::get('phone_number'),
			'more_notes' => Input::get('more_notes'),
			'con_Telefoonnummer' => Input::get('con_Telefoonnummer'),
			'con_Mobilenummer' => Input::get('con_Mobilenummer'),
			'con_Aangenomendoor' => Input::get('con_Aangenomendoor'),
			'project_name' => Input::get('project_name'),
			'Work_Address' => Input::get('Work_Address'),
			'Projectnummer' => Input::get('Projectnummer'),
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
		if ($status == 1) {
		DB::table('tblorder_services')->insertGetId($Order);
		}
		else {
		DB::table('tblorder_services')
            ->where('id', Input::get('id'))
            ->update($Order);
		}


		 if (!empty(Input::get('Save_Close'))) {
			Session::flash('message', 'Bijgewerkt Afvalcontainers !');
			return redirect('admin/BestelformulierDiensten');
			//return redirect('admin/weekcard');
		}
		if (!empty(Input::get('Save'))) {
		Session::flash('message', 'Bijgewerkt Afvalcontainers !');
		return redirect('admin/Edit_OrderServices/'.Input::get('id'));
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

		$data = DB::table('tblorder_services')
		->join('tblcontact', 'tblorder_services.Contact_id', '=', 'tblcontact.Id' , 'left')
		->select('tblorder_services.*', 'tblcontact.Firstname as con_Firstname','tblcontact.Lastname as con_Lastname' )
		->where('tblorder_services.id', $id)->first();


		/*echo '<pre>';
		print_r($data);
		die;*/
		if (empty($data)) {
			return redirect('admin/404');
		}

		$Order = get_object_vars($data);
		//print_r($Order); die;
		//$order['project_name'];
		$project = DB::table('tblproject')->where('Id',$Order['project_name'])->first();
		// return view('admin.order_services.pdf', compact('Order','project'));
		$pdf= PDF::setoptions(['isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);

		$pdf->loadView('admin.order_services.pdf', compact('Order','project'));
		return $pdf->download('Aanvraag_Personeel_AP-00'.$id.'.pdf');
	}

	function Email ($id) {

		$data = DB::table('tblorder_services')
		->join('tblshippingcompany', 'tblorder_services.Shippingcompany_id', '=', 'tblshippingcompany.id' , 'left outer')
		->select('tblorder_services.*','tblshippingcompany.Fax as ship_Fax', 'tblshippingcompany.Email as ship_Email','tblshippingcompany.Companyname' )
		->where('tblorder_services.id', $id)->first();
		$Order = get_object_vars($data);
		return View('admin.order_services.email',compact('data'));
	}

	function Order_sent () {

		$id = Input::get('id');
		$email = Input::get('email');
		$text = Input::get('Text');

		$data = DB::table('tblorder_services')
		->join('tblshippingcompany', 'tblorder_services.Shippingcompany_id', '=', 'tblshippingcompany.id' , 'left outer')
		->select('tblorder_services.*','tblshippingcompany.Fax as ship_Fax', 'tblshippingcompany.Email as ship_Email','tblshippingcompany.Companyname' )
		->where('tblorder_services.id', $id)->first();
		$Order = get_object_vars($data);
		$project = DB::table('tblproject')->where('id',$Order['project_name'])->first();
		$pdf= PDF::loadView('admin.ordercontainers.pdf', compact('Order','project'));
		//return $pdf->download('Afvalcontainer_BN-00'.$id.'.pdf');
		Mail::raw($text, function($message) use ($pdf,$email) {
		$message->to($email)->from('planning@easycleanup.nl','Easy Clean Up BV')
		->subject('Afvalcontainers mailen naar')
		->attachData($pdf->output(), "Afvalcontainers.pdf"); });

		$status_update = array ('email_sent' => 1, 'sender_name' => Auth::user()->name );
		DB::table('tblorder_services')
            ->where('id', Input::get('id'))
            ->update($status_update);
		Session::flash('message', 'Email verzonden');
		return redirect('admin/BestelformulierDiensten/');

		}

	//Fahad code starts here
	function serviceslist (Request $request) {
		$contact_id = $request->id;
		$services = DB::table('tblorder_services')
		->join('tblcontact', 'tblorder_services.Contact_id', '=', 'tblcontact.Id' , 'left')
		->select('tblorder_services.*', 'tblcontact.Firstname as con_Firstname','tblcontact.Lastname as con_Lastname' )
		->where('tblorder_services.contact_id', $contact_id)->orderBy('id','DESC')->get();
		/*$services = DB::table('tblorder_services')
		->join('tblshippingcompany', 'tblorder_services.Contact_Id', '=', 'tblshippingcompany.id' , 'left outer')
		->where('tblorder_services.contact_id',$contact_id)->orderBy('id','DESC')->get();*/
		if ($services)
		{
			return json_encode(array('status' => 1, 'services' => $services));
		}
		else
		{
			return json_encode(array('status' => 0, 'messsage'=> 'no list' ));
		}

	}
	//Fahad code ends here








	public function GetContactByAjax($id)   {

		$Contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$id)->get();
		echo '<select class="select2" id="Contact_id" name="Contact_id" style="width: 100%;" onchange="GetContactInfo();">';
		echo '<option value="">Naam selecteren</option>';
		foreach ($Contacts as $Contact) {
		echo '<option value="'.$Contact->Id.'" > '.$Contact->Firstname.' '.$Contact->Lastname.'</option>';
		}
		echo '</select>';
		die;
	}


}
