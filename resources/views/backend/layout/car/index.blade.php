@extends('backend.app')
@section('title','Car DataTables')
@section('page_name','Car Data')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">

      <!-- card-header -->
      <div class="card-header">
        <div class="row">
          <div class="col-md-2">
            <h3 class="card-title">Car List</h3>
          </div>
          <div class="col-md-2 offset-8 text-right">
            <a href="{{ route('admin-cars.create') }}" class="btn btn-warning">Add New</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->

      <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <!-- table header show table row-heading -->
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Make</th>
              <th>Model</th>
              <th>Year</th>
              <th>License Plate</th>
              <th>Rental Price Per Day</th>
              <th>Available</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- ----------------------------------table data fetching---------------------------------- -->
            @forelse ($cars as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <!-- raw code for Description lenth fixed -->
          <td>{{ strlen($data->name) <= 10 ? $data->name : substr($data->name, 0, 20) }}</td>
          <td>{{ strlen($data->make) <= 10 ? $data->make : substr($data->make, 0, 20) }}</td>
          <td>{{ strlen($data->model) <= 10 ? $data->model : substr($data->model, 0, 20) }}</td>
          <td>{{ strlen($data->year) <= 10 ? $data->year : substr($data->year, 0, 20) }}</td>
          <td>{{ strlen($data->license_plate) <= 10 ? $data->license_plate : substr($data->license_plate, 0, 20) }}</td>
          <td>{{ strlen($data->rental_price_per_day) <= 10 ? $data->rental_price_per_day : substr($data->rental_price_per_day, 0, 20) }}</td>
          <td>{{ strlen($data->available) <= 10 ? $data->available : substr($data->available, 0, 20) }}</td>
          <td>{{ strlen($data->status) <= 10 ? $data->status : substr($data->status, 0, 20) }}</td>
          <!-- ----------------------------------table data edit/update/destroy---------------------------------- -->
          <td>
          <div class="row mt-2">
            <!-- edit action -->
            <a class="ml-3" href="{{ route('admin-cars.edit', $data->id) }}"><i class="fas fa-edit fa-fw text-primary"></i></a>
            <!-- show modal -->
            <!-- show action -->
            <a class="ml-3" href="{{ route('admin-cars.show', $data->id) }}"><i class="fas fa-eye fa-fw text-warning"></i></a>
            <!-- delete action by form -->
            <form action="{{ route('admin-cars.destroy', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="ml-3 border-0 bg-transparent no-outline"
              onclick="return confirm('Are You Confirm to Delete')"><i class="fas fa-trash fa-fw text-danger"></i>
            </button>
            </form>
          </div>
          </td>
        </tr>
      @empty
    <tr>
      <!-- if no product in database -->
      <th colspan="4">No Product found!</th>
    </tr>
  @endforelse
          </tbody>
          <tfoot>
            <!-- table footer show table row-heading -->
            <tr>
            <th>SL</th>
              <th>Name</th>
              <th>Make</th>
              <th>Model</th>
              <th>Year</th>
              <th>License Plate</th>
              <th>Rental Price Per Day</th>
              <th>Available</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection