@extends('backend.app')
@section('title','Faq DataTables')
@section('page_name','Faq Data')
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
            <div class="card-header">
        <div class="row">
                            <div class="col-md-2">
                                <h3 class="card-title">Faq Add Form</h3>
                            </div>
                            <div class="col-md-2 offset-8 text-right">
                                <a href="{{ route('faq.index') }}" class="btn btn-dark">Back</a>
                            </div>
                        </div>
      </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" action="{{ route('faq.store') }}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDescription1">Description</label>
                    
              <textarea id="summernote" name="description" class="form-control" placeholder="Enter some description">
                
              </textarea>
              
                  </div>
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

<script>
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
</script>
@endpush


