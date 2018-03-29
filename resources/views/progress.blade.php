@extends('layouts.template')
@section('style')

@endsection

@section('script')
@endsection

@section('content')

<style>
.btn{

  width: 100px;
}
</style>



  <div class="jumbotron far">
      <div class="row fart">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Task</th>
              <th scope="col">Date Submit</th>
              <th scope="col">Status</th>
              <th scope="col">CheckTask</th>
            </tr>
          </thead>


          <tbody>

          <!-- dialog-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ....
                    <form>
                      <div class="form-group">
                        <label for="comment">Abstract</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>

              <!-- dialog2-->
              <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Check Task</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure to check this task?

                      <form>
                        <div class="form-group">
                          <label for="comment">Please give some comments</label>
                          <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>





            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Authentication <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">View</button></td>
              <td>2018-01-22</td>
              <td><button type="button " name="button" class="btn btn-success">Approved</button></td>
              <td><button type="button " name="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">Check</button>

            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Army</td>
              <td>Estimate <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">View</button></td>
              <td>2018-01-23</td>
              <td><button type="button " name="button" class="btn btn-danger">Failed</button></td>
              <td><button type="button " name="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">Check</button>


            </tr>
            <tr>
              <th scope="column">3</th>
              <td>Fang</td>
              <td>Progress <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">View</button></td>
              <td>2018-01-23</td>
              <td><button type="button " name="button" class="btn btn-warning">Waiting</button></td>
              <td><button type="button " name="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">Check</button>
            </tr>


          </tbody>
        </table>
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Task</th>
            <th scope="col">Date Submit</th>
            <th scope="col">Status</th>
            <th scope="col">CheckTask</th>
          </tr>
        </thead>
        <tbody>


      </table>

    


    </div>
  </div>


@endsection
