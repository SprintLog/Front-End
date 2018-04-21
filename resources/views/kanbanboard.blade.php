@extends('layouts.template')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@section('script')
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$projectName}}</li>
      </ol>
    </nav>
    <div class="container-fluid" style="min-width: 1050px;">
            <div id="sortableKanbanBoards" class="row">
                <div class="col-md-10 col-md-offset-0">
                    <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">
                        TODO
                    </div>
                    <div class="panel-body" style="max-height: 401px;">
                        <div id="TODO" class="kanban-centered">
                          @foreach ($todos as $todo)
                            <article class="kanban-entry grab" draggable="true">
                              <div class="kanban-entry-inner">
                              <div class="kanban-label">
                                <h2>{{$todo}}</h2>
                              </div>
                            </div>
                            </article>
                          @endforeach
                        {{-- <article class="kanban-entry grab" id="item0" draggable="true">
                          <div class="kanban-entry-inner">
                          <div class="kanban-label">
                            <h2>qwdq</h2>
                          </div>
                        </div>
                        </article>
                        <article class="kanban-entry grab" id="item1" draggable="true">
                            <div class="kanban-entry-inner">
                            <div class="kanban-label"><h2>wdq</h2>
                            </div>
                          </div>
                        </article>
                        <article class="kanban-entry grab" id="item2" draggable="true">
                              <div class="kanban-entry-inner"><div class="kanban-label">
                                <h2>wdqqeqe</h2></div>
                              </div>
                        </article>
                        <article class="kanban-entry grab" id="item3" draggable="true">
                                <div class="kanban-entry-inner">
                                <div class="kanban-label">
                                  <h2>wqe</h2>
                                </div>
                              </div>
                      </article> --}}

                          </div>
                    </div>
                </div>
                <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">
                        DOING
                    </div>
                    <div class="panel-body" style="max-height: 401px;">
                        <div id="DOING" class="kanban-centered">
                          @foreach ($doings as $doing)
                            <article class="kanban-entry grab" draggable="true">
                              <div class="kanban-entry-inner">
                              <div class="kanban-label">
                                <h2>{{$doing}}</h2>
                              </div>
                            </div>
                            </article>
                          @endforeach
                          {{-- <article class="kanban-entry grab" id="item3" draggable="true">
                                  <div class="kanban-entry-inner">
                                  <div class="kanban-label">
                                    <h2>wqe</h2>
                                  </div>
                                </div>
                        </article> --}}
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">
                        DONE
                    </div>
                    <div class="panel-body" style="max-height: 401px;">
                        <div id="DONE" class="kanban-centered">

                          @foreach ($dones as $done)
                            <article class="kanban-entry grab" draggable="true">
                              <div class="kanban-entry-inner">
                              <div class="kanban-label">
                                <h2>{{$done}}</h2>
                              </div>
                            </div>
                            </article>
                          @endforeach
                          {{-- <article class="kanban-entry grab" id="item3" draggable="true">
                                  <div class="kanban-entry-inner">
                                  <div class="kanban-label">
                                    <h2>wqe</h2>
                                  </div>
                                </div>
                        </article> --}}
                        </div>
                    </div>
                </div>
                    <div class="col-md-2">
                        {{-- <button id="btn-add-task" class="btn btn-primary">Add Task</button> --}}
                    </div>
                </div>
            </div>
            </div>

  <div class="jumbotron far">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Complexity</th>
        <th scope="col">Task Status</th>
        <th scope="col">Check By Teacher</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($taskLists as $taskList)
      <tr>
        <th scope="row">{{$taskList->nametask}}</th>
        <td>
          @if($taskList->complexity == 1)
            Simple
          @elseif ($taskList->complexity == 2)
            Medium
          @else
            Complex
          @endif
        </td>
        <td>
          @for ($i=0; $i < sizeof($taskname); $i++)
          @if ($taskList->nametask == $taskname[$i] && $taskList->id == $taskId[$i])
            @if ($progressProject[$i] == 100 )
              <button type="button " name="button" class="btn btn-success">Complete</button>
              <td>
              @if ($taskList->approved == 0 )
                 <button type="button " name="button" class="btn btn-warning">Not approved</button>
               @elseif ($taskList->approved == 1)
                  <button type="button " name="button" class="btn btn-danger">Reject</button>
               @else
                 <button type="button " name="button" class="btn btn-success">Approved</button>
              @endif
            </td>
            @else
              <button type="button " name="button" class="btn btn-warning">Waiting</button>
              <td>
              </td>
            @endif
          @endif
          @endfor
        </td>
       <td>
         <button type="button" class="btn btn-info"
         data-toggle="modal"
         data-id="{{$taskList->id}}"
         data-name="{{$taskList->nametask}}"
         data-desc="{{$taskList->desc}}"
         data-target="#exampleModal">
           Comment
         </button>
       </td>
      </tr>

      @endforeach


    </tbody>
  </table>

</div>

  <!-- Modal for look comment -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Comment in task by : Advisor </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('subTask/update') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Sub-Task Name:</label>
               <input type="hidden" name ="id" id="task-id" >
              <input type="text" class="form-control" name="name" id="task-name" readonly>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Comment By : Advisor </label>
              <textarea class="form-control" name="desc" id="desc-text" readonly></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- script ajax for show data to modal  --}}
  <script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name')
    var id = button.data('id')
    var desc = button.data('desc')
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Task ID : ' + id)
    modal.find('#task-id').val(id)
    modal.find('#task-name').val(name)
    modal.find('#desc-text').val(desc)
  })
    </script>



@endsection

{{--  --}}

{{--   ADD LIST
  <form id="frmAddList" class="form-add-list">
  Add List:
    <input type="text" autocomplete="off" name="list_name" id="" value="" placeholder="List name" />
  </form>
--}}
