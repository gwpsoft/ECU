<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
	public $table = "tblcustomer";

	protected $fillable = [ 'Name', 'Notes', 'created_at', 'updated_at'];


	public function scopeget() {

		$result = DB::table($table)->select('*')->get();
		return $result;
		}

		public function customerAttachments() {
			return $this->hasMany(CustomerAttachment::class, 'customers_id', 'Id');
		}


}
