<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectmanager extends Model
{
    //
	public $table = "tblprojectmanager";
	
	
	protected $fillable = [ 'Gender', 'Lastname', 'Firstname', 'Initials','Phone', 'Mobile','Email','Notes'];
	
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
	
}
