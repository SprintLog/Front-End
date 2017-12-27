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

  <div class="jumbotron far">
    หกดหกด
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
</div>
  </div>
@endsection

{{--  --}}

{{--   ADD LIST
  <form id="frmAddList" class="form-add-list">
  Add List:
    <input type="text" autocomplete="off" name="list_name" id="" value="" placeholder="List name" />
  </form>
--}}
