<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAttachment extends Model
{
    protected $table = "department_attachments";

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
