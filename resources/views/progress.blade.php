@extends('layouts.template')
@section('style')

@endsection

@section('script')
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@endsection

@section('content')

<style>
.btn{

  width: 100px;
}
</style>
  <div class="jumbotron far">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/homeTeacher">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$projectName}}</li>
      </ol>
    </nav>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Task</th>
            <th scope="col">Date Submit</th>
            <th scope="col">Task Status</th>
            <th scope="col">Check By Teacher</th>
            <th scope="col">CheckTask</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tasks as $task)
          <tr>
            {{-- <th scope="column">3</th> --}}
            <td><a href="/subTask/teacher/{{$task->id}}"><div>{{ $task->nametask }}</div></a></td>
            {{-- <td>{{$task->nametask}}</td> --}}
            <td>{{$task->created_at}}</td>
            <td>
              @for ($i=0; $i < sizeof($taskname); $i++)
              @if ($task->nametask == $taskname[$i] && $task->id == $taskId[$i])
                @if ($progressProject[$i] == 100 )
                  <button type="button " name="button" class="btn btn-success">Complete</button>
                  <td>
                  @if ($task->approved == 0 )
                     <button type="button " name="button" class="btn btn-warning">Not approved</button>
                  @elseif ($task->approved == 1)
                      <button type="button " name="button" class="btn btn-danger">Reject</button>
                  @else
                     <button type="button " name="button" class="btn btn-success">Approved</button>
                  @endif
                </td>
                </td>
                <td>
                  <button type="button " name="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-name="{{$taskname[$i]}}" data-id="{{$task->id}}" data-desc="{{$task->desc}}">Check</button>
                </td>
                </tr>
                @else
                  <button type="button " name="button" class="btn btn-warning">Waiting</button>
                  <td>
                  </td>
                </td>
                <td>
                  <button type="button " name="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal1">Check</button>
                </td>
                </tr>
                @endif
              @endif
            @endfor
            {{-- </td>
          <td><button type="button " name="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">Check</button>
        </tr> --}}
        @endforeach
          </tbody>
      </table>




    </div>
  </div>
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('progress/approve') }}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label for="message-text" class="col-form-label">Describe By : Advisor </label>
              <textarea class="form-control" name="desc" id="desc-text"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name ="id" id="task-id" >
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="repair_button" class="btn btn-danger" value = "repair">Repair</button>
          {{-- <form action="{{ url('progress/approve') }}" method="POST"> --}}
            <input type="hidden" name ="id" id="task-id2" >
              {{-- {{ csrf_field() }} --}}
            <button type="submit" name="approve_button" class="btn btn-success" value = "approve">Approve</button>
          {{-- </form> --}}
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
        modal.find('#task-id').val(id)
        modal.find('#task-id2').val(id)
        modal.find('#desc-text').val(desc)
        modal.find('.modal-title').text("Do you want to approve this task?")
      })
      </script>
@endsection
