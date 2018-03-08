@extends('layouts.template')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="{{elixir('css/fix-general.css')}}">

@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
  $("input").val()
  </script>
@endsection

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

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
  <form class=""  action="{{ url('projectinfo') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Thai Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="tproject_name" class="form-control"  value="{{$project->thai_name}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Eng Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="eproject_name"  class="form-control" value="{{$project->eng_name}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Type Project
      </label>
      <div class="col-sm-5">
          <select class="form-control">
            <option selected="selected">{{$project->typeProject}}</option>
            <option value="1">โครงงานวิศวกรรม</option>
            <option value="2">โครงงานวิจัย</option>
            <option value="3">โครงงานไร้สาระ</option>
          </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Advisors
      </label>
      <div class="col-sm-5">
          <select class="form-control">
            <option selected="selected">{{$userLeture->name}}</option>
            <option value="1">ศ.ดร. อาร์มมี</option>
            <option value="2">นพ.มาคก</option>
            <option value="3">อ.กิตศิริ</option>
          </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer
      </label>
      <div class="col-sm-5">
          @foreach ($userStd as $dev)
            <input type="text" class="form-control" name="developer" value='{{$dev->name}}'> <br>
          @endforeach
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Abstract
      </label>
      <div class="col-sm-7">
          <textarea class="form-control" rows="3" name="abstract" >{{$project->abstack}}</textarea>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Keyword
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" name="keyword" value="{{$project->keywords}}">
      </div>
    </div>
    <div class="form group row">
      <div class="col-sm-offset-2 col-sm-4">
        <button type="button" class="btn btn-dark btn-lg">Cancle</button> &nbsp;
        <button type="submit" class="btn btn-info btn-lg">Save Change</button>
      </div>
    </div>
      <input type="hidden" name="userId" value="1">
  </form>
</div>

@endsection
