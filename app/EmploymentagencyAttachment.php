<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentagencyAttachment extends Model
{
  protected $table = 'employmentagency_attachments';

  public function employmentagency() {
      return $this->belongsTo(Employmentagency::class);
  }

}
