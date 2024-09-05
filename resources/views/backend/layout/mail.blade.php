@extends('backend.app')
@section('title', 'Mail')
@section('page_name', 'Mail')
@section('content')
<style>
    .fl-wrapper {
        z-index: 9999999 !important;
    }
</style>
<div class="container">
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
                            <label for="exampleInputmail_mailer1">Mail Mailer</label>
                            <input type="text" name="mail_mailer" class="form-control" id="exampleInputmail_mailer1" value="{{ env('MAIL_MAILER') }}">
                            @error('mail_mailer') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputmail_host1">Mail Host</label>
                            <input type="text" name="mail_host" class="form-control" id="exampleInputmail_host1" value="{{ env('MAIL_HOST') }}">
                            @error('mail_host') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputmail_port1">Mail Port</label>
                            <input type="text" name="mail_port" class="form-control" id="exampleInputmail_port1" value="{{ env('MAIL_PORT') }}">
                            @error('mail_port') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputmail_username1">Mail Username</label>
                            <input type="text" name="mail_username" class="form-control" id="exampleInputmail_username1" value="{{ env('MAIL_USERNAME') }}">
                            @error('mail_username') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputmail_password1">Mail Password</label>
                            <input type="text" name="mail_password" class="form-control" id="exampleInputmail_password1" value="{{ env('MAIL_PASSWORD') }}">
                            @error('mail_password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputmail_encryption1">Mail Encryption</label>
                            <input type="text" name="mail_encryption" class="form-control" id="exampleInputmail_encryption1" value="{{ env('MAIL_FROM_ADDRESS') }}">
                            @error('mail_encryption') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputmail_from_address1">Mail From Address</label>
                            <input type="text" name="mail_from_address" class="form-control" id="exampleInputmail_from_address1" value="{{ env('MAIL_ENCRYPTION') }}">
                            @error('mail_from_address') <span class="text-danger">{{ $message }}</span> @enderror
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