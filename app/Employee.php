<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'tblemployee';

    public function Employmentagency() {
      return $this->belongsTo(Employmentagency::class, 'Employmentagency_Id', 'id');
    }
}
