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
                    <strong>Edit Home Content</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('home-content.update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="section1title" class="form-control-label">Section 1 Title:</label>
                            <textarea id="section1title" name="section1title" class="form-control">{{ old('section1title', $homeContent->section1title) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="section1subtitle" class="form-control-label">Section 1 Subtitle:</label>
                            <textarea id="section1subtitle" name="section1subtitle" class="form-control">{{ old('section1subtitle', $homeContent->section1subtitle) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="section1buttontext" class="form-control-label">Section 1 Button Text:</label>
                            <input type="text" id="section1buttontext" name="section1buttontext" class="form-control" value="{{ old('section1buttontext', $homeContent->section1buttontext) }}">
                        </div>

                        <div class="form-group">
                            <label for="section1buttonlink" class="form-control-label">Section 1 Button Link:</label>
                            <input type="text" id="section1buttonlink" name="section1buttonlink" class="form-control" value="{{ old('section1buttonlink', $homeContent->section1buttonlink) }}">
                        </div>

                        <div class="form-group">
                            <label for="section1image" class="form-control-label">Section 1 Image:</label>
                            @if ($homeContent->section1image)
                                <p>Current Image:</p>
                                <img style="width:20%" src="{{ asset($homeContent->section1image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="section1image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="section2title" class="form-control-label">Section 2 Title:</label>
                            <textarea id="section2title" name="section2title" class="form-control">{{ old('section2title', $homeContent->section2title) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="section2description" class="form-control-label">Section 2 Description:</label>
                            <textarea id="section2description" name="section2description" class="form-control">{{ old('section2description', $homeContent->section2description) }}</textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label for="section2buttontext" class="form-control-label">Section 2 Button Text:</label>
                            <input type="text" id="section2buttontext" name="section2buttontext" class="form-control" value="{{ old('section2buttontext', $homeContent->section2buttontext) }}">
                        </div>

                        <div class="form-group">
                            <label for="section2buttonlink" class="form-control-label">Section 2 Button Link:</label>
                            <input type="text" id="section2buttonlink" name="section2buttonlink" class="form-control" value="{{ old('section2buttonlink', $homeContent->section2buttonlink) }}">
                        </div> --}}

                        <div class="form-group">
                            <label for="section2image" class="form-control-label">Section 2 Image:</label>
                            @if ($homeContent->section2image)
                                <p>Current Image:</p>
                                <img style="width:20%" src="{{ asset($homeContent->section2image) }}" alt="Current Image" class="img-fluid">
                            @endif
                            <input type="file" name="section2image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="aboutservicetitle" class="form-control-label">About Service Title:</label>
                            <textarea id="aboutservicetitle" name="aboutservicetitle" class="form-control">{{ old('aboutservicetitle', $homeContent->aboutservicetitle) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="aboutservicedescription" class="form-control-label">About Service Description:</label>
                            <textarea id="aboutservicedescription" name="aboutservicedescription" class="form-control">{{ old('aboutservicedescription', $homeContent->aboutservicedescription) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Home Content</button>
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
            .create(document.querySelector('#section1title'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#section1subtitle'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#section2title'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#section2description'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#aboutservicetitle'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#aboutservicedescription'))
            .catch(error => {
                console.error(error);
            });
    });
</script>

@endsection
