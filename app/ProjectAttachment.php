<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAttachment extends Model
{
    protected $table = 'project_attachments';

    public function project() {
        return $this->belongsTo(Projects::class);
    }
}
