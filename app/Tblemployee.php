<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Tblemployee extends Model
{
    //
	public $table = "tblemployee";
	
	protected $fillable = [ 'Employmentagency_Id', 'Active', 'Gender', 'Lastname', 'Firstname', 'initials', 'Birthday', 'Sofinumber', 'Startdate', 'Id_Type', 'Id_Number', 'Id_Expirationdate', 'Image','Address', 'Zipcode', 'City', 'Country', 'Phone', 'Mobile', 'Mobile2', 'Mobile3', 'Email', 'Rate', 'Cost', 'Notes', 'Employmentagencynote','Nationality','Geschikt','Eigen_auto','VCA_Certificaat'];
	
	public function scopeget() {
		
		$result = DB::table('tblemployee')->select('*')->get();
		return $result;
		}
		
		
	public function SaveDocument($data) {
		
		DB::table('tblemployee_document')->insert($data);
		
	}	
	
	public function GetDocument($EmpID) {
		
		$result = DB::table('tblemployee_document')->where('Emp_id' ,$EmpID)->select('*')->get();
		return $result;
		}
	
	public function UpdateDocument($data,$id) {
	
		return DB::table('tblemployee_document')->where('id',$id) ->update($data);
	}
	
	
}
