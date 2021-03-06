@extends('layouts.templateList')

@section('style')

  <link rel="stylesheet" href="{{elixir('css/fix-general.css')}}">
  <style media="screen">

   #field {
      margin-bottom:20px;
   }
  </style>
@endsection

@section('script')
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
  <form class="input-append"  action="{{ url('projectlist') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Project Name (Thai)
      </label>
      <div class="col-sm-7">
        <input type="text" name="t_project_name" class="form-control" placeholder="example  เครื่องมือจัดการซอฟต์แวร์ . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Project Name (English)
      </label>
      <div class="col-sm-7">
        <input type="text" name="e_project_name"  class="form-control" placeholder="example SpintLog . . . ">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Project Type
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
          Advisor's Name
      </label>
      <div class="col-sm-5">
        <select class="form-control" name='advisorsId'>
          @foreach ($userLetureShow as $u)
            <option value={{$u->id}}>{{$u->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer's Name
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
          <textarea class="form-control" rows="3" name="abstract" ></textarea>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Keywords
      </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="keyword" placeholder="ตัวอย่างเช่น Al,ระบบฝังตัว" >
      </div>
    </div>
    <div class="form group row">
      <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-info btn-lg">Save </button>
      </div>
    </div>

      <input type="hidden" name="usermakePJ" value={{ Auth::user()->id }}>
  </form>

</div>
<script type="text/javascript">
    var url = "{{ route('autocomplete.ajax.std') }}";
    $('#field1').typeahead({
        source:  function (query, process) {
        return $.get(url, { query: query }, function (data) {
                return process(data);
          });
        }
    });
</script>
<script type="text/javascript">
   $(document).ready(function(){
    var next = 1;
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
 });
</script>
@endsection
