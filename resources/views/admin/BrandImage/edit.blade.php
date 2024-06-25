@extends('admin.layouts.master')

@section('main_content')

@if ($errors->any())
<div class="row mt-3">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

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
                    <strong>Update Brand Image</strong>
                    <a href="{{ route('brandimage.index') }}" class="btn btn-secondary">Back to Brand Images</a>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('brandimage.update', $brandImage->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $brandImage->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image:</label>
                            @if ($brandImage->image)
                                <p>Current Image:</p>
                                <img style="width: 20%" src="{{ asset($brandImage->image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ old('status', $brandImage->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $brandImage->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Brand Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
