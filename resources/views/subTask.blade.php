@extends('layouts.template')
@section('style')

@endsection

@section('script')
  {{-- <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> --}}

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

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
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/task/{{$projectId}}">Tasks</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$taskName}}</li>
    </ol>
  </nav>
  <div class="panel-heading">
      New Sub-Task
  </div>
  <div class="panel-body">
      <!-- New Sub-Task Form -->
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

  <div class="panel panel-default">
    <div class="panel-body">
          <form  action="/upload/image" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="row">
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <span>Image</span>
              <span class="btn btn-default btn-file">
                <input type="file" class = "form-control" name = "image">
                <input type="hidden" name = "projectId" value="{{$projectId}}">
                <input type="hidden" name = "taskId" value="{{$taskId}}">
              </span>
              <span class="fileinput-filename"></span>
            </div>
          <div class = "form-gruop">
              <input type="submit" class = "btn btn-success pull-right" value ="Upload new image">
          </div>
            </div>
          </form>
          <br><br>
          @if (count($subtasks) > 0)
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Image Name</th>
                <th scope="col">Date Summit</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                  @foreach ($images as $image)
                  <tr>
                    <th scope="row">{{$image->fileName}}</th>
                    <td>{{$image->updated_at}}</td>
                    <td>
                        <button type="button" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Delete
                        </button>
                     </td>
                  </tr>
                  @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>



  @if (count($subtasks) > 0)
    <div class="jumbotron far">
      <div class="row fart">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Desc</th>
              <th scope="col">Date Summit</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
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
                </form>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-info"
                  data-toggle="modal"
                  data-name="{{$subtask->name}}"
                  data-id="{{$subtask->id}}"
                  data-desc="{{$subtask->desc}}"
                  data-target="#exampleModal">
                    Edit
                  </button>
                  <form action="{{ url('subTask/'.$subtask->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Delete
                      </button>
                  </form>
                </td>

            </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    @endif

    <!-- Modal for edit -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
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
                 <input type="hidden" name ="id" id="subtask-id" >
                <input type="text" class="form-control" name="name" id="subtask-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea class="form-control" name="desc" id="desc-text"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send message</button>
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
      modal.find('.modal-title').text('New message to ' + id)
      modal.find('#subtask-id').val(id)
      modal.find('#subtask-name').val(name)
      modal.find('#desc-text').val(desc)
    })
//for image
          $("#carousel").carousel();
              .carousel {
              height: 500px;
              margin-bottom: 60px;
          }
          /* Since positioning the image, we need to help out the caption */
           .carousel-caption {
              z-index: 10;
          }
          /* Declare heights because of positioning of img element */
           .carousel .item {
              width: 100%;
              height: 500px;
              background-color: #777;
          }
          .carousel-inner > .item > img {
              position: absolute;
              top: 0;
              left: 0;
              min-width: 100%;
              height: 500px;
            }
  </script>
      {{-- <div id="carousel" class="carousel slide" data-ride="carousel">
          <!-- Menu -->
          <ol class="carousel-indicators">
              <li data-target="#carousel" data-slide-to="0" class="active"></li>
              <li data-target="#carousel" data-slide-to="1"></li>
              <li data-target="#carousel" data-slide-to="2"></li>
          </ol>
          <!-- Items -->
          <div class="carousel-inner">
              <div class="item active">
                  <img src="{{url('image/1/img_fjords.jpg')}}"  alt="Slide 1"  class = "img-responsive"/>
              </div>
              <div class="item">
                  <img src="{{url('image/1/youbaojiding03.jpg')}}" alt="Slide 2" />
              </div>
              <div class="item">
                  <img src="https://i.ytimg.com/vi/cXm1IW-3ee4/maxresdefault.jpg" alt="Slide 3" />
              </div>
          </div>
          <a href="#carousel" class="left carousel-control" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a href="#carousel" class="right carousel-control" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div> --}}

@if ($images)
      <div id="carousel" class="carousel slide" data-ride="carousel">
          <!-- Menu -->
          <ol class="carousel-indicators">
              @for ($i=0; $i < count($images); $i++)
                @if ($i == 0 )
                  <li data-target="#carousel" data-slide-to="{{$i}}" class="active"></li>
                @else
                  <li data-target="#carousel" data-slide-to="{{$i}}"></li>
                @endif
              @endfor
          </ol>
          <!-- Items -->
          <div class="carousel-inner">
            @for ($i=0; $i < count($images); $i++)
              @if ($i == 0 )
              <div class="item active">
                  <img src="{{url('image/'.$projectId.'/' . $taskId .'/' . $images[$i]->fileName )}}"  alt="Slide 1"  class = "img-responsive"/>
              </div>
              @else
              <div class="item">
                  <img src="{{url('image/'.$projectId.'/' . $taskId .'/' . $images[$i]->fileName )}}" alt="Slide {{$i}}" />
              </div>
              @endif
            @endfor
          </div>
          <a href="#carousel" class="left carousel-control" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a href="#carousel" class="right carousel-control" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
  @endif
@endsection
