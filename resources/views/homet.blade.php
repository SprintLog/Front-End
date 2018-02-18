@extends('layouts.template2')
@section('style')

@endsection

@section('script')

@endsection

@section('content')

        <h2>Project</h2>

        <table class="table table-hover table boardered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Project Name</th>
              <th>view</th>

            </tr>
            <?php
              $i = 0;
             ?>


            @foreach ($showprojects as $showproject)

              <tr>

                <th>{{ ++$i }}</th>

                <th>{{ $showproject -> eng_name }}</th>
                <th><a class="btn btn-primary" href="showinfo" role="button">View Project Info</th>
              </tr>
            @endforeach



          </thead>

        </table>


@endsection
