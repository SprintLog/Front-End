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
            <form action="{{ url('downloadDoc/'.$file->fileName) }}" method="GET">
                {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">download</button></td>
              </form>
      </tr>
    @endforeach
     </tbody>
    </table>
    @endif
    <div class="form-group row far">
      <form  action="/uploadDoc/file" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <span>Document</span>
          <span class="btn btn-default btn-file">
            <input type="file" class = "form-control" name = "document">
          </span>
          <span class="fileinput-filename"></span>
          <input type="submit" class = "btn btn-success pull-right" value ="Upload new Document">
        </div>
      </div>

    </form>
  </div>

@endsection
