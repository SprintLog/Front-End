@extends('layouts.templateList')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection

@section('script')
  {{--For Form delect--}}
<form id="form-delete" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
<script type="text/javascript">
    function confirmDelete(msg, url, action) {
        if (confirm(msg)) {
            if(action == 'restore'){
                window.location.href = url;
            }else{
                var element = document.getElementById('form-delete');
                element.action = url;
                element.submit();
            }
            // $('form#form-delete').attr('action', url);
            // $('form#form-delete').submit();
        } else {
            alert('Canceled');
        }
    }
</script>
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
      @foreach ($project as $project )
        <div class="col-sm-6 col-md-6">
            {{--<div class="thumbnail"
                <div class="caption">
                  <h3>{{$project->eng_name}} &nbsp; {{$project->thai_name}}</h3>
                    <p>{{$project->abstack}}</p>
                    <p>
                      <a href="{{ url('/project', $project->id) }}"
                        class="btn btn-primary btn-lg "
                        role="button">View
                      </a> &nbsp;

                      <a href="#!delete"
                      onclick=
                        "confirmDelete('Are you sure to delete ?',
                        '{{ url('/project', $project->id) }}',
                        'delete');"
                        class="btn btn-danger btn-lg">
                      Delete</a>

                    </p>
                </div>
            </div>--}}

            <div class="panel panel-info">
                   <div class="panel-heading ">
                      {{$project->eng_name}}   &nbsp;({{$project->thai_name}})

                      <a href="#!delete"
                      onclick=
                        "confirmDelete('Are you sure to delete ?',
                        '{{ url('/project', $project->id) }}',
                        'delete');"
                        class="btn btn-danger  pull-right">
                      Delete</a>

                      <a href="{{ url('/project', $project->id) }}"
                        class="btn btn-primary  pull-right "
                        role="button">View
                      </a> &nbsp;
                   </div>
                   <div class="panel-body">
                       {{$project->abstack}}
                   </div>

                </div>
             </div>
      @endforeach

        <div class="row">
          <div class="col-sm-6 col-md-12">
            <a href="{{url('projectlist/create')}}" class="btn btn-success">
              <span class="glyphicon glyphicon-plus"></span> Create New Project
            </a>
          </div>
        </div>
      </div>


</div>


@endsection
