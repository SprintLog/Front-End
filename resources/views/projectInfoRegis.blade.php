@extends('layouts.templateList')

@section('style')
  <link rel="stylesheet" href="{{elixir('css/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{elixir('css/fix-general.css')}}">
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
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
  <form class=""  action="{{ url('projectcreate') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Thai Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="t_project_name" class="form-control" placeholder="example  เครื่องมือจัดการซอฟต์แวร์ . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Eng Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="e_project_name"  class="form-control" placeholder="example SpintLog . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Type Project
      </label>
      <div class="col-sm-5">
          <select class="form-control" name='type_project'>
          @foreach ($TypeProject as $t)
            <option value="{{$t->id}}">{{$t->type}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Advisors
      </label>
      <div class="col-sm-5">
        <select class="form-control" name='advisors'>
          @foreach ($userLetureShow as $u)
            <option value="{{$u->id}}">{{$u->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer
      </label>
      <div class="col-sm-5">
         <div class="form-group">
             <input class="form-control" type="text" id="search_text" name="search_text">
         </div>
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
      <div class="col-sm-5">
        <input type="text" class="form-control" name="keyword" placeholder="ตัวอย่างเช่น Al,ระบบฝังตัว" >
      </div>
    </div>
    <div class="form group row">
      <div class="col-sm-offset-2 col-sm-4">
        <button type="button" class="btn btn-dark btn-lg">Cancle</button> &nbsp;
        <button type="submit" class="btn btn-info btn-lg">Confirm </button>
      </div>
    </div>

      <input type="hidden" name="usermakePJ" value="{{ Auth::user()->id }}">
  </form>

</div>
<script type="text/javascript">
    var url = "{{ route('autocomplete.ajax') }}";
    $('#search_text').typeahead({
        source:  function (query, process) {
        return $.get(url, { query: query }, function (data) {
                return process(data);
          });
        }
    });
</script>
@endsection
