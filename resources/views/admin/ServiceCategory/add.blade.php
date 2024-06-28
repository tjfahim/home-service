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

<div class="content card mt-3">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Create Service Category</strong>
                    <a href="{{ route('service.category.index') }}" class="btn btn-secondary">Back to Service Categories</a>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('service.category.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price Starting:</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                        </div>
                    
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image:</label>
                            <input type="file" name="image" class="form-control-file">
                            <div class="form-group">
                        </div>
                            <label for="feature" class="form-control-label">Feature:</label>
                            <select name="feature" class="form-control" required>
                                <option value="0" {{ old('feature') == '0' ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ old('feature') == '1' ? 'selected' : '' }}>Active</option>
                            </select>                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add Service Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

    });
</script>