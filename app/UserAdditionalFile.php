<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdditionalFile extends Model
{
    protected $table = 'user_additional_file';
    protected $fillable = ['name', 'additional_file_id', 'user_id', 'path', 'user_document_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function additionalFile() {
        return $this->belongsTo('App\AdditionalFile');
    }

    public function userDocument() {
        return $this->belongsTo('App\UserDocument');
    }
}
