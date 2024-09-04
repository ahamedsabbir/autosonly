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
                <h3 class="card-title">{{ $page->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputTitle1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter title" value="{{ $page->title }}">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <textarea id="summernote" name="description" class="form-control" placeholder="Enter some description">{{ $page->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputImage1">
                            <img src="@if($page->image) {{ asset($page->image) }} @else {{asset('storage/img/No_Image_Available.jpg')}} @endif" alt="image" class="img-fluid" style="max-height: 300px; max-width: 100%;">
                        </label>
                        <input type="file" name="image" class="form-control d-none" id="exampleInputImage1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStatus1">Status</label>
                        <select name="status" class="form-control" id="exampleInputStatus1">
                            <option value="active" {{ $page->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $page->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
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
<script src="{{ asset('backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
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
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endpush