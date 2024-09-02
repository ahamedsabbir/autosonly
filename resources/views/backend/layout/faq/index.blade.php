@extends('backend.app')
@section('title','Faq DataTables')
@section('page_name','Faq Data')
@section('content')

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between ">
                <h3 class="card-title">FAQ DataTable</h3>
                <a href="{{ route('faq.create') }}" class="btn btn-primary text-left">Add New</a>
                <!-- <button type="submit" class="btn btn-primary float-right">Add New</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- ----------------------------------table data fetching---------------------------------- -->
                  @forelse ($faqs as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ strlen($data->title) <= 10 ? $data->title : substr($data->title, 0, 50)  }}</td>
                    <td>{{ strlen($data->description) <= 10 ? $data->description : substr($data->description, 0, 20) . '...' }}</td>
                    <!-- ----------------------------------table data edit/update/destroy---------------------------------- -->
                    <td>
                      <a class="btn btn-success btn-sm" href="{{ route('faq.edit', $data->id) }}">Edit</a>
                      <a class="btn btn-info btn-sm" href="{{ route('faq.show', $data->id) }}">Show</a>
                       <form action="{{ route('faq.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Confirm to Delete')">Delete</button>
                         </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                   <th colspan="4">No Product found!</th>
                   </tr>
                  @endforelse

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Description</th>
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
