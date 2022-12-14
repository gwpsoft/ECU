<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUploadsInWeekstaat extends Model
{

    protected $fillable =  [
        'WeekNumber',
        'ProjectId',
        'PlanningId',
        'FileName',
    ];
}
