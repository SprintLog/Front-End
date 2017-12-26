@extends('layouts.template')
@section('style')
  <style media="screen">

  </style>
@endsection
@section('script')
@endsection
@section('content')
  <div class="jumbotron far">
    <div class="row far">
      <div class="col-sm-offset-2 col-sm-8">
        <label  class="col-sm-3 col-form-label label label-default">
            Calculate UUCPs
        </label>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Complexity</th>
              <th scope="col">Number of Features</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Simeple</th>
              <td>2</td>
            </tr>
            <tr>
              <th scope="row">Medium</th>
              <td>3</td>
            </tr>
            <tr>
              <th scope="row">Complex</th>
              <td>4</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row far">
      <div class="col-sm-offset-2 col-sm-8">
        <label  class="col-sm-5 col-form-label label label-default">
            Calculate Technical Complexity
        </label>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Factor</th>
              <th scope="col">&nbsp;&nbsp;&nbsp;Rating</th>
            </tr>
          </thead>
          <tbody>
            @for ($i=0; $i < 10; $i++)
              <tr>
                <th scope="row">Distributed system</th>
                <td>
                  <div class="col-sm-5">
                    <input type="number" class="form-control" min="1" max="5" >
                  </div>
                </td>
              </tr>
            @endfor
            <tr>
              <th scope="row">Performance objectives</th>
              <td>
                <div class="col-sm-5">
                  <input type="number" class="form-control" min="1" max="5" >
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">End-user efficiency</th>
              <td>
                <div class="col-sm-5">
                  <input type="number" class="form-control" min="1" max="5" >
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">Distributed system</th>
              <td>
                <div class="col-sm-5">
                  <input type="number" class="form-control" min="1" max="5" >
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    <div>






@endsection
