<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
{

	public function __construct()
	{
		return $this->middleware('auth');
	}

    /**
     * Create new task form (view).
     * 
     * @return response
     */
    public function create()
    {
    	// returns view of task form
    	return view('task.create');
    }

    /**
     *  Store task to the database
     *  
     * @param  Request $request 
     * @return response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title'       => 'required|max:255',
    		'description' => 'required'
    	]);
    	
    	Task::create([
    		'title'        => $request->input('title'),
    		'description'  => $request->input('description'),
    		'user_id'      => Auth::user()->id,
    	]);


    	return redirect('/');
    }

    /** 
     * Shoe specific task
     * 
     * @param  int $id 
     * @return response
     */
    public function show($id) 
    {
        $task = Task::find($id);

        return view('task.show', ['task' => $task]);
    }

    /** 
     * Edit task form view
     * 
     * @param  int $id
     * @return response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update task in DB via POST Request
     *
     * @todo add flash message when successfully updated
     * @todo validate
     * @param  Request $request int $id 
     * @return response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->title = $request->input('title');
        $task->description = $request->input('description');

        $task->save();

        return redirect('/');
    }

    /** 
     * Delete Task record in the DB
     * 
     * @param  int $id
     * @return response
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('/');
    }
}
