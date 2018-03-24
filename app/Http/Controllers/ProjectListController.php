<?php

namespace App\Http\Controllers;

use App\Project;
use App\Match;
use App\User;
use App\Ecf;
use App\Tcf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectListController extends Controller
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

        $TypeProject = DB::table('type_project')->get();

        $userStd  = DB::table("users")
        ->select('id','name','lastname')
        ->where('typeUser','=',0)
        ->get();

        $userLetureShow = DB::table("users")
        ->select('id','name','lastname')
        ->where('typeUser','=',1)
        ->get();



        $TypeProjectShow = DB::table('type_project')->get();

        return view('projectInfoRegis',compact('userLetureShow',
                                                'userStd',
                                                'TypeProject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           // dd($request);
        $validator = Validator::make($request->all(), [
            't_project_name' => 'required|nullable|string|max:25',
            'e_project_name' => 'required|nullable|string|max:25',
            'type_project'   => 'required|nullable|string',
            'advisorsId'       => 'required|nullable|string|max:25',
            'developer.*'    => 'required|nullable|string',
            'abstract'       => 'required|nullable|string|max:255',
            'keyword'        => 'required|nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('projectlist/create')
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'plz check input');
        }

        // dd($request); 2 3 16
        $project  =   new Project;
        $project->thai_name     = $request->t_project_name;
        $project->eng_name      = $request->e_project_name;
        $project->typeProjectId = $request->type_project;
        $project->abstack       = $request->abstract;
        $project->keywords      = $request->keyword;

        $project->save();

        // NAME CONVENT TO ID
        $devId =  array();
        for ($i=0; $i < count($request->developer); $i++) {
         $devId[$i] =  DB::table("users")
         ->where('name','LIKE','%'.$request->developer[$i].'%')->pluck('id')->first();
        }
        $devId[] =  $request->usermakePJ;
        $devId[] =  $request->advisorsId;
        // dd($devId);
        for ($i=0; $i < count($devId); $i++) {
          $m = new Match;
          $m->userId    = $devId[$i];
          $m->projectId = $project->id;
          $m->save();
        }


        //  INSERT FACTER
       $pid = $project->id;
       $array_topic = array(
                "Familiar with the development process",
                "Application experience",
                "Object-oriented experience",
                "Lead analyst capability",
                "Motivation",
                "Stable requirements",
                "Part-time staff",
                "Difficult programming language"
           );
      $array_weight =  array(5,2,1,2,2,5,4,3);

       for ($i=0; $i < 7 ; $i++) {
          $ecf = new Ecf;
          $ecf->topic    = $array_topic[$i];
          $ecf->des      = "คำอธิบาย";
          $ecf->weight   = $array_weight[$i];
          $ecf->rate     =  0;
          $ecf->result   =  0;
          $ecf->projectId=  $pid;
          $ecf->save();
       }



        return redirect('/home');
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
