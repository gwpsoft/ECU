<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    //
	public $table = "users";
	
	protected $fillable = [ 'name', 'first_name', 'last_name','remember_token', 'email','phone','password', 'status','group', 'created_at', 'updated_at'];
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
