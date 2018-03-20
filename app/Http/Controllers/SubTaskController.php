<?php

namespace App\Http\Controllers;
use App\Subtasks;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SubTaskController extends Controller
{
    //
    public function index($id)
    {
        //
        $projectId =Task::find($id)->projectId;
        $taskName =Task::find($id)->nametask;
        $subtasks = DB::table('subtasks')->where('taskId' , $id)->get();
        return view('subTask', ['taskId' => $id , 'subtasks' => $subtasks, 'projectId' => $projectId , 'taskName' => $taskName]);
    }
    public function completed($id, Request $request)
    {
      $subtask = Subtasks::find($id);

      if ($subtask->completed == 1) {
        $subtask->completed = $subtask->completed - 1  ;
        $subtask->save();
      }elseif ($subtask->completed == 0) {
        $subtask->completed = $subtask->completed + 1  ;
        $subtask->save();
      }
       return back();
    }

    public function store(Request $request)
    {
         //dd($request);

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'desc' => 'required|max:255',
                'taskId' => 'required',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('warning', 'plz check input');
            }

            //dd($request);
            $subtask = new Subtasks;
            $subtask->name          = $request->name;
            $subtask->desc          = $request->desc;
            $subtask->taskId        = $request->taskId;
            $subtask->completed     = 0;


            $subtask->save();
            return back()->with('success', 'Add Sub-Task Success');
    }

    public function destroy($id)
    {
      $task = Subtasks::find($id)->delete();
      return back();
    }
}
