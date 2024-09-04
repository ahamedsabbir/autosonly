@extends('backend.app')
@section('title', 'Settings')
@section('page_name', 'Settings')
@section('content')
<style>
.fl-wrapper {
    z-index: 9999999 !imortant;
}
</style>
    <div class="row">

        <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Site Information</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputTitle1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputTitle1"
                                value="{{ $settings->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAuthor1">Author</label>
                            <input type="text" name="author" class="form-control" id="exampleInputAuthor1"
                                value="{{ $settings->author }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputKeywords1">Keywords</label>
                            <textarea name="keywords" class="form-control" id="exampleInputKeywords1" rows="3">{{ $settings->keywords }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription1">Description</label>
                            <textarea name="description" class="form-control" id="exampleInputDescription1" rows="3">{{ $settings->description }}</textarea>
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

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Graphical</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <label for="exampleInputFavicon1" class="text-center">
                                    <p>Favicon @error('favicon') <span class="text-danger">{{ $message }}</span> @enderror</p>
                                    <img src="{{ asset($settings->favicon) }}" alt="Favicon" width="200px" height="200px">
                                </label>
                                <input type="file" class="form-control d-none" id="exampleInputFavicon1" name="favicon"
                                    onchange="changeImage(this)">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputLogo1" class="text-center">
                                    <p>Logo @error('logo') <span class="text-danger">{{ $message }}</span> @enderror</p>
                                    <img src="{{ asset($settings->logo) }}" alt="Logo" width="200px" height="200px">
                                </label>
                                <input type="file" class="form-control d-none" id="exampleInputLogo1" name="logo"
                                    onchange="changeImage(this)">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Personal Information</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                value="{{ $settings->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputPhone1"
                                value="{{ $settings->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputKeywords1">Address</label>
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

        <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Other Settings</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputCopyright1">Copyright</label>
                            <input type="text" name="copyright" class="form-control" id="exampleInputCopyright1"
                                value="{{ $settings->copyright }}">
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
