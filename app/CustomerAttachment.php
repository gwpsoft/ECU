<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAttachment extends Model
{
  public function customer() {
      return $this->belongsTo(Customers::class);
  }

}
