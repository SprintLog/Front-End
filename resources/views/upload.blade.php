@extends('layouts.template')
@section('style')

@endsection

@section('script')
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

  <div class="jumbotron far">
    @if (count($files) > 0)
    <table class="table">
      <thead>
    <tr>
        <td>Filename</td>
        <td>Name</td>
        <td>Date upload</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($files as $file)
      @php
      $fileDate = $file->created_at;
      $interval = Carbon\Carbon::parse($fileDate)->diffInDays(now(), false);
      @endphp
      <tr>
          <td>{{$file->fileName}}&nbsp&nbsp
            @if ($interval == false)
              <span class="label label-info">New</span>
            @endif
          </td>
          <td>{{$file->name}}</td>
          <td>{{$file->created_at}}</td>
          <td>
            <form action="{{ url('download/'.$file->fileName) }}" method="GET">
                {{ csrf_field() }}
                <input type="hidden" name = "projectId" value="{{$id}}">
            <button type="submit" class="btn btn-info">Download</button>
            <button type="button" class="btn btn-danger"
            data-toggle="modal"
            data-id="{{$file->id}}"
            data-name="{{$file->fileName}}"
            data-target="#exampleModal">
              Delete
            </button>
            </form>

          </td>
      </tr>
    @endforeach
     </tbody>
    </table>
    @endif
    <div class="form-group row far">
      <form  action="/upload/file" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <span>Document</span>
          <span class="btn btn-default btn-file">
            <input type="file" class = "form-control" name = "document">
            <input type="hidden" name = "projectId" value="{{$id}}">
          </span>
          <span class="fileinput-filename"></span>
        </div>
      </div>
      <div class = "form-gruop">
          <input type="submit" class = "btn btn-success pull-right" value ="Upload new Document">
      </div>
    </form><br><br>


      <!-- Modal for look popup -->
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
              <form action="{{ url('upload/delete') }}" id="file-id"  method="POST">
                {{ csrf_field() }}
                {{-- {{ method_field('DELETE') }} --}}
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">File Name:</label>
                   <input type="hidden" name ="id" id="file-id" >
                  <input type="text" class="form-control" name="name" id="file-name" readonly>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
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
        modal.find('.modal-title').text('Do you want to delete the file?')
        modal.find('#file-id').val(id)
        modal.find('#file-name').val(name)
        // modal.find('#desc-text').val(desc)
      })
        </script>

      <div class="row far">
        <h3>Respone Advisor</h3>
        {{-- <div class="col-sm-5">
           <span class="label label-default">LastVer.</span>
           filename
           <button type="button" name="button" class="btn">Upload</button>
        </div>
      </div>

      <div class="row fart">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Task</th>
              <th scope="col">Date Summit</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>@twitter</td>
              <td>@twitter</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table> --}}

        {{-- New post--}}
        <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
        <div class="panel panel-default">
          <div class="panel-heading"><label class="control-label" for="numberInput"></label>New Post</div>
          <div class="panel-body">
            <form data-toggle="validator" action="/post/new" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class = "form-group">
                <textarea class="form-control" rows="4" cols="50" name="body" placeholder="Post status" required ></textarea>
              </div>
              <div class = "form-gruop pull-right">
                <input type="hidden" name = "projectId" value="{{$id}}">
                <input type="submit" class ="btn btn-primary" value = "post" >
              </div>
              <div class="help-block with-errors"></div>
              <div class="form-group">

            </form>
          </div>
        </div>
        </div>

        @if (count($posts) > 0)
        {{-- Post Timeline --}}
        @foreach ($posts as $post)
          <div class="panel panel-default">
            <div class="panel-body">
              <h4>{{$post->name}} {{$post->lastname}}</h4>
              <small>{{$post->created_at}}</small>
              <p>{{$post->body}}</P>
              {{-- <a href= "/like/{{$post->id}}"><strong>{{$post->likes}}Like(s)</strong></a> --}}
            </div>
          </div>
        @endforeach
      @endif
      </div>
    </div>
  </div>


@endsection
