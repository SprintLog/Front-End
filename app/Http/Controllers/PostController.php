<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    //
    public function like($id)
    {
      $posts = Posts::find($id);
      $posts->likes = $posts->likes + 1 ;

      $posts->save();
      return back();
    }

    public function post(Request $request)
    {

      //dd($request);
      $validator = Validator::make($request->all(), [
          'body' => 'required|max:255',
      ]);

      if ($validator->fails()) {
          return back()
              ->withInput()
              ->withErrors($validator)
              ->with('warning', 'plz check input');
      }

      $posts = new Posts();
      $posts->body = $request->body;
      $posts->projectId = 1;
      $posts->userId = Auth::user()->id;
      $posts->save();
      return back();
    }
}
