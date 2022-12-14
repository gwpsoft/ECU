<?php

namespace App\Http\Controllers\admin;
use App\Customers;
use App\CustomerAttachment;
use App\Department;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request as Requests;
use DB;
use Request;
use Session;
use Validator;
use Datatables;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class CustomersController extends Controller
{
    //
	public function getcustomers() {
	/*abort(404);*/
	//$data = Customers::get();
	//return View('admin.customers.allcustomers')->with('data', $data);
	return View('admin.customers.allcustomers_ajax');


    }

	public function create()
	{
   	return view('admin.customers.create');
	}

	public function save(CustomerRequest $request) {
		//return $request;

		$input = Customers::create($request->all());
		$ID = $input->id;
		if (!empty($request->Save)) {
			Session::flash('message', ' ingebracht Klant!');
			return redirect('admin/edit_customer/'.$ID);
			//return redirect('admin/weekcard');
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' ingebracht Klant!');
		return redirect('admin/customers');
		}

		if (!empty($request->Save_New)) {
		Session::flash('message', ' ingebracht Klant!');
		return redirect('admin/create_customer');
		}

		// $table = new Employmentagency;
		 //$table->save($input);

	/*Session::flash('message', 'ingebracht Klant!');
	return redirect('admin/customers');*/

	}

	public function delete($id) {

		$checkInDeptTable = DB::table('tbldepartment')->where('Customer_id', $id)->count();
		if($checkInDeptTable > 0) {
			Session::flash('message', ' Deze klant is al in gebruik in Afdeling, dus verwijder daar eerst!');
			return redirect('admin/customers');
		}


		$data = DB::table('tblcustomer')->where('id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', ' Verwijderde Werknemer!');
		return redirect('admin/customers');
		}

	}

	 public function show($id)
    {
       	$data = Customers::find($id);
		$departments = Department::orderBy('Name','ASC')->where('Customer_Id',$id)->get();
		return View('admin.customers.view',compact('data','departments'));
    }

	public function edit($id)
    {
        //
		$departments = Department::orderBy('Name','ASC')->where('Customer_Id',$id)->get();
		$Get_Customer = Customers::find($id);
		return View('admin.customers.edit',compact('Get_Customer','departments'));
    }

		/////////////////////////////////////// Customer attachments work below ///////////////////

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
			$destinationPath = 'uploads/customers/document/' . $now ;
			$filename        = md5(microtime() . $file->getClientOriginalName($file)) . "." . $file->getClientOriginalExtension();
			$post['File']->move($destinationPath,$filename);

			// storing records in database table
			$attachment = new CustomerAttachment;
			$attachment->customers_id = $request->customers_id;
			$attachment->note 			  = $request->note;
			$attachment->added			  = Carbon::now();
			$attachment->filename			= $filename;
			$attachment->file_path	  = $destinationPath . '/' . $filename;
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document met succes geüpload');
			return redirect('admin/edit_customer/'.$request->customers_id);


		}


		public function deleteWeekstaatDocument($id)
		{
			$file = CustomerAttachment::findOrFail($id);
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
			$file = CustomerAttachment::findOrFail($id);

			return response() -> json([
				'data' => [
					'id'   => $file->id,
					'customerID' => $file->customers_id,
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
			$attachment 						 = CustomerAttachment::findOrFail($request->fileId);
			$attachment->customers_id = $request->customerID;
			$attachment->note 		   = $request->note;
			$attachment->added 		   = Carbon::now();
			$attachment->save();

			// Flash message
			Session::flash('message', 'Document succesvol bijgewerkt');

			return redirect() -> back();

		}


		/////////////////////////////////////// Customer attachments work above ///////////////////

	public function update(CustomerRequest $request) {

		$post = $request->all();
		$data = array (
						'Notes' => $post['Notes'],
						'Name' => $post['Name']

						);
		//$Get_Customer = Customers::find($post['id']);
		//$Get_Customer->update($request->all());

		DB::table('tblcustomer')->where('id',$post['id']) ->update($data);

		if (!empty($post['Save'])) {
			Session::flash('message', ' Klant bijgewerkt!');
			return redirect('admin/edit_customer/'.$post['id']);
			//return redirect('admin/weekcard');
		}
		if (!empty($post['Save_Close'])) {
		Session::flash('message', ' Klant bijgewerkt!');
		return redirect('admin/customers');
		}

		if (!empty($post['Save_New'])) {
		Session::flash('message', ' Klant bijgewerkt!');
		return redirect('admin/create_customer');
		}
		/*Session::flash('message', ' Klant bijgewerkt!');
		return redirect('admin/customers');*/

		}

	function AllCustomers () {

	$data = DB::table('tblcustomer')->select('*');
	 return Datatables::of($data)
	  ->addColumn('Notes' , function ($data) {
				return str_limit($data->Notes , 20);
				 })
	  ->addColumn('Opties' , function ($data) {
				return '<a href="view_customer/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_customer/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="javascript:void(0)" title="verwijderen" class="widget-icon" onclick="deleteRecord('. $data->Id . ');">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);





	}

}
