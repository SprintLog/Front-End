<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $project = DB::table("projects")->select('*')
             ->whereIn('id',function($query) {
                $query->select('ProjectId')
                ->from('matches')
                ->where('UserId',Auth::user()->id);
             })
       ->get();

       return view('projectlist', ['project' => $project]);
    }

}
