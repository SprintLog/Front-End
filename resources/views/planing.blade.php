@extends('layouts.template')
@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <style media="screen">
    [data-role="dynamic-fields"] > .form-group + .form-group {
      margin-top: 0.5em;
    }

    [data-role="dynamic-fields"] > .form-group [data-role="add"] {
      display: none;
    }

    [data-role="dynamic-fields"] > .form-group:last-child [data-role="add"] {
      display: inline-block;
    }

    [data-role="dynamic-fields"] > .form-group:last-child [data-role="remove"] {
      display: none;
    }
  </style>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-group [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-group [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-group:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
  });
  </script>
@endsection

@section('content')
<div class="jumbotron far">
  <form class="" action="index.html" method="post">

      <div data-role="dynamic-fields">
        <div class="form-group row far">

            <div class="col-sm-5">
              <input type="text" class="form-control" id="field-name" placeholder="Field Name">
            </div>

            <div class="col-sm-4">
              <select class="form-control" >
                <option data-tokens="ketchup mustard">Simple</option>
                <option data-tokens="mustard">Medium</option>
                <option data-tokens="frosting">Complex</option>
              </select>
            </div>

            <div class="col-sm-3">
              <button class="btn btn-danger" data-role="remove">
                <i class="fa fa-minus-square" aria-hidden="true"></i>
                Remove Task
              </button>
              <button class="btn btn-primary" data-role="add">
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                Add Task
              </button>
            </div>

        </div>
      </div>
  </form>

</div>
@endsection
