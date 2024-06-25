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
                    <strong>All Brand Images list</strong>
                    <a href="{{ route('brandimage.create') }}" class="btn btn-primary">Add New Brand Image</a>
                </div>
                <div class="card-body card-block">
                    @if ($brandImages->isEmpty())
                        <p>No brand images available.</p>
                    @else
                        <table id="brand_images_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brandImages as $image)
                                    <tr>
                                        <td>{{ $image->id }}</td>
                                        <td>{{ $image->name }}</td>
                                        <td>
                                            @if ($image->image)
                                                <img src="{{ asset($image->image) }}" alt="{{ $image->name }}" style="max-width: 150px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $image->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('brandimage.edit', $image->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('brandimage.destroy', $image->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this brand image?');">
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

<script>
    $(document).ready(function() {
        $('#brand_images_table').DataTable();
    });
</script>

@endsection
