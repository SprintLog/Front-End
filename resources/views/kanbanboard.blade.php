@extends('layouts.template')
@section('style')
  <link rel="stylesheet" href="/css/EJ-kanban.css">
@endsection
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@section('script')
@endsection

@section('content')
  <div class="jumbotron far">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$projectName}}</li>
      </ol>
    </nav>
    <div class="container-fluid" style="min-width: 1050px;">
            <div id="sortableKanbanBoards" class="row">
                <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">
                        TODO
                        <i class="fa fa-2x fa-plus-circle pull-right"></i>
                    </div>
                    <div class="panel-body" style="max-height: 401px;">
                        <div id="TODO" class="kanban-centered">
                          @foreach ($todos as $todo)
                            <article class="kanban-entry grab" draggable="true">
                              <div class="kanban-entry-inner">
                              <div class="kanban-label">
                                <h2>{{$todo}}</h2>
                              </div>
                            </div>
                            </article>
                          @endforeach
                        {{-- <article class="kanban-entry grab" id="item0" draggable="true">
                          <div class="kanban-entry-inner">
                          <div class="kanban-label">
                            <h2>qwdq</h2>
                          </div>
                        </div>
                        </article>
                        <article class="kanban-entry grab" id="item1" draggable="true">
                            <div class="kanban-entry-inner">
                            <div class="kanban-label"><h2>wdq</h2>
                            </div>
                          </div>
                        </article>
                        <article class="kanban-entry grab" id="item2" draggable="true">
                              <div class="kanban-entry-inner"><div class="kanban-label">
                                <h2>wdqqeqe</h2></div>
                              </div>
                        </article>
                        <article class="kanban-entry grab" id="item3" draggable="true">
                                <div class="kanban-entry-inner">
                                <div class="kanban-label">
                                  <h2>wqe</h2>
                                </div>
                              </div>
                      </article> --}}

                          </div>
                    </div>
                </div>
                <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">
                        DOING
                        <i class="fa fa-2x fa-plus-circle pull-right"></i>
                    </div>
                    <div class="panel-body" style="max-height: 401px;">
                        <div id="DOING" class="kanban-centered">
                          @foreach ($doings as $doing)
                            <article class="kanban-entry grab" draggable="true">
                              <div class="kanban-entry-inner">
                              <div class="kanban-label">
                                <h2>{{$doing}}</h2>
                              </div>
                            </div>
                            </article>
                          @endforeach
                          {{-- <article class="kanban-entry grab" id="item3" draggable="true">
                                  <div class="kanban-entry-inner">
                                  <div class="kanban-label">
                                    <h2>wqe</h2>
                                  </div>
                                </div>
                        </article> --}}
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary kanban-col">
                    <div class="panel-heading">
                        DONE
                        <i class="fa fa-2x fa-plus-circle pull-right"></i>
                    </div>
                    <div class="panel-body" style="max-height: 401px;">
                        <div id="DONE" class="kanban-centered">

                          @foreach ($doings as $doing)
                            <article class="kanban-entry grab" draggable="true">
                              <div class="kanban-entry-inner">
                              <div class="kanban-label">
                                <h2>{{$doing}}</h2>
                              </div>
                            </div>
                            </article>
                          @endforeach
                          {{-- <article class="kanban-entry grab" id="item3" draggable="true">
                                  <div class="kanban-entry-inner">
                                  <div class="kanban-label">
                                    <h2>wqe</h2>
                                  </div>
                                </div>
                        </article> --}}
                        </div>
                    </div>
                </div>
                    <div class="col-md-2">
                        {{-- <button id="btn-add-task" class="btn btn-primary">Add Task</button> --}}
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
