<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functie extends Model
{
    //
	
	public $table = "tblfunctie";
	
	protected $fillable = [ 'id', 'code', 'name','created_at', 'updated_at'];
	
	
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
