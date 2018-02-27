@extends('layouts.template')
@section('style')
  <style media="screen">

  </style>
@endsection
@section('script')
@endsection
@section('content')
<form  action="{{ url('estimage_updateall') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
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

            @foreach ($tcf as $tcf)
              <tr>
                <th scope="row">{{ $tcf -> topic}}</th>
                <td>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="rateTcf[]" min="1" max="5"  value="{{ $tcf -> rate}}">
                    <input type="hidden" name="topicTcf[]" value="{{ $tcf -> topic}}">
                    <input type="hidden" name="weightTcf[]" value="{{ $tcf -> weight}}">
                    <input type="hidden" name="projectId" value="{{ $tcf -> projectId}}">
                  </div>
                </td>
              </tr>
            @endforeach
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

            @foreach ($ecf as $ecf)
              <tr>
                <th scope="row">{{ $ecf -> topic}}</th>
                <td>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="rateEcf[]" min="1" max="5" value="{{ $ecf -> rate}}" >
                    <input type="hidden" name="topicEcf[]" value="{{ $ecf -> topic}}">
                    <input type="hidden" name="weightEcf[]" value="{{ $ecf -> weight}}">
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-offset-4 col-sm-8">
            <button type="button" name="button" class="btn">Cancle</button>
            <button type="submit" name="button" class="btn btn-warning">Save</button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection
{{-- @php  FOR TEST ONLY
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
  $rate = array();
@endphp --}}

{{-- @php
  $EF = array("Familiar with the development process",
          "Application experience",
          "Object-oriented experience",
          "Lead analyst capability",
          "Motivation",
          "Stable requirements",
          "Part-time staff",
          "Difficult programming language");
@endphp --}}
