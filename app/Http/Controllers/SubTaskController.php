<?php

namespace App\Http\Controllers;
use App\Subtasks;
use App\Project;
use App\Task;
use App\Images;
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
        $images = DB::table('images')->where('taskId' , $id);
        if ($images !== null) {
          $images= $images->get();
        }
        // foreach ($images as $image) {
        //     echo $image->fileName."<br>";
        // }
        return view('subTask', ['taskId' => $id ,
                                'subtasks' => $subtasks,
                                'projectId' => $projectId ,
                                'taskName' => $taskName,
                                'images'   => $images
                              ]);
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
    public function update(Request $request)
    {
      $subtaskId = $request->id;
      $subtaskName =  $request->name;
      $desc =  $request->desc;

      Subtasks::where('id', $subtaskId)
          ->update(['name' => $subtaskName , 'desc' => $desc ]);

        return back()->with('success', 'Update Sub-Task Success');
    }
    public function calculate()
    {
      //$tasks = DB::table('subtasks')->where('taskId' , 6)->where('completed' , 0)->get();
      //$tasks = Subtasks::where('completed', '=', 0)->where('taskId', '=', 6)->get();
      $taskLists = Task::where('projectId', '=', 1)->get();
      //echo $tasksList;
      $progressProject = [] ;
      $progressAll = 0 ;
      foreach ($taskLists as $tasksList){
      //echo $tasksList->id ;

        $tasks = Subtasks::where('taskId', '=', $tasksList->id )->get();
        $taskName =Task::find($tasksList->id )->nametask;
        //echo $tasks;
        $complete = 0 ;
        $waiting = 0 ;
        $progress = 0 ;
            foreach ($tasks as $task) {
              if ($task->completed == 0) {
                $waiting = $waiting +1 ;
              }elseif ($task->completed == 1){
                $complete= $complete +1 ;
              }
              }
        echo "Nametask: " . $taskName . "<br>" ;
        echo "complete ".$complete . "<br>" . "waiting ".$waiting . "<br>" ;

        //progress
        if ($complete != 0) {
            $progress =  ($complete / ($waiting+$complete)) * 100 ;
        }else{
            $progress = 0 ;
        }
        array_push($progressProject,$progress);
        echo "progress = " .$progress . "<br>". "<br>";

      }
      // for ($i=0; $i < count($progressProject) ; $i++) {
      //     $progressAll = $progressAll + $progressProject[$i] ;
      // }
      // $progressAll = array_sum($progressProject) / count($progressProject) ;
      // echo "progress in project = $progressAll" ;
      return view('dashboard', ['progressProject' => $progressProject]);
    }
}
