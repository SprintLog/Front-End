<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'lastname', 'email','password','projectid','typeuser'];
    public function project(){

    }

}
