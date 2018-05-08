@extends('layouts.template')

@section('style')

<link rel="stylesheet" href="{{elixir('css/fix-general.css')}}">

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
<form class=""  action="{{ url('projectTeacher/'.$project->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}
 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
       Project's Name (Thai)
   </label>
   <div class="col-sm-7">
     <input type="text" name="t_project_name" class="form-control"  value="{{$project->thai_name}}" disabled>
   </div>
 </div>

 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
       Project's Name (English)
   </label>
   <div class="col-sm-7">
     <input type="text" name="e_project_name"  class="form-control" value="{{$project->eng_name}}"disabled>
   </div>
 </div>

 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
       Project Type
   </label>
   <div class="col-sm-5">
       <select class="form-control" name='typeProjectId' disabled>
         <option selected="selected"  value="{{$TypeProjectIsNow->id}}">{{$TypeProjectIsNow->type}}</option>
         @foreach ($TypeProject as $t)
           <option value="{{$t->id}}">{{$t->type}}</option>
         @endforeach
       </select>
   </div>
 </div>

 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
       Advisor's Name
   </label>
   <div class="col-sm-5">
      <input   class="form-control" id="fieldLec"  name="developer[]"
      type="text" data-items="8"  disabled value={{$userLeture->name}}/>
       <input type="hidden" name="userLetureIsDefault" value="{{$userLeture->id}}">
   </div>
 </div>

 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
       Developer's Name
   </label>
   <div class="col-sm-5">
      <div class="form-inline"  id="fields" >
         @for ($i=0; $i < count($userStd); $i++)
            <div id="field">
               <input   class="form-control" id="field{{$i}}"  name="developer[]"
               type="text" data-items="8" value="{{$userStd[$i]->name}}" /disabled>

            </div>
         @endfor

      </div>
   </div>
 </div>

 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
     Abstract
   </label>
   <div class="col-sm-7">
       <textarea class="form-control" rows="3" name="abstract" disabled>{{$project->abstack}}</textarea>
   </div>
 </div>

 <div class="form-group row far">
   <label  class="col-sm-3 col-form-label">
     Keywords
   </label>
   <div class="col-sm-7">
     <input type="text" class="form-control" name="keyword" value="{{$project->keywords}}"disabled>
   </div>
 </div>

   {{-- <input type="hidden" name="userId" value="1"> --}}
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
 var next = 2;
 $(".add-more").click(function(e){
      e.preventDefault();
      var addto = "#field" + next;
      var addRemove = "#field" + (next);
      next = next + 1;
      var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="developer[]" type="text">';
      var newInput = $(newIn);
      var removeBtn = '<button id="remove' + (next - 1) + '" class="btn  remove-me" >Remove </button>';
      var removeButton = $(removeBtn);
      $(addto).after(newInput);
      $(addRemove).after(removeButton);
      $("#field" + next).attr('data-source',$(addto).attr('data-source'));
      $("#count").val(next);
      $('.remove-me').click(function(e){
        e.preventDefault();
        var fieldNum = this.id.charAt(this.id.length-1);
        var fieldID = "#field" + fieldNum;
        $(this).remove();
        $(fieldID).remove();
      });
      var url = "{{ route('autocomplete.ajax.std') }}";
      $("#field" + next).typeahead({
          source:  function (query, process) {
          return $.get(url, { query: query }, function (data) {
                  return process(data);
            });
          }
      });
 });
 //  FOR PROFRESSER
 var url = "{{ route('autocomplete.ajax.lec') }}";
 $('#fieldLec').typeahead({
     source:  function (query, process) {
     return $.get(url, { query: query }, function (data) {
             return process(data);
       });
     }
 });
});
</script>
@endsection
