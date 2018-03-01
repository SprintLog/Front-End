<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
      $tasks = DB::table('tasks')->get();
      return view('addTask', ['tasks' => $tasks]);
    }

    public function insert(Request $request){
      $validator = Validator::make($request->all(), [
            'nameTask' => 'required|max:255',
            'complexity' => 'required|max:255',
            'projectId' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'plz check input');
        }

      // dd($request);
      $task = new Task;
      $task->nametask   = $request->nameTask;
      $task->complexity = $request->complexity;
      // $task->projectId  = $request->projectId; WAIT MAKE PROJECT & USER
      $task->projectId  = $request->projectId;
      $task->save();
      return back();
    }

    public function destroy($id)
    {
      $task = Task::find($id)->delete();
      return back();
    }
}
