<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_option extends Model
{
    use SoftDeletes;
    public function question(){
        return $this->belongsTo('App/Question');
    }
}
