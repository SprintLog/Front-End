@extends('layouts.template')
@section('style')
  <link rel="stylesheet" href="css/jkanban.min.css">
  <style media="screen">
     .success{background: #00B961;}
     .info{background: #2A92BF;}
     .warning{background: #F4CE46;}
     .error{background: #FB7D44;}
  </style>
@endsection
@section('script')

@endsection

@section('content')
  <div id="myKanban"></div>

  <button id="addDefault">Add "Default" board</button><br>
   <button id="addToDo">Add element in "To Do" Board</button><br>
   <button id="removeBoard">Remove "Done" Board</button><br>
   <button id="removeElement">Remove "My Task Test"</button>

@endsection
