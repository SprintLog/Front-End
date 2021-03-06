<?php
namespace App\Http\Controllers;
use App\Task;
use App\Project;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
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
            'nameTask' => 'required|max:255',
            'complexity' => 'required|max:255',
            'projectId' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'plz check input');
        }
      // dd($request);
      $task = new Task;
      $task->nametask   = $request->nameTask;
      $task->complexity = $request->complexity;
      $task->projectId  = $request->projectId;
      $task->save();

      $progress = new Progress;
      $progress->taskId   = $task->id;
      $progress->save();
      return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $globalsID=$id;
      $tasks = DB::table('tasks')->where('projectId','=',$id)->get();
      $projectName = Project::where('id' , $id)->first()->eng_name ;
      // dd($tasks);
    return view('addTask', ['tasks' => $tasks , 'projectName' => $projectName]);
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
    public function update(Request $request)
    {
      //
      $taskId = $request->id;
      $taskName =  $request->name;
      $complexity =  $request->complexity;

      Task::where('id', $taskId)
        ->update(['nametask' => $taskName , 'complexity' => $complexity ]);

      return back()->with('success', 'Update Task Success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $task = Task::find($id)->delete();
      $progress = Progress::where('taskId' , $id)->delete();
      return back();
    }
}
