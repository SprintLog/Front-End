@extends('layouts.template')
@section('style')
@endsection

@section('script')
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  {{--For Form delect--}}
  <form id="form-delete" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
  </form>
  <script type="text/javascript">
    function confirmDelete(msg, url, action) {
        if (confirm(msg)) {
            if(action == 'restore'){
                window.location.href = url;
            }else{
                var element = document.getElementById('form-delete');
                element.action = url;
                element.submit();
            }
            // $('form#form-delete').attr('action', url);
            // $('form#form-delete').submit();
        } else {
            alert('Canceled');
        }
    }
  </script>
@endsection

@section('content')
  <div class="jumbotron far">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$projectName}}</li>
      </ol>
    </nav>
      <div class="row">
         <div class="col-sm-offset-2 col-sm-8">
           <div class="panel panel-info">
             <div class="panel-heading">
                    New Task
              </div>
              <div class="panel-body">
                      <!-- New Task Form -->
                <form action="{{ url('/task' )}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="nameTask" id="task-name" class="form-control" value="{{ old('task') }}">
                        </div>
                       <div class="row">
                        <div class="col-sm-4">
                          <select class="form-control" name='complexity'>
                            <option data-tokens="" value=1>Simple</option>
                            <option data-tokens="" value=2>Medium</option>
                            <option data-tokens="" value=3>Complex</option>
                          </select>
                        </div>
                      </div>

                        <input type="hidden" name="projectId"
                        value="{{Cache::get('key')}}">
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add
                            </button>
                        </div>
                    </div>
                </form>
              </div>
           </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <!-- Current Tasks -->
          @if (count($tasks) > 0)
              <div class="panel panel-info">
                  <div class="panel-heading">
                      Current Tasks
                  </div>

                  <div class="panel-body">
                      <table class="table table-striped task-table">
                          <thead>
                              <th>Task Name</th>
                              <th>Complexity</th>
                              <th>&nbsp;</th>
                          </thead>
                          <tbody>
                              @foreach ($tasks as $tasks)
                                  <tr>
                                      <td class="table-text">
                                          <div>
                                            <a href="/subTask/{{$tasks->id}}"><div>{{ $tasks->nametask }}</div></a>
                                          </div>
                                      </td>

                                      <td class="table-text">
                                        <div>
                                          @if($tasks->complexity == 1)
                                            Simple
                                          @elseif ($tasks->complexity == 2)
                                            Medium
                                          @else
                                            Complex
                                          @endif
                                        </div>
                                      </td>
                                      <!-- Task Delete Button -->
                                      <td>
                                              <a href="#!delete"
                                              onclick=
                                                "confirmDelete('Are you sure to delete ?',
                                                '{{  url('task/'.$tasks->id) }}',
                                                'delete');"
                                                class="btn btn-danger">
                                              Delete</a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          @endif
        </div>
      </div>
  </div>
@endsection
