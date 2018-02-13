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
              <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email"  aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
