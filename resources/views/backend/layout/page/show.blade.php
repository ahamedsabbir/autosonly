@extends('backend.app')
@section('title', 'page Controller')
@section('page_name', 'page Data')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- card-header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="card-title">{{ $page->name }}</h3>
                    </div>
                    <div class="col-md-2 offset-8 text-right">
                        <a href="{{ route('page.edit', $page->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <h2>{{ $page->title }}</h2>
                <p class="mt-3">{!! $page->description !!}</p>
                <div class="mt-3">
                    <img src="@if($page->image) {{ asset($page->image) }} @else {{asset('storage/img/No_Image_Available.jpg')}} @endif" alt="image" class="img-fluid" style="max-height: 300px; max-width: 100%;">
                </div>
                <p class="mt-3">Status: {{ $page->status }}</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection