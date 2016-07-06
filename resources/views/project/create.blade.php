@extends('layouts.app')

@section('content')
  <h1>Create Project</h1>

  <form action="{{ url('/project/create') }}" method="post">

	{{ csrf_field() }}

  	<div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
  		<label for="project_name">Project Name</label>
		<input type="text" name="project_name" class="form-control" placeholder="Enter Project Name">


         @if ($errors->has('project_name'))
         	<span class="help-block">
                <strong>{{ $errors->first('project_name') }}</strong>
           </span>
        @endif
  	</div>

  	<div class="form-group">
  		<button type="submit" class="btn btn-primary">Create Project</button>
  	</div>
  </form>
@endsection