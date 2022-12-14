<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
	public $table = "tblcontact";
	
	
	protected $fillable = [ 'Gender', 'Lastname', 'Firstname','Initials','Department_Id','Jobtitle', 'Phone','Phone_Private', 'Mobile','Mobile2','Mobile3','Fax','Email','Notes','Active'];
	
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
	
	
	public function FetchAllContactByDepartment($DepartmentID) {
		
		$result = DB::table('tblcontact')->select('id','Firstname','Lastname','Email','Mobile')->where('Department_Id',$DepartmentID)->orderBy('Firstname','ASC')->get();
		return $result;	
		
		
		
		
		
		
		}
	
}
