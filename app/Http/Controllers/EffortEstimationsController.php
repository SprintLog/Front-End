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
      return view('estimage', ['tcf' => $tcf , 'ecf' => $ecf]);
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
}
