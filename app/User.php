<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{

    protected $fillable = ['name', 'lastname', 'email','password','projectid','typeUser'];

    public function macth(){
      return $this->hasMany('App\Match');
    }
    public function post()
    {
      return $this->hasMany(Posts::class ,'userId');
    }
}
