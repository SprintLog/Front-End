@extends('layouts.template')
@section('style')

@endsection

@section('script')
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group row far">
      <div class="row">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <span>Document</span>
          <span class="btn btn-default btn-file">
            <input type="file" />
          </span>
          <span class="fileinput-filename"></span>
        </div>
      </div>
      <div class="row far">
        <h3>Respone Advisor</h3>
        <div class="col-sm-5">
           <span class="label label-default">LastVer.</span>
           filename
           <button type="button" name="button" class="btn">Upload</button>
        </div>
      </div>

      <div class="row fart">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Task</th>
              <th scope="col">Date Summit</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>@twitter</td>
              <td>@twitter</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
