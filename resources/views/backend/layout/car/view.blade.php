@extends('backend.app')
@section('title', 'Car')
@section('page_name', 'View Car')
@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-2">
            <h3 class="card-title">Car View</h3>
          </div>
          <div class="col-md-2 offset-8 text-right">
            <a href="{{ route('admin-cars.index') }}" class="btn btn-dark">Back</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
     <div class="card-body">

@foreach ( $data->images as $image )
<img src="{{ asset("/uploads/cars/".$image->image_url) }}" alt="Favicon" width="200px" height="200px">

@endforeach
     {{$data->name}}
     {{$data->make}}
     {{$data->model}}
     {{$data->year}}
     {{$data->license_plate}}
     {{$data->rental_price_per_day}}
     {{$data->available}}
     {{$data->status}}

     </div>
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