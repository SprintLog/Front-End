@extends('layouts.templateList')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection

@section('script')
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
      User Project List
      <!-- listProject Exam data -->
      <br><hr style="width: 100%; color: black; height: 1px; background-color:black;" />
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="thumbnail">
              <div class="caption">
                <h3>ชื่อโปรเจคไทย &nbsp; Name Project</h3>
                  <p>คำอธิบาย</p>
                  <p>
                    <a href="#" class="btn btn-primary  " role="button">View</a> &nbsp;
                    <a href="#" class="btn btn-danger block" role="button">DEL</a>
                  </p>
              </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="thumbnail">
              <div class="caption">
                <h3>Name Project</h3>
                  <p>abstack</p>
                  <p>
                    <a href="#" class="btn btn-primary  " role="button">View</a> &nbsp;
                    <a href="#" class="btn btn-danger block" role="button">DEL</a>
                  </p>
              </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="thumbnail">
              <div class="caption">
                <h3>Name Project</h3>
                  <p>abstack</p>
                  <p>
                    <a href="#" class="btn btn-primary  " role="button">View</a> &nbsp;
                    <a href="#" class="btn btn-danger block" role="button">DEL</a>
                  </p>
              </div>
          </div>
        </div>
      </div>
    </div>
      <a href="{{url('projectInfoRegis')}}" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Create New Project
      </a>
    </div>
  </div>
@endsection
      <!-- listProject from DB-->
      @foreach ($project as $project )
        <div class="col-sm-6 col-md-6">
          <div class="thumbnail">
              <div class="caption">
                <h3>Name Project &nbsp; ชื่อไทย</h3>
                  <p>abstack</p>
                  <p>
                    <a href="#" class="btn btn-primary  " role="button">View</a> &nbsp;
                    <a href="#" class="btn btn-danger block" role="button">DEL</a>
                  </p>
              </div>
          </div>
        </div>
      @endforeach
