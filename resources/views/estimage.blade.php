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
        <label  class="col-sm-4 col-form-label label label-default">
            Calculate UUCPs
        </label>

        <table class="table table-striped ">
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
        <label  class="col-sm-6 col-form-label label label-default">
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
            @php
              $TC = array("Distributed system",
                      "Performance objectives",
                      "End-user efficiency",
                      "Complex processing",
                      "Reusable code",
                      "Easy to install",
                      "Easy to use",
                      "Portable",
                      "Easy to change",
                      "Concurrent use",
                      "Security",
                      "Access for third parties",
                      "Training needs");
            @endphp
            @for ($i=0; $i < 10; $i++)
              <tr>
                <th scope="row">{{$TC[$i]}}</th>
                <td>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" min="1" max="5" >
                  </div>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
        <label  class="col-sm-6 col-form-label label label-default">
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
            @php
              $EF = array("Familiar with the development process",
                      "Application experience",
                      "Object-oriented experience",
                      "Lead analyst capability",
                      "Motivation",
                      "Stable requirements",
                      "Part-time staff",
                      "Difficult programming language");
            @endphp
            @for ($i=0; $i < 8; $i++)
              <tr>
                <th scope="row">{{$EF[$i]}}</th>
                <td>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" min="1" max="5" >
                  </div>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-offset-4 col-sm-8">
            <button type="button" name="button" class="btn">Cancle</button>
            <button type="button" name="button" class="btn">Save</button>
          </div>
        </div>
      </div>
    </div>






@endsection
