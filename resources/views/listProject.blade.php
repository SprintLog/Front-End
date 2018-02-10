@extends('layouts.template')
@section('style')

@endsection

@section('script')
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
      {{--  1 USERS  SHOW PROJECT ON THIS PAGE  --}}
      <div class="row">
        <div class="col-md-6">
          <div class="thumbnail">
            <div class="caption">
              <p> ENGINEER PROJECT</p>
              abstack projec
              {{-- <i class="fa fa-user"></i> --}}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="thumbnail">
            <div class="caption">
              <p> ENGINEER PROJECT</p>
              abstack project
              {{-- <i class="fa fa-user"></i> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <button type="button" name="button" class="btn btn-primary">Create new project</button>
        </div>
      </div>
  </div>
</div>
@endsection
