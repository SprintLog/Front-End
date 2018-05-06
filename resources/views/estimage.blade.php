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
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$projectName}}</li>
      </ol>
    </nav>
    @if (count($tasks) > 0)
    <div class="row far">
      <div class="col-sm-offset-2 col-sm-8">
        <label  class="col-sm-4 col-form-label label label-default">
            Summary Tasks
        </label>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Complexity</th>
                            <th>Number of Features</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                          @php
                          $simple = 0 ;
                          $middle = 0 ;
                          $complex = 0 ;
                          @endphp
                            @foreach ($tasks as $tasks)
                                    @if($tasks->complexity == 1) @php $simple++ @endphp
                                    @elseif ($tasks->complexity == 2) @php $middle++ @endphp
                                    @else  @php $complex++ @endphp
                                    @endif
                            @endforeach
                            <tr>
                                <td class="table-text"><div>Simple</div></td>
                                <td class="table-text"><div>{{$simple}}</div></td>
                            </tr>
                            <tr>
                                <td class="table-text"><div>Middle</div></td>
                                <td class="table-text"><div>{{$middle}}</div></td>
                            </tr>
                                <td class="table-text"><div>Complex</div></td>
                                <td class="table-text"><div>{{$complex}}</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        @endif
    <div class="row far">
      <div class="col-sm-offset-2 col-sm-8">
        <label  class="col-sm-6 col-form-label label label-default">
            Technical Complexity Factor (TCF)
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
                  <div class="col-sm-10">
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
            Environmental Complexity Factor (ECF)
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






@endsection
