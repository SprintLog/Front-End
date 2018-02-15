<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{elixir('css/app.css')}}">
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{elixir('css/fix-fonts.css')}}">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Indie+Flower|Itim">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
    @yield('script')
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
            <a class="navbar-brand" href="#">﻿
              <img id="brand-image"  style="height:120%;display:inline-block;" src="https://avatars1.githubusercontent.com/u/34474167?s=200&v=4"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

              <li class="{{ Request::segment(1) === 'login' ? 'active' : null }}">
                <a href="{{url('auth')}}">Login</a>
              </li>
              <li  class="{{ Request::segment(1) === 'register' ? 'active' : null }}">
                <a href="{{url('auth/create')}}">Register</a>
              </li>

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
