@extends('layouts.template')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection

@section('script')
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
        <p class="total-card-counter" id="totalCards"></p>
        <form id="frmAddTodo" class="form-add-todo">
          Add Project:
          <input type="text" autocomplete="off" name="todo_text" id="" value="" placeholder="Write and press enter" />
        </form>
    </div>
    <div class="form-group row far">
      <div class="boards" id="boards"></div>
    </div>
  </div>
@endsection

{{--   ADD LIST
  <form id="frmAddList" class="form-add-list">
  Add List:
    <input type="text" autocomplete="off" name="list_name" id="" value="" placeholder="List name" />
  </form>
--}}
