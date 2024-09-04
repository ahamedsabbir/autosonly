@extends('backend.app')
@section('title', 'Faq DataTables')
@section('page_name', 'Faq edit')
@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
      <div class="row">
                            <div class="col-md-2">
                                <h3 class="card-title">Faq Update Form</h3>
                            </div>
                            <div class="col-md-2 offset-8 text-right">
                                <a href="{{ route('admin-faq.index') }}" class="btn btn-dark">Back</a>
                            </div>
                        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form id="quickForm" novalidate="novalidate" action="{{ route('admin-faq.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputTitle1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputTitle1" value="{{$data->title}}">
          </div>
          <div class="form-group">
            <label for="exampleInputDescription1">Description</label>

            <textarea id="summernote" name="description" class="form-control" placeholder="Enter some description">
    {{$data->description}}
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
      alert("Form successful submitted!");
      }
    });
    $('#quickForm').validate({
      rules: {
      title: {
        required: true,
        title: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
      },
      messages: {
      title: {
        required: "Please enter a title address",
        title: "Please enter a valid title address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
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