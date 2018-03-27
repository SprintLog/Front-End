<?php

namespace App\Http\Controllers;
use App\Subtasks;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KanbanBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $taskLists = Task::where('projectId', '=', $id)->get();
        $todos = [] ;
        $doings = [] ;
        $dones = [] ;
        foreach ($taskLists as $tasksList){
          $tasks = Subtasks::where('taskId', '=', $tasksList->id )->get();
          $taskName =Task::find($tasksList->id )->nametask;
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

          //progress ที่ทำได้
          if ($complete != 0) {
              $progress =  ($complete / ($waiting+$complete)) * 100 ;
          }else{
              $progress = ($progress / 100) * 0  ;
          }

          //echo $taskName . " : " .$progress ."<br>";
          if($progress == 0 ){
            array_push ($todos ,$taskName);
            // echo $taskName . " todo : " .$progress ."<br>";
          }elseif ($progress > 0 && $progress < 100 ) {
            array_push ($doings ,$taskName);
            // echo $taskName . " doing : " .$progress ."<br>";
          }else {
            array_push ($dones ,$taskName);
            // echo $taskName . " done : " .$progress ."<br>";
          }

        }
        $projectName = Project::where('id' , $id)->first()->eng_name ;
        return view('kanbanboard',
                                ['todos' => $todos ,
                                'doings'=> $doings ,
                                'dones' => $dones,
                                'projectName' =>$projectName
                              ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
