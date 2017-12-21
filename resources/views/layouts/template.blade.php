<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{elixir('css/app.css')}}">
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="{{elixir('css/style.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <title>﻿Ｓ Ｌ</title>
  </head>
  <body>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">﻿Ｓ Ｌ</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Project Info</a></li>
              <li><a href="#">Planing</a></li>
              <li><a href="#">Estimage</a></li>
              <li><a href="#">Kanban Board</a></li>
              <li><a href="#">Upload</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">User</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <div class="row">
        <div class="col-md-offset-1 col-md-10">
               @yield('content')
        </div>
      </div>
    </div> <!-- /container -->

  </body>
</html>
