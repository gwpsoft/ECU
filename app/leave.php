<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    protected $table = 'leaves';
    protected $fillable = [ 'id', 'details',"end_date","leave_type","leave_day_count",
        "status",
        "requested_by",
        "updated_by",
        'start_date','created_at', 'updated_at'];

}
