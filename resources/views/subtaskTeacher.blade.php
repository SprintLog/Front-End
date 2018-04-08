@extends('layouts.template')
@section('style')

@endsection

@section('script')
@endsection

@section('content')
    <div class="jumbotron far">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/progress/{{$projectId}}">Tasks</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$taskName}}</li>
    </ol>
  </nav>

  @if (count($subtasks) > 0)
    <div class="jumbotron far">
      <div class="row fart">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Desc</th>
              <th scope="col">Date Summit</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($subtasks as $subtask)
            <tr>
              <th scope="row">{{$subtask->name}}</th>
              <td>{{$subtask->desc}}</td>
              <td>{{$subtask->updated_at}}</td>
              <td>
                @if ($subtask->completed == false)
                  <button type="submit" class = "btn btn-btn btn-warning">
                  Pending
                  </button>
                @else
                  <button type="submit" class = "btn btn-success">
                  Complete
                  </button>
                @endif
                </form>
            </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    @endif


    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
    <div class="panel panel-default">
      <div class="panel-heading"><label class="control-label" for="numberInput"></label>Comment By advisor</div>
      <div class="panel-body">
        <form data-toggle="validator" action="/post/new" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class = "form-group">
            <textarea class="form-control" rows="4" cols="50" name="body" placeholder="Post status" required ></textarea>
          </div>
          <div class = "form-gruop pull-right"><input type="submit" class ="btn btn-primary" value = "post" ></div>
          <div class="help-block with-errors"></div>
          <div class="form-group">

        </form>
      </div>
    </div>
    </div>

      {{--
      @if (count($posts) > 0)
      //{{-- Post Timeline --}}
      {{--}}  @foreach ($posts as $post)
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>{{$post->name}} {{$post->lastname}}</h4>
            <small>{{$post->created_at}}</small>
            <p>{{$post->body}}</P>
            <a href= "/like/{{$post->id}}"><strong>{{$post->likes}}Like(s)</strong></a>
          </div>
        </div>
        @endforeach
      @endif --}}
      </div>
    </div>
  </div>

@endsection
