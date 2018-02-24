@extends('layouts.templateList')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection

@section('script')
  <script></script>
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
<<<<<<< HEAD
        <!-- listProject from DB-->
        @foreach ($project as $project )
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <form class="delete"  action="{{ url('projectlist_delete') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <!-- Button trigger modal -->
                  <button type="submit" class="close" data-toggle="confirmation" >
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <input type="hidden" name="id" value="{{ $project -> id}}">
                </form>
                <h5 class="card-title">{{ $project -> eng_name}}</h5>
                <p class="card-text">{{ $project -> thai_name}}</p>
                <i class="fa fa-user"></i><br><br>
                <a href="#" class="btn btn-primary">View</a>
=======
        <div class="col-sm-6 col-md-6">
          <div class="thumbnail">
              <div class="caption">
                <h3>Name Project</h3>
                  <p>abstack</p>
                  <p>
                    <a href="#" class="btn btn-primary  " role="button">View</a> &nbsp;
                    <a href="#" class="btn btn-danger block" role="button">DEL</a>
                  </p>
>>>>>>> dev-Army
              </div>
          </div>
<<<<<<< HEAD
        @endforeach
        <script>
            $(".delete").on("submit", function(){
                return confirm("Do you want to delete this item?");
            });
        </script>
      </div><br>
      <a href="#" class="btn btn-primary">
=======
        </div>
      </div>
    </div>
      <a href="{{url('projectinfo')}}" class="btn btn-success">
>>>>>>> dev-Army
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
