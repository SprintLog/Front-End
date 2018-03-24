<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AutoComplateController extends Controller
{
   public function ajaxDataStd(Request $request)
   {
      $query = $request->get('query','');
      $users = User::where('name','LIKE','%'.$query.'%')->orWhere('typeUser',0)->get();
      return response()->json($users);
   }
   public function ajaxDataLec(Request $request)
   {
      $query = $request->get('query','');
      $users = User::where('name','LIKE','%'.$query.'%')->orWhere('typeUser',1)->get();
      return response()->json($users);
   }
}
