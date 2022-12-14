<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderServices extends Model
{
    protected $table = 'tblorder_services';

    public function project() {
        return $this->belongsTo(Projects::class, 'project_name', 'id');
    }
}
