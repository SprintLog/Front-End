@extends('layouts.template')

@section('style')

  <link rel="stylesheet" href="{{elixir('css/fix-general.css')}}">

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
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
  <form class=""  action="{{ url('project/'.$project->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Thai Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="t_project_name" class="form-control"  value="{{$project->thai_name}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Eng Project Name
      </label>
      <div class="col-sm-7">
        <input type="text" name="e_project_name"  class="form-control" value="{{$project->eng_name}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Type Project
      </label>
      <div class="col-sm-5">
          <select class="form-control" name='typeProjectId'>
            <option selected="selected" value="{{$TypeProjectIsNow->id}}">{{$TypeProjectIsNow->type}}</option>
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
          <select class="form-control" name='advisorsId'>
            <option selected="selected" value="{{$userLeture->id}}">{{$userLeture->name}}</option>
            @foreach ($userLetureShow as $u)
              <option value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
          </select>
          <input type="hidden" name="userLetureIsDefault" value="{{$userLeture->id}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer
      </label>
      <div class="col-sm-5">
         <div class="form-inline"  id="fields" >
            <div id="field">
               <input   class="form-control" id="field1" name="developer[]" type="text" data-items="8"/>
                <button id="b1" class="btn add-more" type="button"    >
                 Add
               </button>
             </div>
         </div>
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
      {{-- <input type="hidden" name="userId" value="1"> --}}
  </form>
</div>
<script type="text/javascript">
    var url = "{{ route('autocomplete.ajax') }}";
    $('#field1').typeahead({
        source:  function (query, process) {
        return $.get(url, { query: query }, function (data) {
                return process(data);
          });
        }
    });
</script>
@endsection
