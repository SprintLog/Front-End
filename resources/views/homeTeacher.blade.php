@extends('layouts.templateList')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection

@section('script')

@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
      @foreach ($project as $project )
        <div class="col-sm-6 col-md-6">

            <div class="panel panel-info">
                   <div class="panel-heading ">
                      {{$project->eng_name}}   &nbsp;({{$project->thai_name}})



                      <a href="{{ url('/projectTeacher', $project->id) }}"
                        class="btn btn-primary  pull-right "
                        role="button">View
                      </a> &nbsp;
                   </div>
                   <div class="panel-body">
                       {{$project->abstack}}
                   </div>

                </div>
             </div>
      @endforeach


@endsection
