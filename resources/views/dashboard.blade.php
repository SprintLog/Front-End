@extends('layouts.template')
@section('style')

@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
    <label  class="col-sm-4 col-form-label label label-default">
         Overview
      </label>
      <canvas id="pie-chart" width="40px" height="15px"></canvas>
      <br><br><br>
    <label  class="col-sm-4 col-form-label label label-default">
        Status
    </label>
    <br><br><br>
  <canvas id="pie-chart2" width="40px" height="15px"></canvas>
  <label  class="col-sm-4 col-form-label label label-default">
      Progress
  </label>
  <br><br><br>
  <canvas id="myChart" width="80px" height="80px"></canvas>
  <script>

  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Task1", "Task2", "Task3", "Task4", "Task5", "Task6"],
          datasets: [{
              label: 'Progress Transaction (%)',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
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
        data: [15,45,30]
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
    labels: ["Complete","InComplete"],
    datasets: [{
      label: "Overview Status",
      backgroundColor: ["#c45850", "#e8c3b9"],
      data: [20,80]
    }]
  },
  options: {
    title: {
      display: true,
      text: 'System Overview'
    }
  }
});

  </script>
    </div>
  </div>
@endsection
