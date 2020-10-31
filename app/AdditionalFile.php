<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalFile extends Model
{
    protected $fillable = ['name', 'document_id'];
    protected $table = 'additional_files';

    public function document() {
        return $this->belongsTo('App\Document');
    }

    public function users() {
        return $this->hasMany('App\UserAdditionalFile');
    }
}
