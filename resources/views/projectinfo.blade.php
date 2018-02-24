@extends('layouts.template')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="{{elixir('css/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{elixir('css/fix-general.css')}}">

@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <script src="{{elixir('js/bootstrap-tagsinput.js')}}"></script>

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
  <form class=""  action="{{ url('projectinfo/create') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Thai Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="tproject_name" class="form-control" placeholder="example  เครื่องมือจัดการซอฟต์แวร์ . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Eng Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="eproject_name"  class="form-control" placeholder="example SpintLog . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Type Project
      </label>
      <div class="col-sm-9">
        <select class="selectpicker" data-live-search="true" name="type_project">
          <option data-tokens="ketchup mustard" value="1">โครงงานวิศวกรรม</option>
          <option data-tokens="mustard" value="2">โครงงานวิจัย</option>
          <option data-tokens="frosting" value="3">โครงงานไร้สาระ</option>
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Advisors
      </label>
      <div class="col-sm-9">
        <select class="selectpicker" data-live-search="true" name="advisors">
          <option data-tokens="ketchup mustard" value="0">ศ.ดร. อาร์มมี้</option>
          <option data-tokens="mustard" value="1">นพ.มาคกี้</option>
          <option data-tokens="frosting" value="2" >อ.กิตศิริ</option>
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer
      </label>
      <div class="col-sm-9">
          <input type="text" class="form-control" name="developer" placeholder="enter. . ." data-role="tagsinput">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Abstract
      </label>
      <div class="col-sm-7">
          <textarea class="form-control" rows="3" name="abstract" ></textarea>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Keyword
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" name="keyword" placeholder="example algorithm ..." data-role="tagsinput">
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
