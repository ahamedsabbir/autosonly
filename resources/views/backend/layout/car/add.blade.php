@extends('backend.app')
@section('title', 'Car')
@section('page_name', 'Add Car')
@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-2">
            <h3 class="card-title">Car Add Form</h3>
          </div>
          <div class="col-md-2 offset-8 text-right">
            <a href="{{ route('car') }}" class="btn btn-dark">Back</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ route('caradds') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputTitle1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputTitle1" placeholder="Enter Name">
          </div>
          <div class="row">
            <div class="col-sm-3">
              <!-- select -->
              <div class="form-group">
                <!-- make or brand -->
                <label>Brand</label>
                <input type="text" name="make" class="form-control" id="make" placeholder="Enter Brand">
              </div>
            </div>
            <div class="col-sm-3">
              <!-- select -->
              <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" id="model" placeholder="Enter Model">
              </div>
            </div>
            <div class="col-sm-3">
              <!-- select -->
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control" id="year" placeholder="Enter Year">
              </div>
            </div>
            <div class="col-sm-3">
              <!-- select -->
              <div class="form-group">
                <label>License Plate</label>
                <input type="text" name="license_plate" class="form-control" id="license_plate" placeholder="License Plate">
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <!-- make or brand -->
                <label>Available</label>
                <select class="form-control" name="available" id="available">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <!-- make or brand -->
                <label>Status</label>
                <select class="form-control" name=" status" id="available">
                  <option value="ok">Active</option>
                  <option value="repair">Repair</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <label>Rental Price Per Day</label>
                <input type="text" name="rental_price_per_day" class="form-control" id="rental_price_per_day" placeholder="Enter Price">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="file" name="images[]" class="form-control" multiple>
          </div>
          <div id="newImagefeild">
       <!-- While click add more new field here add -->
          </div>
          <a href="#" onclick="addmore()" class="btn btn-primary">Add More</a>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!--/.col (left) -->
  <!-- right column -->
  <div class="col-md-6">

  </div>
  <!--/.col (right) -->
</div>
@endsection

@push('scripts_more')
  <script src="{{asset('backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{asset('backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>

  <script>
    $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
      alert("Form successful submitted!");
      }
    });
    $(document).ready(function () {
      $("#quickForm").validate({
      rules: {
      name: {
      required: true,
      minlength: 2
      },
      make: {
      required: true
      },
      model: {
      required: true
      },
      year: {
      required: true,
      digits: true,
      minlength: 4,
      maxlength: 4
      },
      available: {
      required: true
      },
      status: {
      required: true
      },
      rental_price_per_day: {
      required: true,
      number: true
      },
      license_plate: {
      required: true,
      },
      },
      messages: {
      name: {
      required: "Please enter your name",
      minlength: "Your name must be at least 2 characters long"
      },
      make: {
      required: "Please enter the brand"
      },
      model: {
      required: "Please enter the model"
      },
      year: {
      required: "Please enter the year",
      digits: "Please enter a valid year",
      minlength: "Year must be 4 digits",
      maxlength: "Year must be 4 digits"
      },
      available: {
      required: "Please select availability"
      },
      status: {
      required: "Please select the status"
      },
      rental_price_per_day: {
      required: "Please enter the rental price per day",
      number: "Please enter a valid price"
      },
      license_plate: {
      required: "Please enter the license_plate",
      },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
      }
      });
    });
    });
    </script>

 
 <!-- ----------------------on click add more image-------------------------------- -->
 <script>
    let sl = 2;

    function addmore() {
      $(document).ready(function() {
                  $('#newImagefeild').on('click', '.deleteImageDiv', function() {
                    $(this).closest('#thisField').remove();
                  });
                });

    let newImage = `
                <div class="row" id="thisField">
  <div class="col-sm-4">
  <div class="form-group" >
     <input type="file" name="images[]" class="form-control" multiple>
    </div>
    </div>
  <div class="col-sm-4">
  <div class="form-group">
                <button type="button" class="btn btn-danger deleteImageDiv">Delete</button>
              </div>
    </div>
  </div>
            `;
    $("#newImagefeild").append(newImage);
    sl++;
    }
  </script>
<!-- ----------------------on click add more image-------------------------------- -->
@endpush