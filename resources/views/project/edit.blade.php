@extends('layouts.app')

@section('content')

	<h1>Edit Project/Project Settings</h1>

	<form action="{{ route('update-project', $project->id) }}" method="post">
    
		{{ csrf_field() }}

	  	<div class="form-group">
	  		<label for="project_name">Project Name</label>
			<input type="text" name="project_name" class="form-control" placeholder="Edit Project Name" value="{{ $project->project_name }}">
	  	</div>

	  	<div class="form-group">
	  		<button type="submit" class="btn btn-primary">Update Project</button>
	  	</div>
	</form>
@endsection