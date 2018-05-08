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
  <form class=""  action="{{ url('project/'.$project->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
    <div class="form-group row far">
      <label  class="col-md-3 col-form-label">
          Project Name (Thai)
      </label>
      <div class="col-md-7">
        <input type="text" name="t_project_name" class="form-control"  value="{{$project->thai_name}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-md-3 col-form-label">
          Project Name (English)
      </label>
      <div class="col-md-7">
        <input type="text" name="e_project_name"  class="form-control" value="{{$project->eng_name}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Project Type
      </label>
      <div class="col-md-5">
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
          Advisor's Name
      </label>
      <div class="col-md-5">
         <input   class="form-control" id="fieldLec"  name="developer[]"
         type="text"  value="{{$userLeture->name}}"/>
          <input type="hidden" name="userId_IsDefault[]" value="{{$userLeture->id}}">
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
          Developer's Name
      </label>
      <div class="col-md-5">
         {{-- <input type="text" id="field" name="" value=""> --}}
         <div class="form-inline">
           <div class="multi-field-wrapper">
             <div class="multi-fields">
                 @for ($i=0; $i < count($userStd); $i++)
                    <div class="multi-field">

                         <input type="text" id="field" class="form-control" name="developer[]" value="{{$userStd[$i]->name}}">


                      <button type="button" class="btn-danger">Remove</button>

                      <input type="hidden" name="userId_IsDefault[]" value="{{$userStd[$i]->id}}">
                    </div>
                 @endfor
             </div>
             <button type="button" class="btn">Add field</button>
           </div>
         </div>
     </div>
   </div>

    <div class="form-group row far">
      <label  class="col-md-3 col-form-label">
        Abstract
      </label>
      <div class="col-md-7">
          <textarea class="form-control" rows="3" name="abstract" >{{$project->abstack}}</textarea>
      </div>
    </div>

    <div class="form-group row far">
      <label  class="col-sm-3 col-form-label">
        Keywords
      </label>
      <div class="col-md-7">
        <input type="text" class="form-control" name="keyword" value="{{$project->keywords}}">
      </div>
    </div>
    <div class="form group row">
      <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-primary btn-lg">Save</button>
      </div>
    </div>
      {{-- <input type="hidden" name="userId" value="1"> --}}
  </form>
</div>
<script type="text/javascript">
var url2 = "{{ route('autocomplete.ajax.lec') }}";
$('#fieldLec').typeahead({
    source:  function (query, process) {
    return $.get(url2, { query: query }, function (data) {
            return process(data);
      });
    }
});
</script>
<script type="text/javascript">
  $('.multi-field-wrapper').each(function() {

    var $wrapper = $('.multi-fields', this);

    $(".btn", $(this)).click(function(e) {
        $('.multi-field:first-child', $wrapper)
        .clone(true)
        .appendTo($wrapper)
        .find('input')
        .val('')
        .focus();
    });

    $('.multi-field .btn-danger', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
  });
  var url = "{{ route('autocomplete.ajax.std') }}";
    $('[id="field"]').typeahead({
        source:  function (query, process) {
        return $.get(url, { query: query }, function (data) {
                return process(data);
          });
        }
    });


</script>
@endsection
