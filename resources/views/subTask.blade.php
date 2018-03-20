@extends('layouts.template')
@section('style')

@endsection

@section('script')
@endsection

@section('content')
  @if (session('success'))
    <div class="alert alert-success">
      <p><h4>{{session('success')}}</h4></p>
    </div>
  @endif
  @if (session('warning'))
    <div class="alert alert-warning">
      <p><h4>{{session('warning')}}</h4></p>
    </div>
  @endif
  <div class="panel panel-default">
  <div class="panel-heading">
      New Sub-Task
  </div>
  <div class="panel-body">
      <!-- New Task Form -->
      <form data-toggle="validator" action="/subTask/create" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} ">
              <label>Name Sub-Task</label>
              <input class="form-control" name = "name" class="form-control" type="text" placeholder="Default input" required>
              <div class="help-block with-errors"></div>
              <div class="invalid-feedback">
                Please choose a Sub-Task.
              </div>
          </div>
          <div class="form-group {{ $errors->has('desc') ? ' has-error' : '' }}  ">
            <label>Description</label>
            <textarea class="form-control" name ="desc" rows="3" placeholder="description" required ></textarea>
            <div class="help-block with-errors"></div>
            <div class="invalid-feedback">
              Please description your sub-task.
            </div>
          </div>
            <input type="hidden" name="taskId" value="{{$taskId}}">
            <button type="submit" class = "btn btn-primary pull-right">Add Sub-Task</button>
      </form>
  </div>
  </div>
    <div class="jumbotron far">
      <div class="row fart">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Desc</th>
              <th scope="col">Date Summit</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($subtasks as $subtask)
            <tr>
              <th scope="row">{{$subtask->name}}</th>
              <td>{{$subtask->desc}}</td>
              <td>{{$subtask->updated_at}}</td>
              <td>
              <form action="{{ url('subTask/completed/'.$subtask->id)}}" method="GET" class="form-horizontal">
                    {{ csrf_field() }}

                @if ($subtask->completed == false)
                  <button type="submit" class = "btn btn-btn btn-warning">
                  Pending
                  </button>
                @else
                  <button type="submit" class = "btn btn-success">
                  Complete
                  </button>
                @endif

            </td>
            </tr>
              </form>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection
