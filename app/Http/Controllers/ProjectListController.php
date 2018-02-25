<?php

namespace App\Http\Controllers;

use App\Project;
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
          return view('projectInfoRegis');
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
            't_project_name' => 'required|max:255',
            'e_project_name' => 'required|max:255',
            'type_project' => 'required|max:255',
            'advisors' => 'required|max:255',
            //'developer' => 'required|max:255',
            'abstract' => 'required|max:255',
            'keyword' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('projectcreate/create')
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'plz check input');
        }

        //dd($request);
        $project = new Project;
        $project->thai_name = $request->t_project_name;
        $project->eng_name = $request->e_project_name;
        $project->typeProjectId = $request->type_project;
        $project->advisorsId = $request->advisors;
        $project->developerId = 1;
        $project->abstack = $request->abstract;
        $project->keywords = $request->keyword;
        $project->userId = $request->userId;


        $project->save();
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
