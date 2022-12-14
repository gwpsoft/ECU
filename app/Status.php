<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public $table = "tblstatus";

	protected $fillable = [ 'id', 'name','code','created_at', 'updated_at'];

  public function scopeget() {

		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
