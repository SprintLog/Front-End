@extends('layouts.template')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection

@section('content')
  <div class="jumbotron far">
    <header class="header">
      <p class="total-card-counter" id="totalCards"></p>
    </header>
    <div class="form-group row far">
      <form id="frmAddTodo" class="form-add-todo">
        Add Project:
        <input type="text" autocomplete="off" name="todo_text" id="" value="" placeholder="Write and press enter" />
      </form>
    </div>

    <div class="boards" id="boards"></div>
    <form id="frmAddList" class="form-add-list">
      Add List:
      <input type="text" autocomplete="off" name="list_name" id="" value="" placeholder="List name" />
    </form>
  </div>
@endsection
