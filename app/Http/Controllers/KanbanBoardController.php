<?php

namespace App\Http\Controllers;
use App\Subtasks;
use App\Project;
use App\Task;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //List to kanbanboard
        // $taskLists = Task::where('projectId', '=', $id)->get();
        $taskLists = DB::table('tasks')
            ->join('progresses', 'progresses.taskId', '=', 'tasks.id')
            ->select('tasks.*' ,'progresses.desc' , 'progresses.approved')
            ->where('projectId' ,$id )
            ->get();

        $todos = [] ;
        $doings = [] ;
        $dones = [] ;
        $taskId = [] ;
        $commentBody = [] ;
        $progressProject = [] ;
        $taskname = [];
        foreach ($taskLists as $tasksList){
          $tasks = Subtasks::where('taskId', '=', $tasksList->id )->get();
          // $comments = Comment::where('taskId', $tasksList->id)->get();
          //
          // if (sizeof($comments) !== 0 ) {
          //      foreach ($comments as $comment) {
          //        // echo $comment->taskId."<br>";
          //        // echo $comment->body."<br>";
          //        array_push ($taskId ,$comment->taskId);
          //        array_push ($commentBody ,$comment->body);
          //      }
          // }

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
          }elseif ($progress > 0  && $progress < 100 ) {
            array_push ($doings ,$taskName);
             // echo $taskName . " doing : " .$progress ."<br>";
          }else {
            array_push ($dones ,$taskName);
             // echo $taskName . " done : " .$progress ."<br>";
          }
          array_push($taskname,$tasksList->nametask);
          array_push($taskId,$tasksList->id);
          array_push($progressProject,$progress);
          // array_push($taskid,$progress);
        }
        $projectName = Project::where('id' , $id)->first()->eng_name ;
        // $comment =  Comment::where()

        return view('kanbanboard',
                                ['todos' => $todos ,
                                'doings'=> $doings ,
                                'dones' => $dones,
                                'projectName' =>$projectName,
                                'taskLists' => $taskLists,
                                'taskname'=> $taskname,
                                'taskId' => $taskId,
                                'progressProject' => $progressProject
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
