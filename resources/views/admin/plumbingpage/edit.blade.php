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
                    <strong>Edit Plumbing Page Content</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('plumbingpage.update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title" class="form-control-label">Title:</label>
                            <textarea id="title" name="title" class="form-control">{{ old('title', $plumbingPage->title) }}</textarea>
                        </div>
                      
                      
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $plumbingPage->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="book_link" class="form-control-label">Book Link:</label>
                            <input type="text" id="book_link" name="book_link" class="form-control" value="{{ old('book_link', $plumbingPage->book_link) }}">
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-control-label">Main Image:</label>
                            @if ($plumbingPage->image)
                                <p>Current Image:</p>
                                <img style="width:20%" src="{{ asset($plumbingPage->image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="service1title" class="form-control-label">Service 1 Title:</label>
                            <input type="text" id="service1title" name="service1title" class="form-control" value="{{ old('service1title', $plumbingPage->service1title) }}">
                        </div>

                        <div class="form-group">
                            <label for="service1description" class="form-control-label">Service 1 Description:</label>
                            <textarea id="service1description" name="service1description" class="form-control">{{ old('service1description', $plumbingPage->service1description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price1" class="form-control-label">Price 1:</label>
                            <textarea id="price1" name="price1" class="form-control">{{ old('price1', $plumbingPage->price1) }}</textarea>
                        </div>
                      
                        <div class="form-group">
                            <label for="service1image" class="form-control-label">Service 1 Image:</label>
                            @if ($plumbingPage->service1image)
                                <p>Current Image:</p>
                                <img style="width:20%" src="{{ asset($plumbingPage->service1image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="service1image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="service2title" class="form-control-label">Service 2 Title:</label>
                            <input type="text" id="service2title" name="service2title" class="form-control" value="{{ old('service2title', $plumbingPage->service2title) }}">
                        </div>

                        <div class="form-group">
                            <label for="service2description" class="form-control-label">Service 2 Description:</label>
                            <textarea id="service2description" name="service2description" class="form-control">{{ old('service2description', $plumbingPage->service2description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price2" class="form-control-label">Price 2:</label>
                            <textarea id="price2" name="price2" class="form-control">{{ old('price2', $plumbingPage->price2) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="service2image" class="form-control-label">Service 2 Image:</label>
                            @if ($plumbingPage->service2image)
                                <p>Current Image:</p>
                                <img style="width:20%" src="{{ asset($plumbingPage->service2image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="service2image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="service3title" class="form-control-label">Service 3 Title:</label>
                            <input type="text" id="service3title" name="service3title" class="form-control" value="{{ old('service3title', $plumbingPage->service3title) }}">
                        </div>

                        <div class="form-group">
                            <label for="service3description" class="form-control-label">Service 3 Description:</label>
                            <textarea id="service3description" name="service3description" class="form-control">{{ old('service3description', $plumbingPage->service3description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price3" class="form-control-label">Price 3:</label>
                            <textarea id="price3" name="price3" class="form-control">{{ old('price3', $plumbingPage->price3) }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="service3image" class="form-control-label">Service 3 Image:</label>
                            @if ($plumbingPage->service3image)
                                <p>Current Image:</p>
                                <img style="width:20%" src="{{ asset($plumbingPage->service3image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="service3image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="final_description" class="form-control-label">Final Description:</label>
                            <textarea id="final_description" name="final_description" class="form-control">{{ old('final_description', $plumbingPage->final_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Plumbing Page Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#service1description'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#service2description'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#service3description'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#final_description'))
            .catch(error => {
                console.error(error);
            });
    });
</script>

@endsection
