<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
	
	public $table = "tblmessages";
	
	
	protected $fillable = [ 'client_id', 'project_id', 'message','admin_view','user_view'];
	
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
