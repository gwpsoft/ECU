<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Department extends Model
{
    //
	public $table = "tbldepartment";

	protected $fillable = [ 'Customer_Id', 'Name','Address','Zipcode','city','Mailbox','MailboxZipcode','MailboxCity','Phone','Fax','Email','Notes', 'created_at', 'updated_at'];



	public function scopeget() {

		$result = DB::table($table)->select('*')->get();
		return $result;
		}

	public function UpdateDepartment($data,$id) {

		return DB::table('tbldepartment')->where('Id',$id) ->update($data);
	}

	public function departmentAttachments() {
		return $this->hasMany(DepartmentAttachment::class, 'department_id', 'Id');
	}



}
