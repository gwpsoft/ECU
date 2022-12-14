<?php

namespace App\Http\Controllers\admin;
use App\Department;
use App\clients;
use App\DepartmentAttachment;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Requests;
use Request;
use Session;
use Validator;
use DB;
use Datatables;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    //
	public function getdepartments() {

	/*$data = Department::get();
	return View('admin.department.alldepartments')->with('data', $data);*/
//	$data = Department::get();
	return View('admin.department.alldepartments_ajax');
    }



	public function create($id = 0)
	{

		$CustomerID = $id;

		$data = DB::table('tblcustomer')->orderBy('Name','ASC')->get();

   	return view('admin.department.create',compact('data','CustomerID'));
	}

	public function save(DepartmentRequest $request) {

		$input = Department::create($request->all());

		$ID = $input->id;
		if (!empty($request->Save)) {
			Session::flash('message', ' Ingevoegde afdeling!');
			return redirect('admin/edit_department/'.$ID);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Ingevoegde afdeling!');
		return redirect('admin/departments');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Ingevoegde afdeling!');
		return redirect('admin/create_department');
		}

	/*Session::flash('message', 'Successfully Inserted Department!');
	return redirect('admin/departments');*/

	}

	public function delete($id) {

		$checkInProjectTable = DB::table('tblproject')->where('Department_Id', $id)->count();
		if($checkInProjectTable > 0) {
			Session::flash('message', ' Deze id wordt gebruikt in de projecttabel, dus verwijder daar eerst!');
			return redirect('admin/departments');
		}

		$data = DB::table('tbldepartment')->where('Id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', ' verwijderen afdeling!');
		return redirect('admin/departments');
		}

	}


	 public function show($id)
    {
        //
		$data = Department::find($id);
		$GetContacts = DB::table('tblcontact')->where('Department_Id',$id)->get();
		$GetNotes = DB::table('tblnote')->where('Department_Id',$id)->get();
		$GetProjects = DB::table('tblproject')->where('Department_Id',$id)->get();
		return View('admin.department.view',compact('data','GetContacts','GetNotes','GetProjects'));




    }

	public function edit($id)
    {
        //
		$data = DB::table('tblcustomer')->orderBy('Name','ASC')->get();
		$GetContacts = DB::table('tblcontact')->where('Department_Id',$id)->orderBy('Firstname','ASC')->get();
		$GetNotes = DB::table('tblnote')->where('Department_Id',$id)->orderBy('Contact','ASC')->get();
		$GetProjects = DB::table('tblproject')->where('Department_Id',$id)->orderBy('Name','ASC')->get();


		$Get_department = Department::find($id);
		return View('admin.department.edit',compact('data','Get_department','GetContacts','GetNotes','GetProjects'));
    }

		//////////////////////////// Departments Attachment work below //////////////////////////////////////////


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
			$destinationPath = 'uploads/departments/document/' . $now ;
			$filename = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
			$post['File']->move($destinationPath,$filename);

			// storing records in database table
			$attachment								 = new DepartmentAttachment;
			$attachment->department_id = $request->department_id;
			$attachment->note 				 = $request->note;
			$attachment->added 				 = Carbon::now();
			$attachment->filename 		 = $filename;
			$attachment->file_path 		 = $destinationPath . '/' . $filename;
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document met succes geüpload');
			return redirect('admin/edit_department/'.$request->department_id);


		}


		public function deleteWeekstaatDocument($id)
		{
			$file = DepartmentAttachment::findOrFail($id);
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
			$file = DepartmentAttachment::findOrFail($id);

			return response() -> json([
				'data' => [
					'id'   => $file->id,
					'departmentID' => $file->department_id,
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
			$attachment 						   = DepartmentAttachment::findOrFail($request->fileId);
			$attachment->department_id = $request->departmentID;
			$attachment->note 		     = $request->note;
			$attachment->added 		     = Carbon::now();
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document succesvol bijgewerkt');

			return redirect() -> back();

		}


		//////////////////////////// Departments Attachment work above //////////////////////////////////////////

	public function update(DepartmentRequest $request) {


		$post = $request->all();
		$data = array (
						'Customer_Id' => $post['Customer_Id'],
						'Name' => $post['Name'],
						'Address' => $post['Address'],
						'Zipcode' => $post['Zipcode'],
						'city' => $post['City'],
						'Mailbox' => $post['Mailbox'],
						'MailboxZipcode' => $post['MailboxZipcode'],
						'MailboxCity' => $post['MailboxCity'],
						'Phone' => $post['Phone'],
						'Fax' => $post['Fax'],
						'Email' => $post['Email'],
						'Notes' => $post['Notes']

						);





		$Get_Department = new Department;
		$Get_Department->UpdateDepartment($data,$post['id']);

		if (!empty($request->Save)) {
			Session::flash('message', ' Afdeling bijgewerkt!');
			return redirect('admin/edit_department/'.$post['id']);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Afdeling bijgewerkt!');
		return redirect('admin/departments');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' Afdeling bijgewerkt!');
		return redirect('admin/create_department');
		}
		/*Session::flash('message', ' Afdeling bijgewerkt!');
		return redirect('admin/departments');*/

		}

	function AllDepatments () {

	$data =DB::table('v_depatments')->select('*');
	 return Datatables::of($data)

	  ->addColumn('Opties' , function ($data) {
				return '<a href="department/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_department/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="javascript:void(0)" title="verwijderen" class="widget-icon" onclick="deleteRecord('. $data->Id . ');">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}

}
