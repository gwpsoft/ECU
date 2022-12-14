<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
	
	public $table = "tbl_emp_messages";
	
	
	protected $fillable = [ 'emp_id', 'project_id', 'message','admin_view','user_view','status','checked_by','checked_at','sender_id'];
	
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
