<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function city() {
        return $this->belongsTo('App\City');
    }

    public function country() {
        return $this->city->country;
    }

    public function admins() {
        return $this->belongsToMany('App\User', 'company_admins');
    }
}
