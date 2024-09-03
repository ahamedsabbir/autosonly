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
            <a href="{{ route('caradd') }}" class="btn btn-warning">Add New</a>
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
              <th>Make</th>
              <th>Year</th>
              <th>License Plate</th>
              <th>Rental Price Per Day</th>
              <th>Image</th>
              <th>Available</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- ----------------------------------table data fetching---------------------------------- -->
            
          </tbody>
          <tfoot>
            <!-- table footer show table row-heading -->
            <tr>
            <th>SL</th>
              <th>Name</th>
              <th>Make</th>
              <th>Model</th>
              <th>Make</th>
              <th>Year</th>
              <th>License Plate</th>
              <th>Rental Price Per Day</th>
              <th>Image</th>
              <th>Available</th>
              <th>Status</th>
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