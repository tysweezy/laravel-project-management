<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use App\User;
use App\Project;
use App\Http\Requests;
use Illuminate\Http\Request;

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

        /* $user = Auth::user();
        $tasks = $user->tasks()->latest()->get();*/

        // show all projects for now.
          // will need to grab projects form associated user.
        $projects = Project::all();
 
        return view('home', ['projects' => $projects]);
    }
}
