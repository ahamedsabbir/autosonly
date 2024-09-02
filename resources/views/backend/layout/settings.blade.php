@extends('backend.app')
@section('title','Settings')
@section('page_name','Settings')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputTitle1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle1" value="{{ $settings->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription1">Description</label>
                        <textarea name="description" class="form-control" id="exampleInputDescription1" rows="3">{{ $settings->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress1">Address</label>
                        <textarea name="address" class="form-control" id="exampleInputAddress1" rows="3">{{ $settings->address }}</textarea>
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