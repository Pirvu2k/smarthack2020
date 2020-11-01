<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function userDocuments() {
        return $this->hasMany('App\UserDocument');
    }

    public function additionalFiles() {
        return $this->hasMany('App\AdditionalFile');
    }

    public function getFields() {
        preg_match_all('/{[^\}]+}/', $this->content, $matches, PREG_OFFSET_CAPTURE);

        return $matches;
    }

    public function hasFiles() {
        return $this->additionalFiles->count() != 0;
    }

}
