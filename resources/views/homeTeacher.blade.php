@extends('layouts.templateList')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection
@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">

      @foreach ($project as $project )
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <div class="caption">
                  <h3>{{$project->eng_name}} &nbsp; {{$project->thai_name}}</h3>
                    <p>{{$project->abstack}}</p>
                    <p>
                      <a href="{{ url('/homeTeacher', $project->id) }}"
                        class="btn btn-primary btn-lg "
                        role="button">View
                      </a> &nbsp;



                    </p>
                </div>
            </div>
        </div>
      @endforeach


@endsection
