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
            <button type="submit" class="btn btn-info">download</button></td>
              </form>
      </tr>
    @endforeach
     </tbody>
    </table>
    <div class="form-group row far">
      <form  action="/upload/file" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <span>Document</span>
          <span class="btn btn-default btn-file">
            <input type="file" class = "form-control" name = "document">
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
      </div>
    </div>
  </div>
@endsection
