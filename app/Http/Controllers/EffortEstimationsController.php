<?php

namespace App\Http\Controllers;

use App\Tcf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class EffortEstimationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tcf = DB::table('tcfs')->get();
      $ecf = DB::table('ecfs')->get();
      $tasks = DB::table('tasks')->get();
      return view('estimage', ['tcf' => $tcf , 'ecf' => $ecf , 'tasks' => $tasks]);
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
     * @param  \App\Tcf  $tcf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tcf  $tcf
     * @return \Illuminate\Http\Response
     */
    public function edit(Tcf $tcf)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tcf  $tcf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

    }
    public function updateAll(Request $request)
    {
      //data Tcf
       $rateTcf = $request->rateTcf;
       $topicTcf = $request->topicTcf;
       $projectId = $request->projectId;
       $weightTcf = $request->weightTcf;

      //data Ecf
       $rateEcf = $request->rateEcf;
       $topicEcf = $request->topicEcf;
       $weightEcf = $request->weightEcf;

       //update Table TCf
       for ($i=0; $i < sizeof($rateTcf); $i++){
            $result = $weightTcf[$i] * $rateTcf[$i] ;

           DB::table('tcfs')
           ->where('topic', $topicTcf[$i])
           ->Where('projectId',$projectId)
           ->update(['rate' => $rateTcf[$i] ,'result' => $result] );
         }
      //update Table Ecf
       for ($i=0; $i < sizeof($rateEcf); $i++){
            $result = $weightEcf[$i] * $rateEcf[$i] ;

             DB::table('ecfs')
             ->where('topic', $topicEcf[$i])
             ->Where('projectId',$projectId)
             ->update(['rate' => $rateEcf[$i] ,'result' => $result] );
           }

         return back()->with('success', 'Update Success');;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tcf  $tcf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tcf $tcf)
    {
        //
    }

    public function calculateUCP(Request $request)
        {
            //Maybe get request value projectId

            //Get sum result of rate TCF
            $tcf = DB::table('tcfs')->select(DB::raw('SUM(result) as total_result'))->where('projectId', 1)->get();
            $total_resultTcf ;


            foreach ($tcf as $tcf) {
               $total_resultTcf = $tcf->total_result;
            }

            //Get sum result of rate ECF
            $ecf = DB::table('ecfs')->select(DB::raw('SUM(result) as total_result'))->where('projectId', 1)->get();
            $total_resultEcf ;
            foreach ($ecf as $ecf) {
               $total_resultEcf = $ecf->total_result;
            }

            //calculate UUCP
            //get simple task

            $simple = DB::table('tasks')->where('complexity', 1)->where('projectId', 3)->count();
          //echo 'simple tasks = '.$simple.'<br>';

            $middle = DB::table('tasks')->where('complexity', 2)->where('projectId', 3)->count();
            //echo 'middle tasks = '.$middle.'<br>';

            $complex = DB::table('tasks')->where('complexity', 3)->where('projectId', 3)->count();
            //echo 'complex tasks = '.$complex.'<br>';

            $UUCP = ($simple * 5) + ($middle * 10) +  ($complex * 15);

            //Calculate UUCP
            $TCF = 0.6 + ($total_resultTcf / 100 ) ;
            $ECF = 1.4 + (-0.03 * $total_resultEcf) ;
            $UCP = $UUCP * $TCF *$ECF ;
            $HUCP = 405/$UCP ;
            /*
            echo "UCP = UUCP * TCF * ECF". "<br>";
            echo "UCP = " . $UUCP . " * " . $TCF . " * " . $ECF. "<br>" ;
            echo "UCP = " . $UUCP * $TCF *$ECF . "<br>";
            echo "Hours/UCP = " . 405/$UCP . " UUCP" ;
            */
            return view('dashboard', ['UCP' => $UCP , 'HUCP' => $HUCP]);
        }
}
