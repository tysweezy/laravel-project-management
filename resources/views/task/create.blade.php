@extends('layouts.app')

@section('content')
	<h1>Create new task</h1>

	<form action="{{ url('/task/create') }}" method="post">

		{{ csrf_field() }}


		<div class="form-group">
			<label for="title">Task Name</label>
			<input type="text" name="title" class="form-control">
		</div>


	    <div class="form-group">
			<label for="description">Description</label>
			<input type="text" name="description" class="form-control">
		</div>


		<div class="form-group">
			<button type="submit">Create Task</button>
		</div>

	</form>
@stop