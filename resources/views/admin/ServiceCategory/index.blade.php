@extends('admin.layouts.master')


@section('main_content')

@if (session('success'))
<div class="row mt-3">
    <div class="col-md-12">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

<div class="content mt-3">
   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>All Service Categories list</strong>
                    <a href="{{ route('service.category.create') }}" class="btn btn-primary">Add New Service Category</a>
                </div>
                <div class="card-body card-block">
                    @if ($categories->isEmpty())
                        <p>No service categories available.</p>
                    @else
                        <table id="categories_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('service.category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('service.category.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#categories_table').DataTable();
        });
    </script>
@endsection
@endsection

