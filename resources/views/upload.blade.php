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

  <div class="jumbotron far">
    @if (count($files) > 0)
    <table class="table">
      <thead>
    <tr>
        <td>Filename</td>
        <td>Download</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($files as $file)
      <tr>
          <td>{{$file->fileName}}</td>
          <td>
            <form action="{{ url('download/'.$file->fileName) }}" method="GET">
                {{ csrf_field() }}
                <input type="hidden" name = "projectId" value="{{$id}}">
            <button type="submit" class="btn btn-info">download</button></td>
              </form>
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
      <div class="row far">
        <h3>Respone Advisor</h3>
        <div class="col-sm-5">
           <span class="label label-default">LastVer.</span>
           filename
           <button type="button" name="button" class="btn">Upload</button>
        </div>
      </div>
    </form>
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
        </table>

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
              {{--<a href= "/like/{{$post->id}}"><strong>{{$post->likes}}Like(s)</strong></a>--}}
            </div>
          </div>
        @endforeach
      @endif
      </div>
    </div>
  </div>

@endsection
