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

    @if (count($files) >= 0)
    <div class="form-group row far">
      <form  action="/uploadDoc/file" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <span>Document</span>
          <span class="btn btn-default btn-file">
            <input type="file" class = "form-control" name = "document">
            <input type="hidden" name = "projectId" value="{{$id}}">
          </span>
          <span class="fileinput-filename"></span>
          <input type="submit" class = "btn btn-success " value ="Upload Document">
        </div>
      </div>

    </form>
  </div>

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
            <form action="{{ url('downloadDoc/'.$file->fileName) }}" method="GET">
                {{ csrf_field() }}
                <input type="hidden" name = "projectId" value="{{$id}}">
            <button type="submit" class="btn btn-primary">download</button></td>
              </form>
      </tr>
    @endforeach
     </tbody>
    </table>
    @endif


@endsection
