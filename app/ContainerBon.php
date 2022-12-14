<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerBon extends Model
{
    //
	public $table = "tblcontainerweekcard";	
	
		public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
