@extends('backend.app')
@section('title', 'Car')
@section('page_name', 'Add Car')
@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card">
      <div class="card-header " style="background-color:#ab91d2">
        <div class="row">
          <div class="col-md-2">
            <h3 class="card-title">Car Add Form</h3>
          </div>
          <div class="col-md-2 offset-8 text-right">
            <a href="" class="btn btn-dark">Back</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form id="quickForm" novalidate="novalidate" action="{{ route('caradds') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputTitle1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputTitle1" placeholder="Enter title">
          </div>
          <div class="row">
            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <!-- make or brand -->
                <label>Brand</label>
                <input type="text" name="make" class="form-control" id="make" placeholder="Enter title">
              </div>
            </div>
            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" id="model" placeholder="Enter title">
              </div>
            </div>
            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control" id="year" placeholder="Enter title">
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
                  <option value="active">Active</option>
                  <option value="repair">Repair</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <!-- select -->
              <div class="form-group">
                <label>Rental Price Per Day</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter title">
              </div>
            </div>
          </div>


 <!-- ===========================image upload area start================================= -->
          
          <div class="btn-group w-50">
            <span class="btn btn-success col fileinput-button">
              <i class="fas fa-plus"></i>
              <span>Add files</span>
            </span>

          </div>
           <!-- ===========================image upload previews ================================= -->
          <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>



          <!-- ===========================image upload area End================================= -->

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
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

  <!-- <script>
  $(function () {
    $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
    });
    $('#quickForm').validate({
    rules: {
      title: {
      required: true,
      title: true,
      },
      description: {
      required: true,
      minlength: 5
      },
    },
    messages: {
      title: {
      required: "Please enter a title address",
      title: "Please enter a valid title address"
      },
      description: {
      required: "Please provide a description",
      minlength: "Your description must fillup"
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
  </script> -->


  <!-- dropzonejs -->
  <script src="{{asset('backend')}}/plugins/dropzone/min/dropzone.min.js"></script>

  <!-- ------------------------------Page specific Drop Image script----------------------- -->
  <script>
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })


var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

var myDropzone = new Dropzone(document.body, {
    url: "/upload",
    headers: {
        'X-CSRF-TOKEN': token
    },
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false,
    previewsContainer: "#previews",
    clickable: ".fileinput-button"
});


    
    // DropzoneJS Code End
  </script>
@endpush