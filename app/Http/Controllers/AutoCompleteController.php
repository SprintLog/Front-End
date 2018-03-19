<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
   public function index(){
      return view('TestAuto.autocomplete');
   }

   public function ajaxData(Request $request){

     $query = $request->get('query','');

     $posts = User::where('name','LIKE','%'.$query.'%')->get();

     return response()->json($posts);

  }

}
