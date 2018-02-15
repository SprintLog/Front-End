@extends('layouts.templateAuth')
@section('style')

@endsection

@section('script')

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
  <div class="jumbotron far">
    <div class="form-group row far">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <form action="{{ url('auth') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label >Name</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter name">
            </div>

            <div class="form-group">
              <label >Lastname</label>
                <input type="text" class="form-control" name="lastname"  placeholder="Enter email">
            </div>

            <div class="form-group">
              <label >Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp"  placeholder="Enter email">
            </div>
            <div class="form-group">
              <label >Password</label>
                <input type="password" class="form-control" name="password"  placeholder="Enter password">
            </div>

            <div class="form-group col-md-offset-2">
              <label class="radio-inline">
                <input type="radio" name="typeuser" value=0>Professor
              </label>
              &nbsp; &nbsp; &nbsp;
              <label class="radio-inline">
                <input type="radio" name="typeuser" value=1>Student
              </label>
            </div>
              <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
