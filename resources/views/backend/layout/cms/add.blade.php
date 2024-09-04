@extends('backend.app')
@section('title', 'CMS Controller')
@section('page_name', 'CMS Data')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="card-title">Cms Add Form</h3>
                    </div>
                    <div class="col-md-2 offset-8 text-right">
                        <a href="{{ route('faq.index') }}" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{ route('cms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="Enter title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <textarea id="summernote" name="description" class="form-control" placeholder="Enter some description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputImage1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputImage1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStatus1">Status</label>
                        <select name="status" class="form-control" id="exampleInputStatus1">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
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

@endpush