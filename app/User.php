<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guard = 'admin';
    protected $fillable = ['name', 'lastname', 'email','password','projectid','typeuser'];
  
}
