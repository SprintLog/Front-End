<?php

namespace App\Http\Controllers;
use App\Subtasks;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
        //Maybe get request value projectId

        //********************Get sum result of rate TCF***********************
        $tcf = DB::table('tcfs')->select(DB::raw('SUM(result) as total_result'))->where('projectId', $id)->get();
        $total_resultTcf ;


        foreach ($tcf as $tcf) {
           $total_resultTcf = $tcf->total_result;
        }

        //Get sum result of rate ECF
        $ecf = DB::table('ecfs')->select(DB::raw('SUM(result) as total_result'))->where('projectId', $id)->get();
        $total_resultEcf ;
        foreach ($ecf as $ecf) {
           $total_resultEcf = $ecf->total_result;
        }

        //*********************************calculate UUCP**********************
        //get simple task

        $simple = DB::table('tasks')->where('complexity', 1)->where('projectId', $id)->count();
      //echo 'simple tasks = '.$simple.'<br>';

        $middle = DB::table('tasks')->where('complexity', 2)->where('projectId', $id)->count();
        //echo 'middle tasks = '.$middle.'<br>';

        $complex = DB::table('tasks')->where('complexity', 3)->where('projectId', $id)->count();
        //echo 'complex tasks = '.$complex.'<br>';

        $UUCP = ($simple * 5) + ($middle * 10) +  ($complex * 15);

        //Calculate UUCP
        $TCF = 0.6 + ($total_resultTcf / 100 ) ;
        $ECF = 1.4 + (-0.03 * $total_resultEcf) ;
        $UCP = $UUCP * $TCF *$ECF ;
        //$HUCP = 405/$UCP ;

        $HUCP = number_format(405/$UCP, 2, '.', ' ');
        /*
        echo "UCP = UUCP * TCF * ECF". "<br>";
        echo "UCP = " . $UUCP . " * " . $TCF . " * " . $ECF. "<br>" ;
        echo "UCP = " . $UUCP * $TCF *$ECF . "<br>";
        echo "Hours/UCP = " . 405/$UCP . " UUCP" ;
        */


        //********************* Calculate Progress****************************
        $taskLists = Task::where('projectId', '=', $id)->get();
        $progressProject = [] ;
        $taskNameList = [] ;
        $progressAll = 0 ;
        $UUCPWMade = [];
        $UUCPW ;
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
              if($tasksList->complexity == 1 ){
                $UUCP = ($progress / 100) * 5  ;
                array_push ($UUCPWMade ,$UUCP) ;
              }elseif ($tasksList->complexity == 2 ) {
                $UUCP = ($progress / 100) * 10  ;
                array_push ($UUCPWMade ,$UUCP) ;
              }else {
                $UUCP = ($progress / 100) * 15 ;
                array_push ($UUCPWMade ,$UUCP) ;
              }

          }else{
              $UUCP = ($progress / 100) * 0  ;
              array_push ($UUCPWMade ,$UUCP);
          }



          //*****************push value for view***********************
           array_push($taskNameList,$taskName);
           array_push($progressProject,$progress);


           // check todo list
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
        }
          // UCP ที่ทำได้
          $UCPMade = array_sum($UUCPWMade) * $TCF *$ECF  ;

          //คิด % งานทั้งหมดทีทำได้
          $projectComplete = ($UCPMade / $UCP) * 100  ;

          //หาเวลาที่ใช้ในการทำโปรเจ็ค (นับตั้งแต่วันที่สร้างโปรเจ็ต)
          $projectStart = Project::find($id)->created_at;
          $interval = $projectStart->diffInDays();

          //คิดค่า UCP ที่ควรจะทำได้ในตอนนี้
          $UCPBeLike =  ($UCP / (15*7)) * $interval ;

          
        return view('dashboard',
                                ['TCF' => $TCF ,
                                'ECF'=> $ECF ,
                                'UCP' => $UCP ,
                                'HUCP' => $HUCP ,
                                'tasks' =>$taskLists,
                                'taskNameList'=> $taskNameList ,
                                'progressProject'=> $progressProject ,
                                'projectComplete'=>$projectComplete,
                                'todos' => $todos,
                                'doings' => $doings,
                                'dones' => $dones,
                                'UCPBeLike' => $UCPBeLike,
                                'UCPMade' => $UCPMade

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
