<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeetcardAttachment extends Model
{
    protected $table = 'keetcard_attachments';

    public function keetcard() {
        return $this->belongsTo(Keetcard::class, 'keetcard_id', 'id');
    }
}
