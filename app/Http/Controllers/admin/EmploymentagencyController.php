<?php
namespace App\Http\Controllers\admin;
use App\Employmentagency;
use App\EmploymentagencyAttachment;
use App\Http\Requests\CreateEmploymentagencyRequest;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Requests;
use Request;
use Session;
use Validator;
use DB;
use Datatables;
use Carbon\Carbon;


/*namespace App\Http\Controllers;
use App\Employmentagency;
use App\Http\Requests;




use Illuminate\Routing\Controller;*/

class EmploymentagencyController extends Controller
{
    //
	public function getagencies() {

	//$data = Employmentagency::get();
	//return View('admin.agency.allagencies')->with('data', $data);
	return View('admin.agency.allagencies_ajax');
    }

	public function create()
	{
   	return view('admin.agency.create');
	}


	public function save(CreateEmploymentagencyRequest $request) {

	$post = $request->all();
	if(!empty( $post['Active'])){
		$post['Active'] = 1;
	} else {
		$post['Active'] = 0;
	}

	if(!empty( $post['zzp'])){
		$post['zzp'] = 1;
	} else {
		$post['zzp'] = 0;
	}

	$data = array (
				'Name' => $post['Name'],
				'Address' => $post['Address'],
				'Zipcode' => $post['Zipcode'],
				'City' => $post['City'],
				'Active' => $post['Active'],
				'zzp' => $post['zzp'],
				'Notes' => $post['Notes'],
				'Phone' => $post['Phone'],
				'Fax' => $post['Fax'],
				'Email' => $post['Email'],
				'Contact1' => $post['Contact1'],
				'Mobile1' => $post['Mobile1'],
				'Contact2' => $post['Contact2'],
				'Mobile2' => $post['Mobile2'],
				'Contact3' => $post['Contact3'],
				'Mobile3' => $post['Mobile3']
	);

	DB::table('tblemploymentagency')
			->insert($data);

		$ID = Employmentagency::max('id');

		if (!empty($request->Save)) {
			Session::flash('message', ' Inserted Agency!');
			return redirect('admin/edit_agency/'.$ID);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Inserted Agency!');
		return redirect('admin/agencies');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Inserted Agency!');
		return redirect('admin/create_agency');
		}
	/*Session::flash('message', 'Inserted Agency!');
	return redirect('admin/agencies');*/

	}

	 public function show($id)
    {
        //
		$Get_Agency = Employmentagency::find($id);
		return View('admin.agency.view')->with('data', $Get_Agency);
    }


	public function edit($id)
    {
        //
		$Get_agency = Employmentagency::find($id);
	/*	print_r($Get_Employmentagency);
		die;
		*/
		return View('admin.agency.edit',compact('Get_agency'));
    }

		/////////////////////////////// Employment Agency File Attachment work below ////////////////////

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
			$destinationPath = 'uploads/EmploymentAgency/document/' . $now ;
			$filename = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
			$post['File']->move($destinationPath,$filename);

			// storing records in database table
			$attachment = new EmploymentagencyAttachment;
			$attachment->employmentagency_id = $request->employmentagency_id;
			$attachment->note 							 = $request->note;
			$attachment->added 							 = Carbon::now();
			$attachment->filename 					 = $filename;
			$attachment->file_path 					 = $destinationPath . '/' . $filename;
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document met succes geüpload');
			return redirect('admin/edit_agency/'.$request->employmentagency_id);


		}

		public function deleteWeekstaatDocument($id)
		{
			$file = EmploymentagencyAttachment::findOrFail($id);
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
			$file = EmploymentagencyAttachment::findOrFail($id);

			return response() -> json([
				'data' => [
					'id'   => $file->id,
					'employmentagencyID' => $file->employmentagency_id,
					'note' => $file->note
				]
			], 200);
		}

		public function updateUploadWeekstaatDoc(Requests $request)
		{

			$this->validate($request, [
					'note'  => 'required',
			],[
				'note.required' => 'Notitieveld is verplicht'
			]);

			// storing records in database table
			$attachment 						 				 = EmploymentagencyAttachment::findOrFail($request->fileId);
			$attachment->employmentagency_id = $request->employmentagencyID;
			$attachment->note 		   				 = $request->note;
			$attachment->added 		   				 = Carbon::now();
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document succesvol bijgewerkt');

			return redirect() -> back();

			}


		/////////////////////////////// Employment Agency File Attachment work above ////////////////////

	public function update(CreateEmploymentagencyRequest $request) {

		$post = $request->all();
		if(!empty( $post['Active'])){
			$post['Active'] = 1;
		} else {
			$post['Active'] = 0;
		}

		if(!empty( $post['zzp'])){
			$post['zzp'] = 1;
		} else {
			$post['zzp'] = 0;
		}

		$data = array (
					'Name' => $post['Name'],
					'Address' => $post['Address'],
					'Zipcode' => $post['Zipcode'],
					'City' => $post['City'],
					'Active' => $post['Active'],
					'zzp' => $post['zzp'],
					'Notes' => $post['Notes'],
					'Phone' => $post['Phone'],
					'Fax' => $post['Fax'],
					'Email' => $post['Email'],
					'Contact1' => $post['Contact1'],
					'Mobile1' => $post['Mobile1'],
					'Contact2' => $post['Contact2'],
					'Mobile2' => $post['Mobile2'],
					'Contact3' => $post['Contact3'],
					'Mobile3' => $post['Mobile3']
		);

		DB::table('tblemploymentagency')
        ->where('id', $post['id'])  // find your user by their email
         // optional - to ensure only one record is updated.
        ->update($data);

		if (!empty($request->Save)) {
			Session::flash('message', ' Uitzendbureau bijgewerkt!');
			return redirect('admin/edit_agency/'.$post['id']);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Uitzendbureau bijgewerkt!');
		return redirect('admin/agencies');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Uitzendbureau bijgewerkt!');
		return redirect('admin/create_agency');
		}

		/*Session::flash('message', ' Uitzendbureau bijgewerkt!');
		return redirect('admin/agencies');*/

		}





	public function delete($id) {

		$data = DB::table('tblemploymentagency')->where('id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', ' Verwijderde Werknemer!');
		return redirect('admin/agencies');
		}

	}
		function AjaxAgencies () {

			$Agencies = DB::table('tblemploymentagency')->select('*');
			 return Datatables::of($Agencies)
			  ->addColumn('Active' , function ($Agencies) {
			if ($Agencies->Active == 1) {
				 return '<span class="label label-success">Actief</span>';
			} else {
				 return '<span class="label label-danger">Inactief</span>';
			}

		 })
			 ->addColumn('Opties' , function ($Agencies) {
			return '<a href="agency/'.$Agencies->Id.'" title="Inzien" class="widget-icon"><span class="icon-eye-open"></span></a>
			<a href="edit_agency/'.$Agencies->Id.'" title="Bewerken" class="widget-icon"><span class="icon-pencil"></span></a>
			<a href="delete_agency/'.$Agencies->Id .'" title="Verwijderen" class="widget-icon" onclick="deleteRecord();"><span class="icon-trash"></span></a>';
				 })
			 ->make(true);



			}

	/*public function store(CreateTblemployeeRequest $request) {

		 $input = Tblemployee::create($request->all());

	Session::flash('message', 'Successfully Inserted Employee!');
	return redirect('employees');

	}*/


}
