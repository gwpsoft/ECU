<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekCardAttachment extends Model
{
    protected $table = 'week_card_attachments';

    public function weekcard() {
      return $this->belongsTo(Weekcard::class, 'week_card_id');
    }
}
