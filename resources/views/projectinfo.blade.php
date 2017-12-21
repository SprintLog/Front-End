@extends('layouts.template')

@section('style')

@endsection

@section('script')

@endsection

@section('content')
<div class="jumbotron">

  <form class="" action="" method="">

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">
          Thai Project Name
      </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="example  เครื่องมือจัดการซอฟต์แวร์ . . . ">
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">
          Eng Project Name
      </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="example SpintLog . . . ">
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">
          Type Project
      </label>
      <div class="col-sm-9">
        <select class="selectpicker" data-live-search="true">
          <option data-tokens="ketchup mustard">โครงงาน</option>
          <option data-tokens="mustard">Burger, Shake and a Smile</option>
          <option data-tokens="frosting">Sugar, Spice and all things nice</option>
        </select>
      </div>
    </div>

  </form>
</div>

@endsection
