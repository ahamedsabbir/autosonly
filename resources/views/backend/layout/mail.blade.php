@extends('backend.app')
@section('title', 'Mail')
@section('page_name', 'Mail')
@section('content')
<style>
    .fl-wrapper {
        z-index: 9999999 !imortant;
    }
</style>
<div class="row">

    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Mail Setup</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{ route('mail.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputTitle1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle1"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAuthor1">Author</label>
                        <input type="text" name="author" class="form-control" id="exampleInputAuthor1"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKeywords1">Keywords</label>
                        <textarea name="keywords" class="form-control" id="exampleInputKeywords1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription1">Description</label>
                        <textarea name="description" class="form-control" id="exampleInputDescription1" rows="3"></textarea>
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

</div>
@endsection

@push('scripts_more')
<script>
    function changeImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().find('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush