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
                        <h3 class="card-title">CMS List</h3>
                    </div>
                    <div class="col-md-2 offset-8 text-right">
                        <a href="{{ route('cms.create') }}" class="btn btn-primary">Add New</a>
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
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ----------------------------------table data fetching---------------------------------- -->
                        @forelse ($cms as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- raw code for Description lenth fixed -->
                            <td>{{ strlen($row->name) <= 10 ? $row->name : substr($row->title, 0, 50) }}</td>
                            <td>
                                {{ strlen($row->title) <= 10 ? $row->title : substr($row->title, 0, 20) . '...' }}
                            </td>
                            <!-- ----------------------------------table data edit/update/destroy---------------------------------- -->
                            <td>
                                <div class="row mt-2">
                                    <!-- edit action -->
                                    <a class="ml-3" href="{{ route('cms.edit', $row->id) }}"><i class="fas fa-edit fa-fw text-primary"></i></a>
                                    <!-- show action -->
                                    <a class="ml-3" href="{{ route('cms.show', $row->id) }}"><i class="fas fa-file-alt"></i></a>

                                    <!-- status action -->
                                    @if ($row->status == 'active')
                                    <a class="ml-3" href="{{ route('cms.status', $row->id) }}"><i class="fas fa-eye"></i></a>
                                    @elseif ($row->status == 'inactive')
                                    <a class="ml-3" href="{{ route('cms.status', $row->id) }}"><i class="fas fa-eye-slash"></i></a>
                                    @endif

                                    <!-- delete action by form -->
                                    <form action="{{ route('cms.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-3 border-0 bg-transparent no-outline" onclick="return confirm('Are You Confirm to Delete')"><i class="fas fa-trash fa-fw text-danger"></i></button>
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