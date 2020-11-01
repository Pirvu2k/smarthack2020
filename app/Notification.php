<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'company_id', 'text', 'is_seen'];
    protected $table = 'notifications';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }
}
