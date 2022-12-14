<?php

namespace App\Http\Controllers\admin;
use App\Shippingcompany;
use App\Http\Requests\ShippingCompanyRequest;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use DB;
use Input;
use Response;


class ShippingCompanyController extends Controller
{
    //
	
	public function GetAll() {
		
		$data = Shippingcompany::all();	
		return View('admin.shippingcompany.all_companies',compact('data'));
	}
	
	public function create(){
	
		return view('admin.shippingcompany.create');
	}	
	
	public function store (ShippingCompanyRequest $request) {
	
		$input = Shippingcompany::create($request->all());
		
		 if (!empty($request->Save)) {
			Session::flash('message', ' Ingebracht Rederij!');
			return redirect('admin/edit_ContainersLeverancier/'.$input->id);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Ingebracht Rederij!');
		return redirect('admin/ContainersLeverancier');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', ' Ingebracht Rederij!');
		return redirect('admin/create_ContainersLeverancier');
		}
		
		
		
		
		
		/*Session::flash('message', ' Ingebracht Rederij !');
		return redirect('admin/ContainersLeverancier');*/
	}
	
	public function edit($id)
    {
        //
		$data = Shippingcompany::find($id);
		
		return View('admin.shippingcompany.edit',compact('data'));	
    }
	
	public function update(ShippingCompanyRequest $request) {
		
		$post = $request->all();
		
		$Company = Shippingcompany::findOrfail($post['id']);
		$Company->update($request->all());
		
		 if (!empty($request->Save)) {
			Session::flash('message', ' Rederij bijgewerkt!');
			return redirect('admin/edit_ContainersLeverancier/'.$post['id']);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Rederij bijgewerkt!');
		return redirect('admin/ContainersLeverancier');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', ' Rederij bijgewerkt!');
		return redirect('admin/create_ContainersLeverancier');
		}
		
		
		
		
		
		/*Session::flash('message', ' Rederij bijgewerkt !');
		return redirect('admin/ContainersLeverancier');*/
		
		}
	
	
	 public function show($id)
    {
        //		
		$data = Shippingcompany::find($id);
		return View('admin.shippingcompany.view',compact('data')); 
		
		
    }
	
	public function delete($id) {
		
		$data = DB::table('tblshippingcompany')->where('id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' Verwijderde Rederij!');
		return redirect('admin/ContainersLeverancier');
		}
	}
	
	
	public function GetPricesByAjax ($id) {		
		
		$data = Shippingcompany::find($id);
		return Response:: json($data);
		
		}
	
	
	
	
	
	
	
	
}
