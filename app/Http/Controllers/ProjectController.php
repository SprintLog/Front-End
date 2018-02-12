<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
    public function insert(Request $request)
    {
        //
        /*
            $validator = Validator::make($request->all(), [
                'tproject_name' => 'required|max:255',
                'eproject_name' => 'required|max:255',
                'type_project' => 'required|max:255',
                'advisors' => 'required|max:255',
                'developer' => 'required|max:255',
                'abstract' => 'required|max:255',
                'keyword' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }
*/
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
            return redirect('/projectinfo');
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
}
