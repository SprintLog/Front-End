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
<div class="jumbotron far">
  <form class="" action="" method="">

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Thai Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="example  เครื่องมือจัดการซอฟต์แวร์ . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Eng Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="example SpintLog . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Type Project
      </label>
      <div class="col-sm-9">
        <select class="selectpicker" data-live-search="true">
          <option data-tokens="ketchup mustard">โครงงานวิศวกรรม</option>
          <option data-tokens="mustard">โครงงานวิจัย</option>
          <option data-tokens="frosting">โครงงานไร้สาระ</option>
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Advisors
      </label>
      <div class="col-sm-9">
        <select class="selectpicker" data-live-search="true">
          <option data-tokens="ketchup mustard">ศ.ดร. อาร์มมี้</option>
          <option data-tokens="mustard">นพ.มาคกี้</option>
          <option data-tokens="frosting">อ.กิตศิริ</option>
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer
      </label>
      <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="enter. . ." data-role="tagsinput">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Abstract
      </label>
      <div class="col-sm-7">
          <textarea class="form-control" rows="3"></textarea>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Keyword
      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" placeholder="example algorithm ..." data-role="tagsinput">
      </div>
    </div>
    <div class="form group row">
      <div class="col-sm-offset-2 col-sm-4">
        <button type="button" class="btn btn-dark btn-lg">Cancle</button> &nbsp;
        <button type="button" class="btn btn-info btn-lg">Save Change</button>
      </div>
    </div>
  </form>
</div>

@endsection
