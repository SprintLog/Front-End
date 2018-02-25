<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = DB::table('projects')->get();
      return view('projectlist', ['projects' => $projects]);
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

            $validator = Validator::make($request->all(), [
                'tproject_name' => 'required|max:255',
                'eproject_name' => 'required|max:255',
                'type_project' => 'required|max:255',
                'advisors' => 'required|max:255',
                //'developer' => 'required|max:255',
                'abstract' => 'required|max:255',
                'keyword' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect('/projectinfo')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('warning', 'plz check input');
            }

            //dd($request);
            $project = new Project;
            $project->thai_name = $request->tproject_name;
            $project->eng_name = $request->eproject_name;
            $project->typeProjectId = $request->type_project;
            $project->advisorsId = $request->advisors;
            $project->developerId = 1;
            $project->abstack = $request->abstract;
            $project->keywords = $request->keyword;
            $project->userId = $request->userId;


            $project->save();
            return redirect('/projectinfo')->with('success', 'Addproject Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //

    }
    public function delete(Request $request)
    {
        //
        $id = $request->id;
        DB::table('projects')->where('id' , $id)->delete();

        return back();
    }
}
