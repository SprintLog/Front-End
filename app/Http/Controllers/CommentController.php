<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function like($id)
    {
      $posts = Comment::find($id);
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

      $comment = new Comment();
      $comment->body = $request->body;
      $comment->taskId = $request->taskId;
      $comment->userId = Auth::user()->id;
      $comment->save();
      return back();
    }
}
