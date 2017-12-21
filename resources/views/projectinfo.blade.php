@extends('layouts.template')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  {{-- <link rel="stylesheet" href="{{elixir('css/jquery.tagsinput.css')}}"> --}}

@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  {{-- <script src="{{elixir('js/jquery.tagsinput.js')}}"></script>
  <script type="text/javascript">

      function onAddTag(tag) {
       alert("Added a tag: " + tag);
     }

     function onRemoveTag(tag) {
       alert("Removed a tag: " + tag);
     }

     function onChangeTag(input,tag) {
       alert("Changed a tag: " + tag);
     }

     $(function() {
       $('#tags').tagsInput({width:'auto'});
      });
  </script> --}}

  {{-- This is Comment When use Code can use  --}}
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
          <option data-tokens="ketchup mustard">โครงงานวิศวกรรม</option>
          <option data-tokens="mustard">โครงงานวิจัย</option>
          <option data-tokens="frosting">โครงงานไร้สาระ</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">
          Advisors
      </label>
      <div class="col-sm-5">
          <input type="text" id="tags"  class="form-control" placeholder="example Kitsiri ... then enter " >
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">
          Developer
      </label>
      <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="example Kitsiri ... then enter ">
      </div>
    </div>

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">
          Ab
      </label>
      <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="example Kitsiri ... then enter ">
      </div>
    </div>

  </form>
</div>

@endsection
