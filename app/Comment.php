<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comment";

    public function user(){
        return $this->belongsTo(User::class , 'userId');
    }

    public function task(){
        return $this->belongsTo(Task::class , 'taskId');
    }
}
