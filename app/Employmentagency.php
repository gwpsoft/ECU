<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employmentagency extends Model
{
    //
	public $table = "tblemploymentagency";

	protected $fillable = [ 'Name', 'Address', 'Zipcode', 'City', 'Country', 'Phone', 'Fax', 'Email', 'Contact1', 'Mobile1', 'Contact2', 'Mobile2', 'Contact3', 'Mobile3', 'Notes','Active', 'created_at', 'updated_at'];





	public function scopeget() {

		$result = DB::table('tblemploymentagency')->select('*')->get();
		return $result;
		}

	public function employmentagencyAttachments() {
		return $this->hasMany(EmploymentagencyAttachment::class, 'employmentagency_id', 'Id');
	}

}
