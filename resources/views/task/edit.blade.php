@extends('layouts.app')

@section('content')

  <h1>Edit Task</h1>

  <form action="{{ route('update-task', $task->id) }}" method="post">

	{{ csrf_field() }}

	<div class="form-group">
		<label for="title">Update Title</label>
		<input type="text" name="title" class="form-control" value="{{ $task->title }}">
	</div>

	<div class="form-group">
		<label for="description">Update Description</label>  
		<input type="text" name="description" class="form-control" value="{{ $task->description }}">
	</div>

	<div class="form-group">
		<button type="submit">Update Task</button>
	</div>
  </form>

@endsection