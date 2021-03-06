<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone_number', 'email', 'password', 'id_path', 'picture_verification_path', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullName() {
        return $this->first_name . " " .  $this->last_name;
    }

    public function companies() {
        return $this->belongsToMany('App\Company', 'company_admins');
    }
    
    public function hasCompany($company_id) {
        return $this->companies->contains(function($value, $key)use($company_id){
            return $value->id == $company_id;
                    });
    }

    public function userAdditionalFiles() {
        return $this->hasMany('App\UserAdditionalFile');
    }
}
