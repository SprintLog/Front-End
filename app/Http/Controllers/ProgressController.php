<?php

namespace App\Http\Controllers;
use App\Subtasks;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index($id)
    public function index()
    {
      //$globalsID=$id;
      /*$tasks = DB::table('tasks')->where('projectId','=',$id)->get();
      // dd($tasks);
      return view('progress', ['tasks' => $tasks]);*/
        //$viewtask = tasks::all()
        // return view ('progress');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tasks = DB::table('tasks')
            ->join('progresses', 'progresses.taskId', '=', 'tasks.id')
            ->select('tasks.*' ,'progresses.desc' , 'progresses.approved')
            ->where('projectId' ,$id )
            ->get();
        $projectName = DB::table('projects')->where('id' , $id)->first()->eng_name;
        $taskLists = Task::where('projectId', '=', $id)->get();
        $progressProject = [] ;
        $taskname = [];
        $taskId = [] ;
        foreach ($taskLists as $taskList){
            $subtasks = Subtasks::where('taskId', '=', $taskList->id )->get();
            $complete = 0 ;
            $waiting = 0 ;
            $progress = 0 ;
            foreach ($subtasks as $subtask) {
              if ($subtask->completed == 0) {
                $waiting = $waiting +1 ;
              }elseif ($subtask->completed == 1){
                $complete= $complete +1 ;
              }
            }

            if ($complete != 0) {
                $progress =  ($complete / ($waiting+$complete)) * 100 ;

            }else{
                $progress = ($progress / 100) * 0  ;
            }


            // echo $taskList->nametask ."<br>";
            // echo $progress."<br>";
            array_push($taskname,$taskList->nametask );
            array_push($taskId,$taskList->id);
            array_push($progressProject,$progress);
            // print_r($taskname);
        }

            // print_r($taskname)."<br>";

        return view ('progress' , ['tasks' =>$tasks,
                                   'projectName' => $projectName,
                                   'taskname'=> $taskname,
                                   'taskId' => $taskId,
                                   'progressProject' => $progressProject
                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }
}
