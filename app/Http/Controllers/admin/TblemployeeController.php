<?php



namespace App\Http\Controllers\admin;

use App\Functie;
use App\Employee;
use App\Employmentagency;
use Carbon\Carbon;
use App\Tblemployee;
use App\User;

use App\Http\Requests\CreateTblemployeeRequest;

use App\Http\Requests\DocumentEmployeeRequest;

use App\Http\Requests\DocumentInfoRequest;

use App\Http\Controllers\Controller;

// use Request;
use Illuminate\Http\Request;
use Session;

use Photo;

use Validator;
use PDF;
use DB;

use Datatables;
use Image;
use Hash;


class TblemployeeController extends Controller

{

    //

	public function create()

	{

		$Functie = Functie::orderBy('name','ASC')->get();
		$data = Employmentagency::where('Active',1)->OrderBy('Name','ASC')->get();
		$countries = DB::table('tblcountries')->get();


   	return view('admin.employee.create',compact('data','countries','Functie'));

	}



	public function store(CreateTblemployeeRequest $request) {



		/*echo '<pre>';

		print_r($request->all());

		die;*/



	//	 $input = Request::all();

		/* $table = new Employmentagency;

		 $table->save($input);*/
//dd("RESTTT");
		 if (@$request->Geschikt) {
			$Geschikt = '';
		 foreach(@$request->Geschikt as $proj_to)
		  {
		 $Geschikt .= $proj_to.","; //exit;
		  }
		  $Geschikt = trim($Geschikt, ",");
		  @$Geschiktarray = $Geschikt;
		}


		$request->request->add(['Geschikt' => $Geschiktarray]);
	 	$input = Tblemployee::create($request->all());

		$ID = $input->id;

			$client = array (
						'contact_id' => $ID,
						'name' => $_POST['Firstname'].' '.$_POST['Lastname'],
						'email'    => $_POST['Email'],
						'password' => Hash::make($_POST['password']),
						'txt_password' => $_POST['password'],
						'remember_token' => $_POST['_token'],
						'phone'    => $_POST['Mobile'],
						'status'    => 1,
						'group'    => 2,
						);

	DB::table('users') ->insert($client);






		if (!empty($request->Save)) {

			Session::flash('message', ' Nieuwe werknemer is met success toegevoegd.');

			return redirect('admin/edit_employee/'.$ID);

			//return redirect('admin/weekcard');

		}

		if (!empty($request->Save_Close)) {

		Session::flash('message', ' Nieuwe werknemer is met success toegevoegd.');

		return redirect('admin/employees');

		}



		if (!empty($request->Save_New)) {

		Session::flash('message', ' Nieuwe werknemer is met success toegevoegd.');

		return redirect('admin/create_employee');

		}

		/*Session::flash('message', ' Ingevoegd Employee !');

		return redirect('admin/employees');*/

	}



	public function GetAvailabileEmployee() {



	//$data = DB::table('tblemployee')->select('*')->get();

	//$Employee = Tblemployee::all();

	//$data = Tblemployee::all();

	//return View('admin.employee.allemployees')->with('data', $data);

	//$id ='Active';



    return View('admin.employee.allemployees_available');

	}






	public function getemployee() {



	//$data = DB::table('tblemployee')->select('*')->get();

	//$Employee = Tblemployee::all();

	//$data = Tblemployee::all();

	//return View('admin.employee.allemployees')->with('data', $data);

	$id = '';

    return View('admin.employee.allemployees_new',compact('id'));

	}

	public function AdvanceSearch()
	{
		$searchs = '';
		$selects  = array();
		$agencies = Employmentagency::where('Active',1)->OrderBy('Name','ASC')->get();
		$Functies = Functie::orderBy('name','ASC')->get();
		$countries = DB::table('tblcountries')->get();
		// dd(!empty($searchs));
		return view('admin.employee.advanceSearch')
								->withSearchs($searchs)
								->withAgencies($agencies)
								->withCountries($countries)
								->withFuncties($Functies)
								->withSelects($selects);
	}

	public function AdvSearch(Request $request)
	{
		// dd($request->all());
		$agencies = Employmentagency::where('Active',1)->OrderBy('Name','ASC')->get();
		$Functies = Functie::orderBy('name','ASC')->get();
		$countries = DB::table('tblcountries')->get();

    // dd($request->all());
		if(!empty($request->name)){
			$name = '(Firstname LIKE "%' . $request->name . '%" OR Lastname like "%' . $request->name . '%") AND';
			// $f_name='Firstname LIKE "%'.$request->name.'%"';
			// $l_name='Lastname LIKE "%'.$request->name.'%"';
		}
		else {
			$name = '';
      // $f_name = 'Firstname!=""';
			// $l_name = 'Lastname!=""';
    }
		if(!empty($request->telephone)){
			$telephone = '(Phone LIKE "%' . $request->telephone . '%" OR Mobile like "%' . $request->telephone . '%" OR Mobile2 like "%' . $request->telephone . '%"OR Mobile3 like "%' . $request->telephone . '%") AND';
			// $f_name='Firstname LIKE "%'.$request->name.'%"';
			// $l_name='Lastname LIKE "%'.$request->name.'%"';
		}
		else {
			$telephone = '';
      // $f_name = 'Firstname!=""';
			// $l_name = 'Lastname!=""';
    }
		if(!empty($request->email)){
			$email ='Email LIKE "%'.$request->email.'%" AND';
		}
		else {
			$email = '';
    }
		if(!empty($request->ssNumber)){
			$ss_num='Sofinumber LIKE "%'.$request->ssNumber.'%" AND';
		}
		else {
      $ss_num = '';
    }
		if(!empty($request->gesc)){
			$ges='Geschikt LIKE "%'.$request->gesc.'%" AND';
		}
		else {
      $ges = '';
    }
		if(!empty($request->city)){
			$city='City LIKE "%'.$request->city.'%" AND';
		}
		else {
      $city = '';
    }
		if(!empty($request->nationality)){
			$nationality='Nationality = "'.$request->nationality.'" AND';
		}
		else {
      $nationality = '';
    }

		if(!empty($request->agency)){
			$agency='Employmentagency_Id = "'.(int)$request->agency.'" AND';
		}
		else {
			$agency = '';
		}

		$ownCar='Eigen_auto !="" AND';
		$vcaCert='VCA_Certificaat!=""';
		$status='';
		// $status='Active!=""';

		// if (isset($request->ownCar == 1)) {
		// 	$ownCar='Eigen_auto="Eigen auto" AND';
		// }
		// if (isset($request->vcaCert == 1)) {
		// 	$vcaCert='VCA_Certificaat="VCA Certificaat"';
		// }
		// if (isset($request->active == 1)) {
		// 	$status='Active=1 AND';
		// }
		if ($request->ownCar == 1) {
			$ownCar='Eigen_auto="Eigen auto" AND';
		}
		if ($request->vcaCert == 1) {
			$vcaCert='VCA_Certificaat="VCA Certificaat"';
		}
		if ($request->active == 1) {
			$status='Active=1 AND';
		}
		// dd($request->active);
			$selects = array(
			    "name" => $request->name,
					"email" => $request->email,
					"agency" => $request->agency,
			    "ss_num" => $request->ssNumber,
			    "vcaCert" => $request->vcaCert,
			    "ownCar" => $request->ownCar,
			    "active" => $request->active,
					"ges" => $request->gesc,
					"city" => $request->city,
					"telephone" => $request->telephone,
					"nationality" => (int)$request->nationality,
			);
 // dd('select * from v_allemployees where ' . $name . ' ' . $email . ' ' . $telephone . ' ' . $ss_num . ' ' . $ges . ' ' . $city . ' ' . $nationality . ' ' . $ownCar . ' ' . $agency . ' ' . $status . ' ' .$vcaCert );


				$searchs = DB::select('select * from v_allemployees where ' . $name . ' ' . $email . ' ' . $telephone . ' ' . $ss_num . ' ' . $ges . ' ' . $city . ' ' . $nationality . ' ' . $ownCar . ' ' . $agency . ' ' . $status . ' ' .$vcaCert );

				// $search2 = DB::select('select * from v_allemployees_new where Employmentagency_Id = ' . (int)$request->agency);
  // dd($selects);
		return view('admin.employee.advanceSearch')
								->withSearchs($searchs)
								->withAgencies($agencies)
								->withCountries($countries)
								->withFuncties($Functies)
								->withSelects($selects);
	}



	public function getActiveemployee() {



	//$data = DB::table('tblemployee')->select('*')->get();

	//$Employee = Tblemployee::all();

	//$data = Tblemployee::all();

	//return View('admin.employee.allemployees')->with('data', $data);

	$id ='Active';


//dd($id);
    return View('admin.employee.allemployees_new',compact('id'));

	}



	public function getInactiveemployee() {



	//$data = DB::table('tblemployee')->select('*')->get();

	//$Employee = Tblemployee::all();

	//$data = Tblemployee::all();

	//return View('admin.employee.allemployees')->with('data', $data);

    $id = 'Inactive';



    return View('admin.employee.allemployees_new',compact('id'));

	}





	 public function show($id) {

        //
		$GetFile = new Tblemployee;
		$data = Tblemployee::find($id);
		$agency = DB::table('tblemploymentagency')->where('Id', '=', $data->Employmentagency_Id)->first();
		$countries = DB::table('tblcountries')->get();
		$Documents = $GetFile->GetDocument($id);
		$Password = DB::table('users')->select('*')->where('contact_id',$id)->first();
		return View('admin.employee.view',compact('data', 'agency','countries','Documents','Password'));





    }



	public function edit($id) {

		$Functie = Functie::orderBy('name','ASC')->get();
		$GetFile = new Tblemployee;
		$Get_Employee = Tblemployee::find($id);
		$Documents = $GetFile->GetDocument($id);
		$Password = DB::table('users')->select('*')->where('contact_id', '=', $id)->first();
		$data = Employmentagency::where('Active',1)->OrderBy('Name','ASC')->get();
		$countries = DB::table('tblcountries')->get();

		// set starting and ending date
		$zero = 0;
		$current_week = date('W');
		$current_week = strlen($current_week) == 1 ? $zero . $current_week : $current_week;
		$ending = date('Y') . $current_week;

		$end_week = date('W') - 10;
		$end_week = strlen($end_week) == 1 ? $zero . $end_week : $end_week;

		$starting  = date('Y') . $end_week;

		return View('admin.employee.edit',compact('data', 'Get_Employee','countries','Documents','Functie','Password', 'id', 'starting', 'ending'));

    }

	function EditDoc ($id) {

	$GetDocumentDetails = DB::table('tblemployee_document')->where('id', '=', $id)->first();

	}

	function EmployeeWorkHistory(Request $request, $id)
	{
		$weekFrom = null;
		$yearFrom = null;
		$weekTo   = null;
		$yearTo   = null;
		$total 		= 0;
		$employee = Employee::findOrFail($id);
		// dd($employee);

		if ($request->starting) {
			$yearFrom = substr($request->starting, 0, 4);
			$weekFrom = substr($request->starting, 4, 6);

			$yearTo = substr($request->ending, 0, 4);
			$weekTo = substr($request->ending, 4, 6);

			$records = DB::select('
						select t.id, t.Weekcard_Id as Weekcard_Id, w.Weeknumber, p.id as project_id, p.Name as Project_name, ea.Name as emp_name,
						t.Mon, t.Tue, t.Wed, t.Thu, t.Fri, t.Sat, t.Sun, SUM(t.Mon + t.Tue + t.Wed+ t.Thu+ t.Fri+ t.Sat + t.Sun) as Total

						from tbltimecard t
						inner join tblweekcard w
						on t.Weekcard_Id = w.id
						inner join tblproject p
						on w.Project_Id = p.Id
						INNER JOIN tblemploymentagency ea
						on t.Employmentagency_id = ea.id
						where t.Employee_Id = :ID
						and w.Weeknumber between :start and :end
						GROUP BY t.id
			', ['ID' => $id, 'start' => $request->starting, 'end' => $request->ending]);

		} else {
			$records = DB::select('
						select t.id, t.Weekcard_Id as Weekcard_Id, w.Weeknumber, p.id as project_id, p.Name as Project_name, ea.Name as emp_name,
						t.Mon, t.Tue, t.Wed, t.Thu, t.Fri, t.Sat, t.Sun, SUM(t.Mon + t.Tue + t.Wed+ t.Thu+ t.Fri+ t.Sat + t.Sun) as Total

						from tbltimecard t
						inner join tblweekcard w
						on t.Weekcard_Id = w.id
						inner join tblproject p
						on w.Project_Id = p.Id
						INNER JOIN tblemploymentagency ea
						on t.Employmentagency_id = ea.id
						where t.Employee_Id = :ID
						GROUP BY t.id
			', ['ID' => $id]);

		}

		foreach ($records as $key => $record) {
			$total = $total +  $record->Total;
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

		return view('admin.employee.workHistory', compact('records', 'employee', 'weekNumbers', 'yearNumbers', 'yearFrom', 'weekFrom', 'yearTo', 'weekTo', 'total'));
	}


	public function EmployeeWorkHistoryPDF(Request $request, $id)
	{
		$weekFrom = null;
		$yearFrom = null;
		$weekTo   = null;
		$yearTo   = null;
		$total 		= 0;
		$employee = Employee::findOrFail($id);
		// dd($employee);

		if ($request->starting) {
			$yearFrom = substr($request->starting, 0, 4);
			$weekFrom = substr($request->starting, 4, 6);

			$yearTo = substr($request->ending, 0, 4);
			$weekTo = substr($request->ending, 4, 6);

			$records = DB::select('
						select t.id, t.Weekcard_Id as Weekcard_Id, w.Weeknumber, p.id as project_id, p.Name as Project_name, ea.Name as emp_name,
						t.Mon, t.Tue, t.Wed, t.Thu, t.Fri, t.Sat, t.Sun, SUM(t.Mon + t.Tue + t.Wed+ t.Thu+ t.Fri+ t.Sat + t.Sun) as Total

						from tbltimecard t
						inner join tblweekcard w
						on t.Weekcard_Id = w.id
						inner join tblproject p
						on w.Project_Id = p.Id
						INNER JOIN tblemploymentagency ea
						on t.Employmentagency_id = ea.id
						where t.Employee_Id = :ID
						and w.Weeknumber between :start and :end
						GROUP BY t.id
						order by w.Weeknumber desc
			', ['ID' => $id, 'start' => $request->starting, 'end' => $request->ending]);

		} else {
			$records = DB::select('
						select t.id, t.Weekcard_Id as Weekcard_Id, w.Weeknumber, p.id as project_id, p.Name as Project_name, ea.Name as emp_name,
						t.Mon, t.Tue, t.Wed, t.Thu, t.Fri, t.Sat, t.Sun, SUM(t.Mon + t.Tue + t.Wed+ t.Thu+ t.Fri+ t.Sat + t.Sun) as Total

						from tbltimecard t
						inner join tblweekcard w
						on t.Weekcard_Id = w.id
						inner join tblproject p
						on w.Project_Id = p.Id
						INNER JOIN tblemploymentagency ea
						on t.Employmentagency_id = ea.id
						where t.Employee_Id = :ID
						GROUP BY t.id
						order by w.Weeknumber desc
			', ['ID' => $id]);

		}

		foreach ($records as $key => $record) {
			$total = $total +  $record->Total;
		}


		$time = Carbon::now();

		// return view('admin.employee.workHistory_PDF', compact('records', 'employee', 'yearFrom', 'weekFrom', 'yearTo', 'weekTo', 'time', 'total'));

		$pdf= PDF::loadView('admin.employee.workHistory_PDF', compact(
				'records', 'employee', 'yearFrom', 'weekFrom', 'yearTo', 'weekTo', 'time', 'total'
		));

		$pdf->setPaper('a4' , 'portrait');
		return $pdf->download('work_details.pdf');

	}

	function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){

    //folder path setup
    $target_path = $target_folder;
    $thumb_path = $thumb_folder;

    //file name setup
    $filename_err = explode(".",$_FILES[$field_name]['name']);
    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];
    if($file_name != ''){
        $fileName = $file_name.'.'.$file_ext;
    }else{
        $fileName = $_FILES[$field_name]['name'];
    }

    //upload image path
    $upload_image = $target_path.basename($fileName);

    //upload image
    if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
    {
        //thumbnail creation
        if($thumb == TRUE)
        {
            $thumbnail = $thumb_path.$fileName;
            list($width,$height) = getimagesize($upload_image);
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($file_ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;

                case 'png':
                    $source = imagecreatefrompng($upload_image);
                    break;
                case 'gif':
                    $source = imagecreatefromgif($upload_image);
                    break;
                default:
                    $source = imagecreatefromjpeg($upload_image);
            }

            imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($file_ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail,100);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail,100);
                    break;

                case 'gif':
                    imagegif($thumb_create,$thumbnail,100);
                    break;
                default:
                    imagejpeg($thumb_create,$thumbnail,100);
            }

        }

        return $fileName;
    }
    else
    {
        return false;
    }
}


	public function update(CreateTblemployeeRequest $request) {

	$post = $request->all();

	if (!empty($_POST['SendEmail']) && !empty($_POST['Email'])) {

			$EmailData = array ( 'Firstname' => $_POST['Firstname'],
							'Lastname' 	=> $_POST['Lastname'],
							'Email' 	=> $_POST['Email'],
							'Password' 	=> $_POST['password'],
							'id' 	=> $_POST['id']
			);

		return View('admin.employee.email',compact('EmailData'));
		} else {

	if (!empty($post['Image'])) {
	$GetEmployeeImage = Tblemployee::find($post['id']);
	@unlink('uploads/employee/'. $GetEmployeeImage->Image);
	@unlink('uploads/employee/thumbs/'.$GetEmployeeImage->Image);
	$file = $post['Image'];
	$input = array('Image' => $file);
	$destinationPath = 'uploads/employee/';
	$filename = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
	$post['Image']->move($destinationPath,$filename);
	Image::make($destinationPath.$filename,array(
	'width' => 150,
	'height' => 150,
	'grayscale' => false
	))->save($destinationPath.'thumbs/'.$filename);
	}
		/*echo '<pre>';
		print_r($post);
		die;*/
		if (empty($request->Active) ) { $check = 0;} else { $check = 1; }
		unset($request->Active);
		$post['Active'] = $check;


		if (empty($request->Eigen_auto) ) { $Eigen_auto_check = 0;} else { $Eigen_auto_check = 1; }
		unset($request->Eigen_auto);
		$post['Eigen_auto'] = $Eigen_auto_check;

		if (empty($request->VCA_Certificaat) ) { $VCA_Certificaat_check = 0;} else { $VCA_Certificaat_check = 1; }
		unset($request->VCA_Certificaat);
		$post['VCA_Certificaat'] = $VCA_Certificaat_check;




		$Get_Employee = Tblemployee::findOrfail($post['id']);
		if (!empty($post['Image'])) {
			$post['Image'] = $filename;
		}

		 if (@$request->Geschikt) {
			$Geschikt = '';
		 foreach(@$request->Geschikt as $proj_to)
		  {
		 $Geschikt .= $proj_to.","; //exit;
		  }
		  $Geschikt = trim($Geschikt, ",");
		  @$Geschiktarray = $Geschikt;
		}

		$post['Geschikt'] = @$Geschiktarray;

		$Get_Employee->update($post);


		$Employee = array (
						'contact_id' => $post['id'],
						'name' => $_POST['Firstname'].' '.$_POST['Lastname'],
						'email'    => $_POST['Email'],
						'remember_token' => $_POST['_token'],
						'phone'    => $_POST['Mobile'],
						'status'    => 1,
						'group'    => 2,
						);

		$Employee['password'] = Hash::make($_POST['password']);
		$Employee['txt_password'] = $_POST['password'];
	//}

		$CheckUser = User::where('contact_id', '=', $post['id'])->first();
		if ($CheckUser) {
			$CheckUser->name = $_POST['Firstname'].' '.$_POST['Lastname'];
			$CheckUser->email = $_POST['Email'];
			$CheckUser->phone = $_POST['Mobile'];
			$CheckUser->password = Hash::make($_POST['password']);
			$CheckUser->txt_password = $_POST['password'];
			$CheckUser->save();
		} else {
			// dd("NO");
			DB::table('users') ->insert($Employee);
		}







		if (!empty($post['Save'])) {

			Session::flash('message', ' Werknemer data is met success bijgewerkt.');

			return redirect('admin/edit_employee/'.$post['id']);

			//return redirect('admin/weekcard');

		}

		if (!empty($post['Save_Close'])) {

		Session::flash('message', ' Werknemer data is met success bijgewerkt.');

		return redirect('admin/employees');

		}



		if (!empty($post['Save_New'])) {

		Session::flash('message', ' Werknemer data is met success bijgewerkt.');

		return redirect('admin/create_employee');

		}
	}
		/*Session::flash('message', ' Employee bijgewerkt!');

		return redirect('admin/employees');*/

		}



	public function UploadDocument(DocumentEmployeeRequest $request) {


	$post = $request->all();
	/*	echo '<pre>';
		print_r($post);
		die;		*/
	$FileUpload = new Tblemployee;

	$file = $post['File'];
	$input = array('File' => $file);
	$destinationPath = 'uploads/employee/document';
	$filename = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
	$post['File']->move($destinationPath,$filename);
	$data = array (
					'Emp_id' => $post['emp_id'],
					'DocType' => $post['Doc_Type'],
					'ExpiryDate' => $post['Exp_date'],
					'File' => $filename
	);

	$FileUpload->SaveDocument($data);

	Session::flash('message', ' Werknemersdocument is succesvol bijgewerkt.');

			return redirect('admin/edit_employee/'.$post['emp_id']);
	}


	public function UpdateDocument(DocumentInfoRequest $request) {


	$post = $request->all();

	$FileUpload = new Tblemployee;

	if (!empty($post['File'])) {
		$Documents =  DB::table('tblemployee_document')->where('id', $post['doc_id'])->first();
		@unlink('uploads/employee/document/'. $Documents->File);

	$file = $post['File'];
	$input = array('File' => $file);
	$destinationPath = 'uploads/employee/document';
	$filename = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
	$post['File']->move($destinationPath,$filename);
	}

	$data = array (
					'Emp_id' => $post['emp_id'],
					'DocType' => $post['Doc_Type'],
					'ExpiryDate' => $post['Exp_date'],
					// 'File' => @$filename
	);

	$FileUpload->UpdateDocument($data,$post['doc_id']);

	Session::flash('message', ' Werknemersdocument is succesvol bijgewerkt.');

			return redirect('admin/edit_employee/'.$post['emp_id']);
	}

	function email (Request $request) {

		// $To['email'] = Input::get('Email');
		// $text = Input::get('Text');

		$To['email'] = $request->Email;
		$text = $request->Text;


		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From: " . strip_tags('planning@easycleanup.nl') . "\r\n";


		$EmailSent = mail($To['email'], 'Afvalcontainers mailen naar', $text, $headers);


		if (isset($To) && isset($EmailSent)) {

			Session::flash('message', 'Email verzonden');

			} else {

			Session::flash('error', 'Email Error');

			}

			return redirect('admin/ActiveEmp');

	}


	public function delete($id) {


		$data = DB::table('tblemployee')->where('id', $id)->delete();

		//if ($data > 0) {

		Session::flash('message', ' Verwijderde Werknemer!');

		return redirect('admin/employees');

	//}



	}


	public function DeleteDoc($id) {


		$Documents =  DB::table('tblemployee_document')->where('id', $id)->first();
		@unlink('uploads/employee/document/'. $Documents->File);


		$data = DB::table('tblemployee_document')->where('id', $id)->delete();

		//if ($data > 0) {

		Session::flash('message', ' Medewerkersdocument is succesvol verwijderd.');

			return redirect('admin/edit_employee/'.$Documents->emp_id);

	//}



	}



	public function ActiveEmployee ($id) {



		DB:: table( 'tblemployee' )-> where( 'id' , '=' , $id)-> update( array('Active' => 1 ));

		Session::flash('message', 'Personeel succesvol goedgekeurd....');

		return redirect('admin/employees');

	}



	public function InactiveEmployee ($id) {



		DB:: table( 'tblemployee' )-> where( 'id' , '=' , $id)-> update( array('Active' => 0 ));

		Session::flash('message', 'Personeel succesvol afgekeurd....');

		return redirect('admin/employees');

	}


	public function getActiveEmployees () {



		$users = DB::table('v_employee')->select('*')->where('Active','=',1);

        return Datatables::of($users)

		->addColumn('status' , function ($users) {

			return '<span class="label label-success">Actief</span>';



		})

		->addColumn('Opties' , function ($users) {

			return '<a href="employee/'.$users->id.'" title="Inzien" class="widget-icon">

		<span class="icon-eye-open"></span></a>

		<a href="edit_employee/'.$users->id.'" title="Bewerken" class="widget-icon">

		<span class="icon-pencil"></span></a>

		<a href="delete_employee/'.$users->id.'" title="verwijderen" class="widget-icon" onclick="deleteRecord();">

		<span class="icon-trash"></span></a>

		';

		})->make(true);



		}

	public function getInactiveEmployees () {



		$users = DB::table('v_employee')->select('*')->where('Active','=',0);

        return Datatables::of($users)

		->addColumn('status' , function ($users) {

			return '<span class="label label-danger">Inactief</span>';



		})

		->addColumn('Opties' , function ($users) {

			return '<a href="employee/'.$users->id.'" title="Inzien" class="widget-icon">

		<span class="icon-eye-open"></span></a>

		<a href="edit_employee/'.$users->id.'" title="Bewerken" class="widget-icon">

		<span class="icon-pencil"></span></a>

		<a href="delete_employee/'.$users->id.'" title="verwijderen" class="widget-icon" onclick="deleteRecord();">

		<span class="icon-trash"></span></a>

		';

		})->make(true);



		}



		public function getEmployees () {


		//->orderBy('id','DESC')
		$users = DB::table('v_employee')->select('*');

        return Datatables::of($users)

		->addColumn('status' , function ($users) {

			if ($users->Active == 1){

			return '<span class="label label-success">Actief</span>';

			} else {

			return '<span class="label label-danger">Inactief</span>';

			}

		})

		->addColumn('Opties' , function ($users) {

			return '<a href="employee/'.$users->id.'" title="Inzien" class="widget-icon">

		<span class="icon-eye-open"></span></a>

		<a href="edit_employee/'.$users->id.'" title="Bewerken" class="widget-icon">

		<span class="icon-pencil"></span></a>

		<a href="delete_employee/'.$users->id.'" title="verwijderen" class="widget-icon" onclick="deleteRecord();">

		<span class="icon-trash"></span></a>

		';

		})->make(true);



		}




	function Get_All_Employees () {


		$All_Employees =  DB::table('tblemployee')->get();
		foreach ($All_Employees as $All_Emp) {

				DB::table('tblemployee')->where('id',$All_Emp->id) ->update(array ('Active' => 0));
		}

		$Act_Employees = DB::select( DB::raw('SELECT Employee_Id FROM `tbltimecard` WHERE `created_at` >= curdate() - INTERVAL DAYOFWEEK(curdate())+84 DAY AND `created_at` < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY'));

			foreach ($Act_Employees as $Act_Emp) {

				DB::table('tblemployee')->where('id',$Act_Emp->Employee_Id) ->update(array ('Active' => 1));

		}

		Session::flash('message', 'Actief aan Inactief medewerkersproces voltooid');

		return redirect('admin/employees');


		}



}
