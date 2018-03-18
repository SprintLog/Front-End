<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class , 'userId');
    }
    public function comment(){
        return $this->hasMany(Comment::class , 'userPost');
    }
}
