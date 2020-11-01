<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function document() {
        return $this->belongsTo('App\Document');
    }

    public function userAdditionalFiles() {
        return $this->hasMany('App\UserAdditionalFile');
    }
}
