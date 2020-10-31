<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentAttachment extends Model
{
    public function documentInstance() {
        return $this->belongsTo('App\UserDocument');
    }

    public function company() {
        return $this->documentInstance->company;
    }

    public function user() {
        return $this->documentInstance->user;
    }
}
