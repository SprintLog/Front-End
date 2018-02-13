@extends('layouts.template')
@section('style')

@endsection

@section('script')

@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <form class="" action="index.html" method="post">

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
                <input type="text" class="form-control" name="email" aria-describedby="emailHelp"  placeholder="Enter email">
            </div>
            <div class="form-group">
              <label >Password</label>
                <input type="text" class="form-control" name=""  placeholder="Enter password">
            </div>

            <div class="form-group">
              <label class="radio-inline">
                <input type="radio" name="Profreser">Profreser
              </label>
              <label class="radio-inline">
                <input type="radio" name="Student">Student
              </label>
            </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
