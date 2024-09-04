@extends('backend.app')
@section('title', 'CMS Controller')
@section('page_name', 'CMS Data')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- card-header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="card-title">{{ $cms->name }}</h3>
                    </div>
                    <div class="col-md-2 offset-8 text-right">
                        <a href="{{ route('cms.edit', $cms->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <h2>{{ $cms->title }}</h2>
                <p class="mt-3">{!! $cms->description !!}</p>
                <div class="mt-3">
                    <img src="@if($cms->image) {{ asset($cms->image) }} @else {{asset('storage/img/No_Image_Available.jpg')}} @endif" alt="image" class="img-fluid" style="max-height: 300px; max-width: 100%;">
                </div>
                <p class="mt-3">Status: {{ $cms->status }}</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection