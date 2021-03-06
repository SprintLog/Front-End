<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
