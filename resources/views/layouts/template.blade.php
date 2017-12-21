<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{elixir('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <title>﻿Ｓ Ｌ</title>
  </head>
  <body>
    <!-- Fixed navbar -->
     <nav class="navbar navbar-default navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">﻿SpintLog</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
             <li class="active"><a href="#">Home</a></li>
             <li><a href="#">Project Info</a></li>
             <li><a href="#">Planing</a></li>
             <li><a href="#">Estimage</a></li>
             <li><a href="#">Kanban Board</a></li>
             <li><a href="#">Upload</a></li>
             <li><a href="#about">About</a></li>
             <li><a href="#contact">Contact</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="../navbar/">Default</a></li>
             <li><a href="../navbar-static-top/">Static top</a></li>
             <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
           </ul>
         </div><!--/.nav-collapse -->
       </div>
     </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
              @yield('content')
          </div>
      </div>
    </div>
  </body>
</html>
