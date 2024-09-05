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
                        <h3 class="card-title">page List</h3>
                    </div>
                    <div class="col-md-2 offset-8 text-right">
                        <a href="{{ route('page.create') }}" class="btn btn-primary">Add New</a>
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
                            <th>Slug</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ----------------------------------table data fetching---------------------------------- -->
                        @forelse ($page as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- raw code for Description lenth fixed -->
                            <td>{{ strlen($row->slug) <= 10 ? $row->slug : substr($row->slug, 0, 50) }}</td>
                            <td>
                                {{ strlen($row->title) <= 10 ? $row->title : substr($row->title, 0, 20) . '...' }}
                            </td>
                            <!-- ----------------------------------table data edit/update/destroy---------------------------------- -->
                            <td>
                                <div class="row mt-2">
                                    <!-- edit action -->
                                    <a class="ml-3" href="{{ route('page.edit', $row->id) }}"><i class="fas fa-edit fa-fw text-primary"></i></a>
                                    <!-- show action -->
                                    <a class="ml-3" href="{{ route('page.show', $row->id) }}"><i class="fas fa-file-alt"></i></a>
                                    <!-- delete action by form -->
                                    <form action="{{ route('page.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 border-0" onclick="return confirm('Are You Confirm to Delete')"><i class="fas fa-trash fa-fw text-danger"></i></button>
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
                            <th>Slug</th>
                            <th>Title</th>
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