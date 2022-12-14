<?php

namespace App\Http\Controllers\admin;
use App\Tblemployee;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use PDF;
use DB;

class ApplicantsController extends Controller
{
    //
	
	public function Getall() {		
		
		$data = DB::table('tblapplicants')->select('*')->get();
		return View('admin.applicants.applicants')->with('data', $data);
		
		}
	
	 public function show($id) {
        	
		$data = DB::table('tblapplicants')->where('id', '=', $id)->first();
		
		$agency = DB::table('tblemploymentagency')->where('id', '=', $data->employment_agency)->first();	
		
		return View('admin.applicants.view',compact('data', 'agency'));
		
    }
	
	public function approve($id) {		
		
		$Result = DB::table('tblapplicants')->where('id', '=', $id)->first();
		
		$Applicant = array (					
					'Birthday' => $Result->Birthday,
					'Mobile' => $Result->Mobiel_no,
					'Phone' => $Result->phone,
					'Firstname' => $Result->FirstName,
					'Lastname' => $Result->Surname,
					'Employmentagency_Id' => $Result->employment_agency,
					'Address' => $Result->Adress,
					'Zipcode' => $Result->Postcode,					
					'created_at' => date('Y-m-d h:i:s', time())
					);
		DB::table('tblemployee')->insert($Applicant);
		DB::table('tblapplicants')->where('id', $id)->update(array ('status' => 1));
		
		Session::flash('message', 'Aanvrager goedgekeurde..!');
		return redirect('admin/applicants');
	}
	
	public function delete($id) {
		
		$data = DB::table('tblapplicants')->where('id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' Verwijderde Aanvrager !');
		return redirect('admin/applicants');
		}
	}
	
	function download_pdf ($id) {
		
		$data = DB::table('tblapplicants')->where('id', '=', $id)->first();
		$agency = DB::table('tblemploymentagency')->where('id', '=', $data->employment_agency)->first();	
		$pdf= PDF::loadView('admin.applicants.pdf', compact('data','agency'));
		return $pdf->download('Applicant.pdf');		
		
		}
	
}
