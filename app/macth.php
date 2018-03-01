<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class macth extends Model
{
    public user(){
        return $this->belongsToMany('App\User');
    }
    public project(){
        return $this->belongsToMany('App\Project');
    }
}
