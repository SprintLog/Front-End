<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    //
    public function like($id)
    {
      $comments = Comment::find($id);
      $comments->likes = $comments->likes + 1 ;

      $comments->save();
      return back();
    }

    public function comment(Request $request)
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

      $comments = new Comment();
      $comments->body = $request->body;
      $comments->taskId = $request->taskId;
      $comments->userId = Auth::user()->id;
      $comments->save();
      return back();
    }
}
