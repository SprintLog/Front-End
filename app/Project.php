<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    //
    //protected $primaryKey = 'id';
    public function user(){
      return $this->belongsToMany('App\User');
    }

    public function task(){
      return $this->hasMany('App\Task');
    }
}
