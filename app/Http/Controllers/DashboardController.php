<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //$HUCP = 405/$UCP ;

        $HUCP = number_format(405/$UCP, 2, '.', ' ');
        /*
        echo "UCP = UUCP * TCF * ECF". "<br>";
        echo "UCP = " . $UUCP . " * " . $TCF . " * " . $ECF. "<br>" ;
        echo "UCP = " . $UUCP * $TCF *$ECF . "<br>";
        echo "Hours/UCP = " . 405/$UCP . " UUCP" ;
        */

        $tasks = DB::table('tasks')->get();


        return view('dashboard', ['TCF' => $TCF , 'ECF'=> $ECF , 'UCP' => $UCP , 'HUCP' => $HUCP ,'tasks' =>$tasks]);
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