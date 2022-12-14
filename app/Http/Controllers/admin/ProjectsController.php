<?php

namespace App\Http\Controllers\admin;

use App\Projects;
use App\Customers;
use App\Contact;
use App\Department;
use App\Projectmanager;
use App\Shippingcompany;
use App\Weekcard;
use App\Note;
use App\Keetcard;
use App\ArticleList;
use App\ProjectAttachment;
use App\ProjectPriceList;
use App\Http\Requests\ProjectsRequest;
use Illuminate\Http\Request as Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use DB;
use PDF;
use Input;
use Datatables;
use Carbon\Carbon;

class ProjectsController extends Controller
{
	public function __construct()
	{
	      $this->middleware('auth');
	}

    //
	 public function getprojects()  {
          //
		//$data = Projects::all();

	//return View('admin.projects.projects')->with('data', $data);
	$id = '';
	return View('admin.projects.projects_ajax',compact('id'));
    }


	 public function create($id = 0, Requests $request = null)   {
        //
		// dd($request->all());
		if($request) {
				// dd("YES");
				$CustomerID = $request->customer_id;
				// $dept_name  = $request->dept_name;
				$dept_id    = $id;
				// $dept_id    = Department::where('Name', '=', $dept_name)->pluck('id');
				// dd($dept_id);

		} else {
			// dd("NO");
			$CustomerID = 0;
			$dept_name  = null;
			$dept_id    = 0;
		}

		// $CustomerID = $id;
		// dd($CustomerID);
		$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
		//echo '<pre>'; print_r($customers);die;
		//$customers = Customers::orderBy('Name','ASC')->get();
		$departments = Department::orderBy('Name','ASC')->get();
		$contacts = Contact::orderBy('Firstname','ASC')->get();
		$projectmanagers = Projectmanager::orderBy('Firstname','ASC')->get();
//		return $projectmanagers; die;
		$Shippingcompany = Shippingcompany::orderBy('Companyname','ASC')->get();

		return view('admin.projects.create',compact('customers', 'departments', 'contacts','projectmanagers','Shippingcompany','CustomerID', 'dept_id'));
    }

	 public function save(ProjectsRequest $request)
    {
     	/*echo '<pre>';
		print_r($request->all()); die;*/
//return  $request->projectmanager_id; die;
		if (!empty($request->active)) { $check = 1;} else { $check = 0;}

		if ($request->prijsafspraak == 1) {$prijsafspraak = $request->prijsafspraak;$number_chain = '';$number_times = ''; $unit = '';//}else{ $prijsafspraak = '';
		} else {
			$prijsafspraak = '';
			$unit = $request->unit;
		if ($request->unit == 0) {$number_chain = $request->number_chain;}else{ $number_chain = '';}

		if ($request->number_times !='') {$number_times = $request->number_times; $number_chain = '';}else{ $number_times = '';}
		}



		$project_data = array (
			'Name' => $request->name,
			'Customer_id' => $request->customer_id,
			'Department_Id' => $request->department_id,
			'Contact_Id' => $request->contact_id,
			'Start_Date' => $request->start_date,
			'End_Date' => $request->end_date,
			'Projectmanager_Id' => $request->projectmanager_id,
			'Shippingcompany_id' => $request->Shippingcompany_id,
			'Description' => $request->description,
			'Rate' => $request->rate,
			'Fixed' => $request->fixed,
			'Project_Ref' => $request->project_ref,
			'Customer_Ref' => $request->customer_ref,
			'Fax' =>  $request->fax ? $request->fax : "Null",
			'Address' => $request->Address,
			'Zipcode' => $request->Zipcode,
			'City' => $request->City,
			'Notes' => $request->Notes,
			'more_notes' => $request->more_notes,
			'Container_Notes' => $request->Container_Notes,
			'Goedkeuring' => $request->Goedkeuring,
			'Location' => $request->Location,
			//'Project_data' => $request->Project_data,
			'weekcard' => $request->weekcard,
			'Active' => $check,
			'unit' => $unit,
			'number_chain' => $number_chain,
			'price' => $request->price,
			'purchase_price' => $request->purchase_price,
			'prijsafspraak' => $prijsafspraak,
			'number_times' => $number_times
		);




		 $input = Projects::create($project_data);

		 $pricelist = array (
			'project_id' => $input->id,
		 	'Shippingcompany_id' => $request->Shippingcompany_id,
			'article_no_10m3' => $request->article_no_10m3,
			'Price_10m3'=> $request->Price_10m3,
			'sale_Price_10m3'=> $request->sale_Price_10m3,
			'Unit_10m3' => $request->Unit_10m3,
			'article_no_40m3' => $request->article_no_40m3,
			'Price_40m3'=> $request->Price_40m3,
			'sale_Price_40m3'=> $request->sale_Price_40m3,
			'Unit_40m3' => $request->Unit_40m3,
			'article_no_sorteerbaar' => $request->article_no_sorteerbaar,
			'Price_sorteerbaar'=> $request->Price_sorteerbaar,
			'sale_Price_sorteerbaar'=> $request->sale_Price_sorteerbaar,

			'Unit_sorteerbaar' => $request->Unit_sorteerbaar,
			'article_no_niet_sorteerbaar' => $request->article_no_niet_sorteerbaar,
			'Price_niet_sorteerbaar'=> $request->Price_niet_sorteerbaar,
			'sale_Price_niet_sorteerbaar'=> $request->sale_Price_niet_sorteerbaar,

			'Unit_niet_sorteerbaar' => $request->Unit_niet_sorteerbaar,
			'article_no_Bedrijfsafval' => $request->article_no_Bedrijfsafval,
			'Price_Bedrijfsafval'=> $request->Price_Bedrijfsafval,
			'sale_Price_Bedrijfsafval'=> $request->sale_Price_Bedrijfsafval,

			'Unit_Bedrijfsafval' => $request->Unit_Bedrijfsafval,
			'article_no_A_B_hout' => $request->article_no_A_B_hout,
			'Price_A_B_hout'=> $request->Price_A_B_hout,
			'sale_Price_A_B_hout'=> $request->sale_Price_A_B_hout,

			'Unit_A_B_hout' => $request->Unit_A_B_hout,
			'article_no_C_hout' => $request->article_no_C_hout,
			'Price_C_hout'=> $request->Price_C_hout,
			'sale_Price_C_hout'=> $request->sale_Price_C_hout,

			'Unit_C_hout' => $request->Unit_C_hout,
			'article_no_Schoon_puin' => $request->article_no_Schoon_puin,
			'Price_Schoon_puin'=> $request->Price_Schoon_puin,
			'sale_Price_Schoon_puin'=> $request->sale_Price_Schoon_puin,

			'Unit_Schoon_puin' => $request->Unit_Schoon_puin,
			'article_no_Puin_Grof' => $request->article_no_Puin_Grof,
			'Price_Puin_Grof'=> $request->Price_Puin_Grof,
			'sale_Price_Puin_Grof'=> $request->sale_Price_Puin_Grof,


			'Unit_Puin_Grof' => $request->Unit_Puin_Grof,
			'article_no_Puin_met_10' => $request->article_no_Puin_met_10,
			'Price_Puin_met_10'=> $request->Price_Puin_met_10,
			'sale_Price_Puin_met_10'=> $request->sale_Price_Puin_met_10,

			'Unit_Puin_met_10' => $request->Unit_Puin_met_10,
			'article_no_Puin_met_25' => $request->article_no_Puin_met_25,
			'Price_Puin_met_25'=> $request->Price_Puin_met_25,
			'sale_Price_Puin_met_25'=> $request->sale_Price_Puin_met_25,


			'Unit_Puin_met_25' => $request->Unit_Puin_met_25,
			'article_no_Asfaltpuin' => $request->article_no_Asfaltpuin,
			'Price_Asfaltpuin'=> $request->Price_Asfaltpuin,
			'sale_Price_Asfaltpuin'=> $request->sale_Price_Asfaltpuin,

			'Unit_Asfaltpuin' => $request->Unit_Asfaltpuin,
			'article_no_Schoon_Gips' => $request->article_no_Schoon_Gips,
			'Price_Schoon_Gips'=> $request->Price_Schoon_Gips,
			'sale_Price_Schoon_Gips'=> $request->sale_Price_Schoon_Gips,


			'Unit_Schoon_Gips' => $request->Unit_Schoon_Gips,
			'article_no_Groenafval' => $request->article_no_Groenafval,
			'Price_Groenafval'=> $request->Price_Groenafval,
			'sale_Price_Groenafval'=> $request->sale_Price_Groenafval,

			'Unit_Groenafval' => $request->Unit_Groenafval,
			'article_no_Dakafval' => $request->article_no_Dakafval,
			'Price_Dakafval'=> $request->Price_Dakafval,
			'sale_Price_Dakafval'=> $request->sale_Price_Dakafval,


			'Unit_Dakafval' => $request->Unit_Dakafval,
			'article_no_Dakgrind' => $request->article_no_Dakgrind,
			'Price_Dakgrind'=> $request->Price_Dakgrind,
			'sale_Price_Dakgrind'=> $request->sale_Price_Dakgrind,

			'Unit_Dakgrind' => $request->Unit_Dakgrind,
			'article_no_Schoon_vlakglas' => $request->article_no_Schoon_vlakglas,
			'Price_Schoon_vlakglas'=> $request->Price_Schoon_vlakglas,
			'sale_Price_Schoon_vlakglas'=> $request->sale_Price_Schoon_vlakglas,


			'Unit_Schoon_vlakglas' => $request->Unit_Schoon_vlakglas,
			'article_no_Opbrengsten_metalen' => $request->article_no_Opbrengsten_metalen,
			'Price_Opbrengsten_metalen'=> $request->Price_Opbrengsten_metalen,
			'sale_Price_Opbrengsten_metalen'=> $request->sale_Price_Opbrengsten_metalen,

			'Unit_Opbrengsten_metalen' => $request->Unit_Opbrengsten_metalen,
			'article_no_Opbrengsten_Papier' => $request->article_no_Opbrengsten_Papier,
			'Price_Opbrengsten_Papier'=> $request->Price_Opbrengsten_Papier,
			'sale_Price_Opbrengsten_Papier'=> $request->sale_Price_Opbrengsten_Papier,

			'Unit_Opbrengsten_Papier' => $request->Unit_Opbrengsten_Papier,
			'article_no_field1' => $request->article_no_field1,
			'description_field1' => $request->description_field1,
			'Price_field1' => $request->Price_field1,
			'sale_Price_field1' => $request->sale_Price_field1,

			'Unit_field1' => $request->Unit_field1,
			'article_no_field2' => $request->article_no_field2,
			'description_field2' => $request->description_field2,
			'Price_field2' => $request->Price_field2,
			'sale_Price_field2' => $request->sale_Price_field2,

			'Unit_field2' => $request->Unit_field2,
			'article_no_field3' => $request->article_no_field3,
			'description_field3' => $request->description_field3,
			'Price_field3' => $request->Price_field3,
			'sale_Price_field3' => $request->sale_Price_field3,

			'Unit_field3' => $request->Unit_field3,
			'article_no_field4' => $request->article_no_field4,
			'description_field4' => $request->description_field4,
			'Price_field4' => $request->Price_field4,
			'sale_Price_field4' => $request->sale_Price_field4,

			'Unit_field4' => $request->Unit_field4,

			'rl_pr_bsa'=>$request->rl_pr_bsa,
			'rl_sl_bsa'=>$request->rl_sl_bsa,
			'rl_pr_hout'=>$request->rl_pr_hout,
			'rl_sl_hout'=>$request->rl_sl_hout,
			'rl_pr_puin'=>$request->rl_pr_puin,
			'rl_sl_puin'=>$request->rl_sl_puin,

			'pr_3m3_bsa'=>$request->pr_3m3_bsa,
			'sl_pr_3m3_bsa'=>$request->sl_pr_3m3_bsa,
			'pr_3m3_hout'=>$request->pr_3m3_hout,
			'sl_pr_3m3_hout'=>$request->sl_pr_3m3_hout,
			'pr_3m3_puin'=>$request->pr_3m3_puin,
			'sl_pr_3m3_puin'=>$request->sl_pr_3m3_puin,
			'pr_6m3_bsa'=>$request->pr_6m3_bsa,
			'sl_pr_6m3_bsa'=>$request->sl_pr_6m3_bsa,
			'pr_6m3_hout'=>$request->pr_6m3_hout,
			'sl_pr_6m3_hout'=>$request->sl_pr_6m3_hout,
			'pr_6m3_puin'=>$request->pr_6m3_puin,
			'sl_pr_6m3_puin'=>$request->sl_pr_6m3_puin,
			'pr_10m3_bsa'=>$request->pr_10m3_bsa,
			'sl_pr_10m3_bsa'=>$request->sl_pr_10m3_bsa,
			'pr_10m3_hout'=>$request->pr_10m3_hout,
			'sl_pr_10m3_hout'=>$request->sl_pr_10m3_hout,
			'pr_10m3_puin'=>$request->pr_10m3_puin,
			'sl_pr_10m3_puin'=>$request->sl_pr_10m3_puin,
			'pr_20m3_bsa'=>$request->pr_20m3_bsa,
			'sl_pr_20m3_bsa'=>$request->sl_pr_20m3_bsa,
			'pr_20m3_hout'=>$request->pr_20m3_hout,
			'sl_pr_20m3_hout'=>$request->sl_pr_20m3_hout,
			'pr_20m3_puin'=>$request->pr_20m3_puin,
			'sl_pr_20m3_puin'=>$request->sl_pr_20m3_puin,

			'rl_pr_30m3_bsa'=>$request->rl_pr_30m3_bsa,
			'rl_sl_30m3_bsa'=>$request->rl_sl_30m3_bsa,
			'rl_pr_30m3_hout'=>$request->rl_pr_30m3_hout,
			'rl_sl_30m3_hout'=>$request->rl_sl_30m3_hout,
			'rl_pr_30m3_puin'=>$request->rl_pr_30m3_puin,
			'rl_sl_30m3_puin'=>$request->rl_sl_30m3_puin,

			'created_at' =>  date('Y-m-d h:i:s', time())

		);

		 $Project_ID = DB::table('tblprojectpricelist')->insertGetId($pricelist);
		 if (!empty($request->Save)) {
			Session::flash('message', ' Ingevoegd project!');
			//return redirect('admin/edit_project/'.$Project_ID);
			//return redirect('admin/weekcard');
             return redirect('admin/projects');

         }
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Ingevoegd project!');
		return redirect('admin/projects');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Ingevoegd project!');
		return redirect('admin/create_project');
		}


		/* Session::flash('message', 'Successfully Inserted Project!');
		 return redirect('admin/projects');*/
    }

	public function delete($id) {

		$checkInWeekCardTable = DB::table('tblweekcard')->where('Project_Id', $id)->count();
		if($checkInWeekCardTable > 0) {
			Session::flash('message', ' Kan dit project niet verwijderen omdat dit project id wordt gebruikt in de weekstaattabel!');
			return redirect('admin/projects');
		}

		$data = DB::table('tblproject')->where('id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', ' Verwijderde Project!');
		return redirect('admin/projects');
		}

	}

	 public function show($id)
    {
		$weekcard = new Weekcard();
		$Contact = new Contact();
		$data = Projects::find($id);
		//echo $data->id;

		$weekcards = $weekcard->GetAllWeekByProject($id);
		$GetContacts = $Contact->FetchAllContactByDepartment($data->Department_Id);
		@$pricelist = DB::table('tblprojectpricelist')->where('project_id', $id)->first();


		/*echo '<pre>';
		print_r($pricelist); die;*/

		return View('admin.projects.view',compact('data','weekcards','GetContacts','pricelist'));

		//->with('data', $Get_Project);
    }


	public function edit($id)
    {
		$customers = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
		//$customers = Customers::orderBy('Name','ASC')->get();
		$departments = Department::orderBy('Name','ASC')->get();
		$contacts = Contact::orderBy('Firstname','ASC')->get();
		$Contact = new Contact();
		$projectmanagers = Projectmanager::orderBy('Firstname','ASC')->get();
		$Shippingcompany = Shippingcompany::orderBy('Companyname','ASC')->get();
		$Get_project = Projects::findOrFail($id);

		$pricelists = ProjectPriceList::where('project_id', $id)->get();
		/*echo '<pre>';
		print_r($Get_project); die;*/
		$weekcard = new Weekcard();
		$weekcards = $weekcard->GetAllWeekByProject($id);



		//echo $pricelist->pr_3m3_bsa;
		//echo '<pre>';
		//print_r($Get_project); die;
		// dd($Get_project->Department_Id);
		$GetContacts = $Contact->FetchAllContactByDepartment($Get_project->Department_Id);
		// dd($Get_project->Customer_id);
		$GetDepartments = Department::where('Customer_Id',$Get_project->Customer_id)->orderBy('Name','ASC')->get();
		// dd(date('YW'));
		// dd(date('YW',strtotime('-3 month')));
		$lastThreeMonths = date('YW',strtotime('-3 month'));
		$keetcards		 = Keetcard::where('Project_Id', '=', $id)
															// ->where('fr_Keeknumber', '>=', $lastThreeMonths)
															->orderBy('id', 'desc')->get();
		// dd($keetcards);
	/*
		echo $Get_project->Aan;*/
	/*	echo '<pre>';*/
		//print_r($GetContacts); die;

		$zero = 0;
		$current_week = date('W');
		$current_week = strlen($current_week) == 1 ? $zero . $current_week : $current_week;
		 $ending = date('Y') . $current_week;

		 $end_week = date('W') - 6;
 			$end_week = strlen($end_week) == 1 ? $zero . $end_week : $end_week;

		 $starting  = date('Y') . $end_week;
		 $articles  = ArticleList::orderBy('article_code', 'asc')->get();
		 $suppliers = Shippingcompany::orderBy('Companyname', 'asc')->get();


		return View('admin.projects.edit',compact('customers', 'departments', 'contacts','projectmanagers','Get_project','Shippingcompany','GetContacts','pricelists','weekcards','GetDepartments', 'keetcards','id', 'starting', 'ending', 'articles', 'suppliers'));
    }

		/////////////////////////////////////// Project attachments work below ///////////////////

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
			$destinationPath = 'uploads/projects/document/' . $now ;
			$filename = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
			$post['File']->move($destinationPath,$filename);

			// storing records in database table
			$attachment = new ProjectAttachment;
			$attachment->projects_id = $request->projects_id;
			$attachment->note = $request->note;
			$attachment->added = Carbon::now();
			$attachment->filename = $filename;
			$attachment->file_path = $destinationPath . '/' . $filename;
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document met succes geüpload');
			return redirect('admin/edit_project/'.$request->projects_id);


		}

		public function deleteWeekstaatDocument($id)
		{
			$file = ProjectAttachment::findOrFail($id);
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
			$file = ProjectAttachment::findOrFail($id);

			return response() -> json([
				'data' => [
					'id'   => $file->id,
					'projectID' => $file->projects_id,
					'note' => $file->note
				]
			], 200);
		}


		public function updateUploadWeekstaatDoc(Requests $request)
		{
			// dd($request->all());
			$this->validate($request, [
					'note'  => 'required',
			],[
				'note.required' => 'Notitieveld is verplicht'
			]);

			// storing records in database table
			$attachment 						 = ProjectAttachment::findOrFail($request->fileId);
			$attachment->projects_id = $request->projectID;
			$attachment->note 		   = $request->note;
			$attachment->added 		   = Carbon::now();
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document succesvol bijgewerkt');

			return redirect() -> back();

		}

		/////////////////////////////////////// Project attachments work above ///////////////////

	public function update(ProjectsRequest $request) {
		// dd($request->all());
		/*print_r( $_POST);
	echo '<pre>';
		print_r($request->all()); die;*/
		if (@Input::get('Aan')) {
			$Aan = '';
		 foreach(@Input::get('Aan') as $to)
		  {
		 $Aan .= $to.","; //exit;
		  }
		  $Aan = trim($Aan, ",");
		  @$AanBonTo = $Aan;
		}

		if (@Input:: get('Cc')) {
			$CC = '';
		 foreach(@Input:: get('Cc') as $Ccto)
		  {
		 $CC .= $Ccto.","; //exit;
		  }
		  $CC = trim($CC, ",");
		  @$CCBonTo = $CC;
		}


		if (@Input::get('ProjectTo')) {
			$ProjectTo = '';
		 foreach(@Input::get('ProjectTo') as $proj_to)
		  {
		 $ProjectTo .= $proj_to.","; //exit;
		  }
		  $ProjectTo = trim($ProjectTo, ",");
		  @$ProjectBonTo = $ProjectTo;
		}




			//echo $request->customer_id; die;
		//echo $AanBonTo.'---'.$CCBonTo; die;
		$id = Input::get('id');
		$Get_Project = Projects::findOrfail($id);
		$Getpricelist = DB::table('tblprojectpricelist')->where('project_id', $id)->first();

		if (!empty($request->active)) { $check = 1;} else { $check = 0;}
		//if ($request->unit == 0) {$number_chain = $request->number_chain;}else{ $number_chain = '';}


		if ($request->prijsafspraak == 1) {$prijsafspraak = $request->prijsafspraak; $number_chain = '';$number_times = '';$unit = ''; //}else{

		}
		else {
			$prijsafspraak = ''; $unit = $request->unit;
		if ($request->unit == 0) {$number_chain = $request->number_chain;}else{ $number_chain = '';}

		if ($request->number_times !='') {$number_times = $request->number_times; }else{ $number_times = '';}
		}



		$project_data = array (
			'Name' => $request->name,
			'Customer_id' => $request->customer_id,
			'Department_Id' => $request->department_id,
			'Contact_Id' => $request->contact_id,
			'Start_Date' => $request->start_date,
			'End_Date' => $request->end_date,
			'Projectmanager_Id' => $request->projectmanager_id,
			'Shippingcompany_id' => $request->Shippingcompany_id,
			'Description' => $request->description,
			'Rate' => $request->rate,
			'Fixed' => $request->fixed,
			'AanTo' => @$AanBonTo,
			'CcTo' => @$CCBonTo,
			'ProjectTo' => @$ProjectBonTo,
			'Project_Ref' => $request->project_ref,
			'Customer_Ref' => $request->customer_ref,
			'Fax' => $request->fax ?  $request->fax : "NULL",
			'Address' => $request->Address,
			'Zipcode' => $request->Zipcode,
			'City' => $request->City,
			'Notes' => $request->Notes,
			'more_notes' => $request->more_notes,
			'Goedkeuring' => $request->Goedkeuring,
			'Container_Notes' => $request->Container_Notes,
			'Location' => $request->Location,
			//'Project_data' => $request->Project_data,
			'weekcard' => $request->weekcard,
			'Active' => $check,
			'unit' => $unit,
			'number_chain' => $number_chain,
			'price' => $request->price,
			'purchase_price' => $request->purchase_price_keet,
			'Comments' => $request->comments,
			'prijsafspraak' => $prijsafspraak,
			'number_times' => $number_times
		);

		/*echo '<pre>';
		print_r( $project_data);
		die;*/


		DB::table('tblproject')
            ->where('id', $id)
            ->update($project_data);

		 $pricelist = array (
			'project_id' => $id,
		 	'Shippingcompany_id' => $request->Shippingcompany_id,
			'article_no_10m3' => $request->article_no_10m3,
			'Price_10m3'=> $request->Price_10m3,
			'sale_Price_10m3'=> $request->sale_Price_10m3,
			'Unit_10m3' => $request->Unit_10m3,
			'article_no_40m3' => $request->article_no_40m3,
			'Price_40m3'=> $request->Price_40m3,
			'sale_Price_40m3'=> $request->sale_Price_40m3,
			'Unit_40m3' => $request->Unit_40m3,
			'article_no_sorteerbaar' => $request->article_no_sorteerbaar,
			'Price_sorteerbaar'=> $request->Price_sorteerbaar,
			'sale_Price_sorteerbaar'=> $request->sale_Price_sorteerbaar,

			'Unit_sorteerbaar' => $request->Unit_sorteerbaar,
			'article_no_niet_sorteerbaar' => $request->article_no_niet_sorteerbaar,
			'Price_niet_sorteerbaar'=> $request->Price_niet_sorteerbaar,
			'sale_Price_niet_sorteerbaar'=> $request->sale_Price_niet_sorteerbaar,

			'Unit_niet_sorteerbaar' => $request->Unit_niet_sorteerbaar,
			'article_no_Bedrijfsafval' => $request->article_no_Bedrijfsafval,
			'Price_Bedrijfsafval'=> $request->Price_Bedrijfsafval,
			'sale_Price_Bedrijfsafval'=> $request->sale_Price_Bedrijfsafval,

			'Unit_Bedrijfsafval' => $request->Unit_Bedrijfsafval,
			'article_no_A_B_hout' => $request->article_no_A_B_hout,
			'Price_A_B_hout'=> $request->Price_A_B_hout,
			'sale_Price_A_B_hout'=> $request->sale_Price_A_B_hout,

			'Unit_A_B_hout' => $request->Unit_A_B_hout,
			'article_no_C_hout' => $request->article_no_C_hout,
			'Price_C_hout'=> $request->Price_C_hout,
			'sale_Price_C_hout'=> $request->sale_Price_C_hout,

			'Unit_C_hout' => $request->Unit_C_hout,
			'article_no_Schoon_puin' => $request->article_no_Schoon_puin,
			'Price_Schoon_puin'=> $request->Price_Schoon_puin,
			'sale_Price_Schoon_puin'=> $request->sale_Price_Schoon_puin,

			'Unit_Schoon_puin' => $request->Unit_Schoon_puin,
			'article_no_Puin_Grof' => $request->article_no_Puin_Grof,
			'Price_Puin_Grof'=> $request->Price_Puin_Grof,
			'sale_Price_Puin_Grof'=> $request->sale_Price_Puin_Grof,


			'Unit_Puin_Grof' => $request->Unit_Puin_Grof,
			'article_no_Puin_met_10' => $request->article_no_Puin_met_10,
			'Price_Puin_met_10'=> $request->Price_Puin_met_10,
			'sale_Price_Puin_met_10'=> $request->sale_Price_Puin_met_10,

			'Unit_Puin_met_10' => $request->Unit_Puin_met_10,
			'article_no_Puin_met_25' => $request->article_no_Puin_met_25,
			'Price_Puin_met_25'=> $request->Price_Puin_met_25,
			'sale_Price_Puin_met_25'=> $request->sale_Price_Puin_met_25,


			'Unit_Puin_met_25' => $request->Unit_Puin_met_25,
			'article_no_Asfaltpuin' => $request->article_no_Asfaltpuin,
			'Price_Asfaltpuin'=> $request->Price_Asfaltpuin,
			'sale_Price_Asfaltpuin'=> $request->sale_Price_Asfaltpuin,

			'Unit_Asfaltpuin' => $request->Unit_Asfaltpuin,
			'article_no_Schoon_Gips' => $request->article_no_Schoon_Gips,
			'Price_Schoon_Gips'=> $request->Price_Schoon_Gips,
			'sale_Price_Schoon_Gips'=> $request->sale_Price_Schoon_Gips,


			'Unit_Schoon_Gips' => $request->Unit_Schoon_Gips,
			'article_no_Groenafval' => $request->article_no_Groenafval,
			'Price_Groenafval'=> $request->Price_Groenafval,
			'sale_Price_Groenafval'=> $request->sale_Price_Groenafval,

			'Unit_Groenafval' => $request->Unit_Groenafval,
			'article_no_Dakafval' => $request->article_no_Dakafval,
			'Price_Dakafval'=> $request->Price_Dakafval,
			'sale_Price_Dakafval'=> $request->sale_Price_Dakafval,


			'Unit_Dakafval' => $request->Unit_Dakafval,
			'article_no_Dakgrind' => $request->article_no_Dakgrind,
			'Price_Dakgrind'=> $request->Price_Dakgrind,
			'sale_Price_Dakgrind'=> $request->sale_Price_Dakgrind,

			'Unit_Dakgrind' => $request->Unit_Dakgrind,
			'article_no_Schoon_vlakglas' => $request->article_no_Schoon_vlakglas,
			'Price_Schoon_vlakglas'=> $request->Price_Schoon_vlakglas,
			'sale_Price_Schoon_vlakglas'=> $request->sale_Price_Schoon_vlakglas,


			'Unit_Schoon_vlakglas' => $request->Unit_Schoon_vlakglas,
			'article_no_Opbrengsten_metalen' => $request->article_no_Opbrengsten_metalen,
			'Price_Opbrengsten_metalen'=> $request->Price_Opbrengsten_metalen,
			'sale_Price_Opbrengsten_metalen'=> $request->sale_Price_Opbrengsten_metalen,

			'Unit_Opbrengsten_metalen' => $request->Unit_Opbrengsten_metalen,
			'article_no_Opbrengsten_Papier' => $request->article_no_Opbrengsten_Papier,
			'Price_Opbrengsten_Papier'=> $request->Price_Opbrengsten_Papier,
			'sale_Price_Opbrengsten_Papier'=> $request->sale_Price_Opbrengsten_Papier,

			'Unit_Opbrengsten_Papier' => $request->Unit_Opbrengsten_Papier,
			'article_no_field1' => $request->article_no_field1,
			'description_field1' => $request->description_field1,
			'Price_field1' => $request->Price_field1,
			'sale_Price_field1' => $request->sale_Price_field1,

			'Unit_field1' => $request->Unit_field1,
			'article_no_field2' => $request->article_no_field2,
			'description_field2' => $request->description_field2,
			'Price_field2' => $request->Price_field2,
			'sale_Price_field2' => $request->sale_Price_field2,

			'Unit_field2' => $request->Unit_field2,
			'article_no_field3' => $request->article_no_field3,
			'description_field3' => $request->description_field3,
			'Price_field3' => $request->Price_field3,
			'sale_Price_field3' => $request->sale_Price_field3,

			'Unit_field3' => $request->Unit_field3,
			'article_no_field4' => $request->article_no_field4,
			'description_field4' => $request->description_field4,
			'Price_field4' => $request->Price_field4,
			'sale_Price_field4' => $request->sale_Price_field4,
			'Unit_field4' => $request->Unit_field4,
			'rl_pr_bsa'=>$request->rl_pr_bsa,
			'rl_sl_bsa'=>$request->rl_sl_bsa,
			'rl_pr_hout'=>$request->rl_pr_hout,
			'rl_sl_hout'=>$request->rl_sl_hout,
			'rl_pr_puin'=>$request->rl_pr_puin,
			'rl_sl_puin'=>$request->rl_sl_puin,
			'pr_3m3_bsa'=>$request->pr_3m3_bsa,
			'sl_pr_3m3_bsa'=>$request->sl_pr_3m3_bsa,
			'pr_3m3_hout'=>$request->pr_3m3_hout,
			'sl_pr_3m3_hout'=>$request->sl_pr_3m3_hout,
			'pr_3m3_puin'=>$request->pr_3m3_puin,
			'sl_pr_3m3_puin'=>$request->sl_pr_3m3_puin,
			'pr_6m3_bsa'=>$request->pr_6m3_bsa,
			'sl_pr_6m3_bsa'=>$request->sl_pr_6m3_bsa,
			'pr_6m3_hout'=>$request->pr_6m3_hout,
			'sl_pr_6m3_hout'=>$request->sl_pr_6m3_hout,
			'pr_6m3_puin'=>$request->pr_6m3_puin,
			'sl_pr_6m3_puin'=>$request->sl_pr_6m3_puin,
			'pr_10m3_bsa'=>$request->pr_10m3_bsa,
			'sl_pr_10m3_bsa'=>$request->sl_pr_10m3_bsa,
			'pr_10m3_hout'=>$request->pr_10m3_hout,
			'sl_pr_10m3_hout'=>$request->sl_pr_10m3_hout,
			'pr_10m3_puin'=>$request->pr_10m3_puin,
			'sl_pr_10m3_puin'=>$request->sl_pr_10m3_puin,
			'pr_20m3_bsa'=>$request->pr_20m3_bsa,
			'sl_pr_20m3_bsa'=>$request->sl_pr_20m3_bsa,
			'pr_20m3_hout'=>$request->pr_20m3_hout,
			'sl_pr_20m3_hout'=>$request->sl_pr_20m3_hout,
			'pr_20m3_puin'=>$request->pr_20m3_puin,
			'sl_pr_20m3_puin'=>$request->sl_pr_20m3_puin,
			'rl_pr_30m3_bsa'=>$request->rl_pr_30m3_bsa,
			'rl_sl_30m3_bsa'=>$request->rl_sl_30m3_bsa,
			'rl_pr_30m3_hout'=>$request->rl_pr_30m3_hout,
			'rl_sl_30m3_hout'=>$request->rl_sl_30m3_hout,
			'rl_pr_30m3_puin'=>$request->rl_pr_30m3_puin,
			'rl_sl_30m3_puin'=>$request->rl_sl_30m3_puin,



			'updated_at' =>  date('Y-m-d h:i:s', time())
		);

		if ($Getpricelist) {
		DB::table('tblprojectpricelist')
            ->where('project_id', $id)
            ->update($pricelist);
		}

		else {

			DB::table('tblprojectpricelist')->insert($pricelist);

			}

		 if (!empty($request->Save)) {
			Session::flash('message', ' Project bijgewerkt!');
			return redirect('admin/edit_project/'.$id);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Project bijgewerkt!');
		return redirect('admin/projects');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Project bijgewerkt!');
		return redirect('admin/create_project');
		}




		/*Session::flash('message', ' Project bijgewerkt!');
		return redirect('admin/projects');*/

		}

	function ActiveProject($id) {

		DB:: table( 'tblproject' )-> where( 'id' , '=' , $id)-> update( array('Active' => 1 ));
		Session::flash('message', 'Project succesvol activeren.');
		return redirect('admin/projects');

	}

	function InactiveProject($id) {

		DB:: table( 'tblproject' )-> where( 'id' , '=' , $id)-> update( array('Active' => 0 ));
		Session::flash('message', 'Project succesvol te inactiveren.');
		return redirect('admin/projects');



	}

	 public function AllActiveProject()
    {
        //
		//$data = Projects::all()->where('Active','1');


	$id ='Active';
	return View('admin.projects.projects_ajax',compact('id'));


	//return View('admin.projects.projects')->with('data', $data);
    }


	 public function AllInactiveProject()
    {
        //
		//$data = Projects::all()->where('Active','0');
		//$data = DB::table('tblproject')->where('Active',0)->get();

	$id ='Inactive';
	return View('admin.projects.projects_ajax',compact('id'));
	//return View('admin.projects.projects')->with('data', $data);
    }
	public function GetdepartmentByAjax($id)   {

		$departments = Department::orderBy('Name','ASC')->where('Customer_Id',$id)->get();
		echo '<select name="department_id" id="department_id" class="form-control">';
		echo '<option value="">Select Afdeling</option>';
		foreach ($departments as $department) {
		echo '<option value="'.$department->Id.'" > '.$department->Name.'</option>';
		}
		echo '</select>';
		die;
	}


	public function GetContactByAjax($id)   {

		$Contacts = Contact::orderBy('Firstname','ASC')->where('Department_Id',$id)->get();
		echo '<select class="form-control" name="contact_id" id="contact_id">';
		echo '<option value="">Naam selecteren</option>';
		foreach ($Contacts as $Contact) {
		echo '<option value="'.$Contact->Id.'" > '.$Contact->Firstname.' '.$Contact->Lastname.'</option>';
		}
		echo '</select>';
		die;
	}




	function AllProjects () {

		$data =DB::table('v_project')->select('*');
	 return Datatables::of($data)
	 ->addColumn('status' , function ($data) {
		 if ($data->status == 'Actief') {
		 return '<a href="Project/Inactive/'.$data->Id.'" title="Inactief" class=""><span class="label label-success" onclick="InactiveRecord();">Actief</span></a>';
		 } else {
			return '<a href="admin/Project/Active/'.$data->Id.'" title="Actief" class=""><span class="label label-danger" onclick="ActiveRecord();">Inactief</span></a>';
		}
		 })
	  ->addColumn('Opties' , function ($data) {
				return '<a href="show_project/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_project/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="javascript:void(0)" title="verwijderen" class="widget-icon" onclick="deleteRecord('. $data->Id . ');">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}


	function GetAllActiveProject () {

		$data =DB::table('v_project')->select('*')->where('Active','=',1);
	 return Datatables::of($data)
	 ->addColumn('status' , function ($data) {

		 return '<a href="Project/Inactive/'.$data->Id.'" title="Inactief" class=""><span class="label label-success" onclick="InactiveRecord();">Actief</span></a>';


		 })
	  ->addColumn('Opties' , function ($data) {
				return '<a href="show_project/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_project/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="javascript:void(0)" title="verwijderen" class="widget-icon" onclick="deleteRecord('. $data->Id . ');">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}




	function GetAllInactiveProject () {

		$data =DB::table('v_project')->select('*')->where('Active','=',0);
	 return Datatables::of($data)
	 ->addColumn('status' , function ($data) {

			return '<a href="admin/Project/Active/'.$data->Id.'" title="Actief" class=""><span class="label label-danger" onclick="ActiveRecord();">Inactief</span></a>';

		 })
	  ->addColumn('Opties' , function ($data) {
				return '<a href="show_project/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_project/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="javascript:void(0)" title="verwijderen" class="widget-icon" onclick="deleteRecord('. $data->Id . ');">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}



	function Get_All_Projects () {


		$All_Projects =  DB::table('tblproject')->get();
		foreach ($All_Projects as $All_Pro) {

				DB::table('tblproject')->where('Id',$All_Pro->Id) ->update(array ('Active' => 0));
		}

		$Act_Projects = DB::select( DB::raw('SELECT `Project_Id`,`created_at` FROM `tblweekcard` WHERE `created_at` >= curdate() - INTERVAL DAYOFWEEK(curdate())+84 DAY AND `created_at` < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY'));

			foreach ($Act_Projects as $Act_Pro) {

				DB::table('tblproject')->where('Id',$Act_Pro->Project_Id) ->update(array ('Active' => 1));

		}

		Session::flash('message', 'Actief naar Inactieve projecten proces voltooid');

		return redirect('admin/projects');


		}



		public function price_list($id)
		{

			$list = ProjectPriceList::findOrFail($id);
			return response() -> json([
				'data' => [
					'list' => $list
				]
			], 200);

		}


		public function store_price_list(Requests $request)
		{
			// return $request->all();
			$this->validate($request, [
			    'articleID' 	=> 'required',
			    'supplierID' 	=> 'required',
			    'purchase_price' 	=> 'required',
			    'sale_price' 	=> 'required',
			],[
				'purchase_price.required' => 'Aankoopprijs is verplicht',
				'sale_price.required' => 'Verkoopprijs is verplicht',
			]);

			ProjectPriceList::create([
				'project_id' => $request->projectID,
				'article_list_id' => $request->articleID,
				'supplier_id' => $request->supplierID,
				'purchase_price' => $request->purchase_price,
				'sale_price' => $request->sale_price,
			]);
			// $price->project_id = $request->project_id;
			// $price->article_list_id = $request->article;
			// $price->price = $request->price;
			// $price->save();

			Session::flash('message', 'Nieuw artikel toegevoegd');

			return response() -> json([
				'message' => 'success'
			], 200);
			// return redirect('admin/project/price_list/'.$request->project_id);

		}


		public function update_price_list(Requests $request)
		{

			$price = ProjectPriceList::findOrFail($request->id);
			$price->update([
				'article_list_id' => $request->articleID,
				'supplier_id' => $request->supplierID,
				'purchase_price' => $request->purchase_price,
				'sale_price' => $request->sale_price,
			]);

			Session::flash('message', 'Prijslijstrecord bijgewerkt');

			return response() -> json([
				'status' => 'success'
			], 200);

		}

		public function delete_price_list($id)
		{
			$list = ProjectPriceList::find($id);
			$list->delete();

			Session::flash('message', 'Prijslijst record succesvol verwijderd');

			return response() -> json([
				'status' => 'success'
			], 200);
			// return redirect()->back();

		}

		public function ProjectDetailsPDF(Requests $request, $id)
		{


						// Rate -> Klant -> Opgebracht
						// Rate_Cost -> Kost -> Kosten

						$weekFrom = null;
						$yearFrom = null;
						$weekTo   = null;
						$yearTo   = null;

						$project     = Projects::findOrFail($id);
						$projectName = $project->Name;
						$deptName 	 = $project->department->Name;


						if ($request->starting) {
							$yearFrom = substr($request->starting, 0, 4);
							$weekFrom = substr($request->starting, 4, 6);

							$yearTo = substr($request->ending, 0, 4);
							$weekTo = substr($request->ending, 4, 6);

							$regie = DB::select('
									select p.Name, w.id, w.Weeknumber,
									sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as RegieHours,
									(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat, t.Employmentagency_id, ea.Name as emp_name

									from tblproject p
									inner join tblweekcard w
									on p.id = w.Project_Id
									inner join tbltimecard t
									on w.id = t.Weekcard_Id
									inner join tblemploymentagency ea
									on t.Employmentagency_id = ea.Id
									where p.id = :ID
									and w.Weeknumber between :start and :end
									and t.Billable = 1
									group by w.id
							', ['ID' => $id, 'start' => $request->starting, 'end' => $request->ending]);

							$aan = DB::select('
									select p.Name, w.id, w.Weeknumber,
									sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as AanHours,
									(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat,  t.Employmentagency_id, ea.Name as emp_name

									from tblproject p
									inner join tblweekcard w
									on p.id = w.Project_Id
									inner join tbltimecard t
									on w.id = t.Weekcard_Id
									inner join tblemploymentagency ea
									on t.Employmentagency_id = ea.Id
									where p.id = :ID
									and w.Weeknumber between :start and :end
									and t.Billable = 0
									group by w.id
							', ['ID' => $id, 'start' => $request->starting, 'end' => $request->ending]);


						} else {

							$regie = DB::select('
									select p.Name, w.id, w.Weeknumber,
									sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as RegieHours,
									(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat, t.Employmentagency_id, ea.Name as emp_name

									from tblproject p
									inner join tblweekcard w
									on p.id = w.Project_Id
									inner join tbltimecard t
									on w.id = t.Weekcard_Id
									inner join tblemploymentagency ea
									on t.Employmentagency_id = ea.Id
									where p.id = :ID and t.Billable = 1
									group by w.id
							', ['ID' => $id]);

							$aan = DB::select('
									select p.Name, w.id, w.Weeknumber,
									sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as AanHours,
									(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat, t.Employmentagency_id, ea.Name as emp_name

									from tblproject p
									inner join tblweekcard w
									on p.id = w.Project_Id
									inner join tbltimecard t
									on w.id = t.Weekcard_Id
									inner join tblemploymentagency ea
									on t.Employmentagency_id = ea.Id
									where p.id = :ID and t.Billable = 0
									group by w.id
							', ['ID' => $id]);

						}

						$totalRegieUren 		= 0;
						$totalRegieRate 		= 0;
						$totalRegieBearing 	= 0;
						$totalRegieResult   = 0;

						$totalAanUren 			= 0;
						$totalAanRate 			= 0;
						$totalAanBearing 		= 0;
						$totalAanResult	    = 0;


						foreach ($regie as $key => $r) {

							$r->Kosten		 = 0;
							$r->Opgebracht = 0;

							$moreRecords = DB::table('tbltimecard')
																		->where('Billable', '=', 1)
																		->where('Weekcard_Id', '=', $r->id)->get();

							foreach ($moreRecords as $key => $record) {
								$kosten 		= ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate_Cost;
								$Opgebracht = ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate;

								$r->Kosten 		 = $r->Kosten + $kosten;
								$r->Opgebracht = $r->Opgebracht + $Opgebracht;

							}

							$r->gain       			= $r->Opgebracht - $r->Kosten;

							$totalRegieUren 		= $totalRegieUren + $r->RegieHours;
							$totalRegieRate 		= $totalRegieRate + $r->Kosten;
							$totalRegieBearing 	= $totalRegieBearing + $r->Opgebracht;
							$totalRegieResult 	= $totalRegieResult + $r->gain;

						}

						foreach ($aan as $key => $a) {

							$a->Kosten 		 = 0;
							$a->Opgebracht = 0;

							$moreRecords = DB::table('tbltimecard')
																		->where('Billable', '=', 0)
																		->where('Weekcard_Id', '=', $a->id)->get();

							foreach ($moreRecords as $key => $record) {
								$kosten 		= ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate_Cost;
								$Opgebracht = ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate;

								$a->Kosten 		 = $a->Kosten + $kosten;
								$a->Opgebracht = $a->Opgebracht + $Opgebracht;

							}

							$a->gain       			= $a->Opgebracht - $a->Kosten;

							$totalAanUren 			= $totalAanUren + $a->AanHours;
							$totalAanRate 			= $totalAanRate + $a->Kosten;
							$totalAanBearing 		= $totalAanBearing + $a->Opgebracht;
							$totalAanResult 		= $totalAanResult + $a->gain;
						}

						$time = Carbon::now();

						usort($regie, function($a, $b) { // sort based on JobID desc
									return $b->Weeknumber - $a->Weeknumber;
							});

						usort($aan, function($a, $b) { // sort based on JobID desc
									return $b->Weeknumber - $a->Weeknumber;
							});

						// return view('admin.projects.project_details_pdf')->with([
						// 	'time' => $time,
						// 	'projectName' => $projectName,
						// 	'deptName' => $deptName,
						// 	'regie' => $regie,
						// 	'aan' => $aan,
						// 	'id'	=> $id,
						// 	'weekFrom' => $weekFrom,
						// 	'weekTo' => $weekTo,
						// 	'yearFrom' => $yearFrom,
						// 	'yearTo' => $yearTo,
						// 	'totalRegieUren' 		=> $totalRegieUren,
						// 	'totalRegieRate' 		=> $totalRegieRate,
						// 	'totalRegieBearing' 	=> $totalRegieBearing,
						// 	'totalRegieResult'   => $totalRegieResult,
						// 	'totalAanUren' 		=> $totalAanUren,
						// 	'totalAanRate' 		=> $totalAanRate,
						// 	'totalAanBearing' 	=> $totalAanBearing,
						// 	'totalAanResult'   => $totalAanResult,
						//
						// ]);

			$pdf= PDF::loadView('admin.projects.project_details_pdf', compact(
					'time', 'projectName', 'regie', 'aan', 'id', 'weekFrom', 'weekTo', 'yearFrom', 'yearTo','totalRegieUren','totalRegieRate', 'totalRegieBearing', 'totalRegieResult',	'totalAanUren',	'totalAanRate',	'totalAanBearing','totalAanResult', 'deptName'
			));

			$pdf->setPaper('a4' , 'portrait');
			return $pdf->download('Project_details.pdf');

		}

		public function projectDetails(Requests $request, $id)
		{

			// Rate -> Klant -> Opgebracht
			// Rate_Cost -> Kost -> Kosten

			// $weekFrom = Carbon::now()->weekOfYear - 6;
			// $yearFrom = Carbon::now()->year;
			// $weekTo   = Carbon::now()->weekOfYear;
			// $yearTo   = Carbon::now()->year;

			$weekFrom = null;
			$yearFrom = null;
			$weekTo   = null;
			$yearTo   = null;

			$project     = Projects::findOrFail($id);
			$projectName = $project->Name;


			if ($request->starting) {
				$yearFrom = substr($request->starting, 0, 4);
				$weekFrom = substr($request->starting, 4, 6);

				$yearTo = substr($request->ending, 0, 4);
				$weekTo = substr($request->ending, 4, 6);

				$regie = DB::select('
						select p.Name, w.id, w.Weeknumber,
						sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as RegieHours,
						(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat

						from tblproject p
						inner join tblweekcard w
						on p.id = w.Project_Id
						inner join tbltimecard t
						on w.id = t.Weekcard_Id
						where p.id = :ID
						and w.Weeknumber between :start and :end
						and t.Billable = 1
						group by w.id
				', ['ID' => $id, 'start' => $request->starting, 'end' => $request->ending]);

				$aan = DB::select('
						select p.Name, w.id, w.Weeknumber,
						sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as AanHours,
						(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat

						from tblproject p
						inner join tblweekcard w
						on p.id = w.Project_Id
						inner join tbltimecard t
						on w.id = t.Weekcard_Id
						where p.id = :ID
						and w.Weeknumber between :start and :end
						and t.Billable = 0
						group by w.id
				', ['ID' => $id, 'start' => $request->starting, 'end' => $request->ending]);


			} else {

				$regie = DB::select('
						select p.Name, w.id, w.Weeknumber,
						sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as RegieHours,
						(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat

						from tblproject p
						inner join tblweekcard w
						on p.id = w.Project_Id
						inner join tbltimecard t
						on w.id = t.Weekcard_Id
						where p.id = :ID and t.Billable = 1
						group by w.id
				', ['ID' => $id]);

				$aan = DB::select('
						select p.Name, w.id, w.Weeknumber,
						sum(t.Mon + t.Tue + t.Wed + t.Thu + t.Fri + t.Sat + t.Sun) as AanHours, sum(t.Rate_Cost) as AanRate, sum(t.Rate) as AanBearing,
						(sum(t.Rate) - sum(t.Rate_Cost)) as Resultaat

						from tblproject p
						inner join tblweekcard w
						on p.id = w.Project_Id
						inner join tbltimecard t
						on w.id = t.Weekcard_Id
						where p.id = :ID and t.Billable = 0
						group by w.id
				', ['ID' => $id]);

			}

			$totalRegieUren 		= 0;
			$totalRegieRate 		= 0;
			$totalRegieBearing 	= 0;
			$totalRegieResult   = 0;

			$totalAanUren 			= 0;
			$totalAanRate 			= 0;
			$totalAanBearing 		= 0;
			$totalAanResult	    = 0;


			foreach ($regie as $key => $r) {

				$r->Kosten		 = 0;
				$r->Opgebracht = 0;

				$moreRecords = DB::table('tbltimecard')
															->where('Billable', '=', 1)
															->where('Weekcard_Id', '=', $r->id)->get();

				foreach ($moreRecords as $key => $record) {
					$kosten 		= ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate_Cost;
					$Opgebracht = ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate;

					$r->Kosten 		 = $r->Kosten + $kosten;
					$r->Opgebracht = $r->Opgebracht + $Opgebracht;

				}

				$r->gain       			= $r->Opgebracht - $r->Kosten;

				$totalRegieUren 		= $totalRegieUren + $r->RegieHours;
				$totalRegieRate 		= $totalRegieRate + $r->Kosten;
				$totalRegieBearing 	= $totalRegieBearing + $r->Opgebracht;
				$totalRegieResult 	= $totalRegieResult + $r->gain;

			}

			foreach ($aan as $key => $a) {

				$a->Kosten 		 = 0;
				$a->Opgebracht = 0;

				$moreRecords = DB::table('tbltimecard')
															->where('Billable', '=', 0)
															->where('Weekcard_Id', '=', $a->id)->get();

				foreach ($moreRecords as $key => $record) {
					$kosten 		= ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate_Cost;
					$Opgebracht = ($record->Mon + $record->Tue + $record->Wed + $record->Thu + $record->Fri + $record->Sat + $record->Sun) * $record->Rate;

					$a->Kosten 		 = $a->Kosten + $kosten;
					$a->Opgebracht = $a->Opgebracht + $Opgebracht;

				}

				$a->gain       			= $a->Opgebracht - $a->Kosten;

				$totalAanUren 			= $totalAanUren + $a->AanHours;
				$totalAanRate 			= $totalAanRate + $a->Kosten;
				$totalAanBearing 		= $totalAanBearing + $a->Opgebracht;
				$totalAanResult 		= $totalAanResult + $a->gain;
			}

			$weekNumbers = [];
			for($i = 1; $i <= 52; $i++){
			    $val = ($i < 10) ? '0'.$i : $i;
			    $weekNumbers[$val] = $val;
			}

			$yearNumbers = [];
			for($i = 2018; $i <= 2025; $i++){
			    array_push($yearNumbers, $i);
			}

			return view('admin.projects.projectDetails')->with([
				'weekNumbers' => $weekNumbers,
				'yearNumbers' => $yearNumbers,
				'projectName' => $projectName,
				'regie' => $regie,
				'aan' => $aan,
				'id'	=> $id,
				'weekFrom' => $weekFrom,
				'weekTo' => $weekTo,
				'yearFrom' => $yearFrom,
				'yearTo' => $yearTo,
				'totalRegieUren' 		=> $totalRegieUren,
				'totalRegieRate' 		=> $totalRegieRate,
				'totalRegieBearing' 	=> $totalRegieBearing,
				'totalRegieResult'   => $totalRegieResult,
				'totalAanUren' 		=> $totalAanUren,
				'totalAanRate' 		=> $totalAanRate,
				'totalAanBearing' 	=> $totalAanBearing,
				'totalAanResult'   => $totalAanResult,

			]);

		}

		public function getWeekStateForProject(Requests $request)
		{
			$projectID = $request->projectID;
			$value = $request->value;

			if($value == 3) {
				$date  =  date('Y-m-d',strtotime('-3 month'));
				$records = DB::table('tblweekcard')
															->where('Project_Id','=', $projectID)
															->where('Received_Date', '>=', $date)
															->get();

			} elseif ($value == 6) {
				$date  =  date('Y-m-d',strtotime('-6 month'));
				$records = DB::table('tblweekcard')
															->where('Project_Id','=', $projectID)
															->where('Received_Date', '>=', $date)
															->get();

			} else {
				$records = DB::table('tblweekcard')
															->where('Project_Id','=', $projectID)
															// ->where('Received_Date', '>=', $date)
															->get();

			}


			return $records;
		}

		public function getKeetWeekStateForProject(Requests $request)
		{
			//
		}


}
