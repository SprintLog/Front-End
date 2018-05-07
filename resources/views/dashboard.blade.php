@extends('layouts.template')
@section('style')
  <style>
  h1 {
      text-align: center;
  }
  h2 {
      text-align: center;
  }
  p {
      text-align: center;
  }
  img{
    display: block;
    margin: 0 auto;
  }

  </style>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@endsection

@section('content')
  <div class="jumbotron far">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$projectName}}</li>
      </ol>
    </nav>
      <!-- show status UCP-->
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">You Have</h2>
              <h1 class="card-title">{{$UCP}}</h1>
              <p class="card-text">UCP</p>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">You Need</h2>
              <h1 class="card-title">{{$HUCP}}</h1>
              <p class="card-text">Hours / UCP  </p>
            </div>
          </div>
        </div>
      </div>
      <!-- pass variabel php to javascript-->
          @php
          $nametask = [] ;
          $complexity = [] ;
          $progress=[] ;
          @endphp
          @foreach ($tasks as $tasks)
            @php
              array_push($nametask,$tasks->nametask);
              array_push($complexity,$tasks->complexity);
            @endphp
          @endforeach
          @foreach ($progressProject as $progressProject)
            @php
              array_push($progress,$progressProject);
            @endphp
          @endforeach
          @php
            echo '<script>';
            echo 'var nametask = ' . json_encode($nametask) . ';';
            echo 'var progress = ' . json_encode($progress) . ';';
            echo '</script>';
          @endphp

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Task Name</th>
            <th scope="col">Time Limit</th>
          </tr>
        </thead>
        <tbody>
          @for ($i=1; $i <= sizeof($nametask); $i++)
            <tr>
              <th scope="row">{{$i}}</th>
              <td>{{$nametask[$i-1]}}</td>
              <td>@if($complexity[$i-1] == 1)
                  {{number_format(5*$TCF*$ECF * $HUCP ,2, '.', ' ')}} Hours
                @elseif($complexity[$i-1] == 2)
                  {{number_format(10*$TCF*$ECF * $HUCP  ,2, '.', ' ') }} Hours
                @else
                  {{number_format(15*$TCF*$ECF * $HUCP  ,2, '.', ' ')}} Hours
              @endif
              </td>
            </tr>
          @endfor
        </tbody>
      </table>
      <!-- $UCP ไม่ใช่ค่าที่ต้องการ ค่าที่ต้องการคือ ค่า UCP ทีี่ทำได้ ซึ่งตอนนี้ยังทำไม่ได้-->
      @if ($UCPMade > $UCPBeLike)
        <!-- show image status-->
        <div class="card" style="width: 80rem;">
          <img class="card-img-top"  height="100px" width"100px" display= "block"  src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Smile3_no-blur.svg/2000px-Smile3_no-blur.svg.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">You can develop this project  within limited time</p>
          </div>
        </div>
      @else
        <!-- show image status-->
        <div class="card" style="width: 80rem;">
          <img class="card-img-top"  height="100px" width"100px" display= "block"  src="http://www.pngmart.com/files/1/Sad-Emoji-PNG-Clipart.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Do more, work harder!</p>
          </div>
        </div>
      @endif
      <br><br>
  <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
  <br><br><br>
    <div class="form-group row far">
    <label  class="col-sm-4 col-form-label label label-default">
         Overview
      </label>
      <canvas id="pie-chart" width="40px" height="15px"></canvas>
      <br><br>
    <label  class="col-sm-4 col-form-label label label-default">
        Status
    </label>
    <br><br>
  <canvas id="pie-chart2" width="40px" height="15px"></canvas><br><br>
  <label  class="col-sm-4 col-form-label label label-default">
      Progress
  </label>
  <br><br><br>
  <canvas id="myChart" width="80px" height="80px"></canvas>
  <br><br><br>
  {{-- <canvas id="bar-chart-horizontal" width="800" height="450"></canvas> --}}

  <!-- make grarph-->
  <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          //labels: ["Task1", "Task2", "Task3", "Task4", "Task5", "Task6"],
          labels: nametask,
          datasets: [{
              label: 'Progress Transaction (%)',
              data: progress,
              backgroundColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderColor: [
                  'rgba(255,99,132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });

  new Chart(document.getElementById("pie-chart2"), {
    type: 'pie',
    data: {
      labels: ["TO DO", "DOING", "DONE"],
      datasets: [{
        label: "Task Status",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
        data: [{{sizeof($todos)}},{{sizeof($doings)}},{{sizeof($dones)}}]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Task Status in Project'
      }
    }
});

new Chart(document.getElementById("pie-chart"), {
  type: 'pie',
  data: {
    labels: ["Complete","Incomplete"],
    datasets: [{
      label: "Overview Status",
      backgroundColor: ["#ffff33", "#3366ff"],
      data: [{{$projectComplete}},100-{{$projectComplete}}]
    }]
  },
  options: {
    title: {
      display: true,
      text: 'System Overview'
    }
  }
});

new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["UCP(Estimate)", "UCP(Done)", "UCP(Total)"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [{{$UCPBeLike}} , {{$UCPMade}} , {{$UCP}}]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Compare UCP values ​​in project'
      }
    }
});

  </script>
    </div>
  </div>
@endsection
