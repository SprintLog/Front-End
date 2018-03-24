<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtasks extends Model
{
    //
    public function task(){
      return $this->belongsTo('App\Task');
    }
}
