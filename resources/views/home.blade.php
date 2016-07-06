@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Projects</div>

                <div class="panel-body">
                    <ul>
                        @foreach($projects as $project)
                            <li>

                                <a href="{{ route('show-project', $project->id) }}">{{ $project->project_name }}</a>

                                <span><em>Created by: Bob Smith</em></span>


                              <div class="project-buttons pull-right">

                                <span><a href="{{ route('edit-project', $project->id) }}" class="btn btn-warning btn-xs">Edit</a></span>
                                <span><a href="{{ route('delete-project', $project->id) }}" class="btn btn-danger btn-xs">Delete</a></span>
                              </div>
                            </li>

                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
