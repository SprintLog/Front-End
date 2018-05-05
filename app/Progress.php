<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    //

    public function project(){
      return $this->belongsTo('App\Task');
    }
}
