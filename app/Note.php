<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
	
	public $table = "tblnote";
	
	protected $fillable = [ 'Projectmanager_Id', 'Datetime', 'Contact', 'Type', 'Text', 'Department_Id', 'Project_Id', 'created_at', 'updated_at'];
	
	
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
