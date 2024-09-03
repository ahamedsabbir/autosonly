@extends('backend.app')
@section('title', 'Faq DataTables')
@section('page_name', 'Faq Data')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
                            <div class="col-md-2">
                                <h3 class="card-title">Faq List</h3>
                            </div>
                            <div class="col-md-2 offset-8 text-right">
                                <a href="{{ route('faq.create') }}" class="btn btn-warning">Add New</a>
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
            <!-- raw code for Description lenth fixed -->
          <td>{{ strlen($data->title) <= 10 ? $data->title : substr($data->title, 0, 50)  }}</td>
          <td>
          {{ strlen($data->description) <= 10 ? $data->description : substr($data->description, 0, 20) . '...' }}
          </td>
          <!-- ----------------------------------table data edit/update/destroy---------------------------------- -->
          <td>
          <div class="row mt-2">
            <!-- edit action -->
            <a class="ml-3" href="{{ route('faq.edit', $data->id) }}"><i class="fas fa-edit fa-fw"></i></a>
            <!-- show action -->
            <a class="ml-3" href="{{ route('faq.show', $data->id) }}"><i class="fas fa-eye fa-fw"></i></a>
            <!-- delete action by form -->
            <form action="{{ route('faq.destroy', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="ml-3 bg-danger"
              onclick="return confirm('Are You Confirm to Delete')"><i class="fas fa-trash fa-fw"></i>
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