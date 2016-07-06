<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @todo Add flash message when project is created.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'project_name'  => 'required|max:255',
        ]); 
        
        // create project in projects controller
        Project::create([
            'project_name'  => $request->input('project_name'),
        ]);
        
        // update pivot table 
        
        // redirect 
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @todo add flash messages for successful update
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $project = Project::find($id);

       if (!$project) {
         abort(404);
       }

       $project->project_name = $request->input('project_name');
       $project->save();

       return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @todo validation and use confirmation.
     * @todo perform delete via ajax request.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);

        return redirect('/');
    }
}
