<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AutoComplateController extends Controller
{
   public function ajaxDataStd(Request $request)
   {
      $query = $request->get('query','');
      $users= DB::table('users')->where('name','LIKE','%'.$query.'%')->where('typeUser','=',0)->get();

      return response()->json($users);
   }
   public function ajaxDataLec(Request $request)
   {
      $query = $request->get('query','');
      $users = DB::table('users')->where('name','LIKE','%'.$query.'%')->where('typeUser','=',1)->get();
      
      return response()->json($users);
   }
}
