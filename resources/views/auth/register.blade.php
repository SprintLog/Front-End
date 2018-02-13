@extends('layouts.templateAuth')
@section('style')

@endsection

@section('script')

@endsection

@section('content')
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
                <input type="radio" name="typeuser" value="professor">Professor
              </label>
              &nbsp; &nbsp; &nbsp;
              <label class="radio-inline">
                <input type="radio" name="typeuser" value="Student">Student
              </label>
            </div>
              <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
