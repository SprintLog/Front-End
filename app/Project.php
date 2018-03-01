<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    //protected $primaryKey = 'id';
    public function task(){
      return $this->hasMany('App\Task');
    }

    public function match(){
      return $this->hasMany('App\macth');
    }
}
