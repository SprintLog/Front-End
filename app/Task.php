<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  public function project(){
    return $this->belongsTo('App\Project');
  }
  public function subTasks()
  {
    return $this->hasMany('App\Subtasks');
  }
  public function images()
  {
    return $this->hasMany('App\Images');
  }
}
