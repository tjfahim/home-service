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
                    <strong>Edit Settings</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('settings.update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title" class="form-control-label">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $settings->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="logo" class="form-control-label">Logo:</label>
                            @if ($settings->logo)
                                <p>Current Logo:</p>
                                <img style="width:20%" src="{{ asset($settings->logo) }}" alt="Current Logo" class="img-fluid">
                            @endif
                            <input type="file" name="logo" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="favicon" class="form-control-label">Favicon:</label>
                            @if ($settings->favicon)
                                <p>Current Favicon:</p>
                                <img style="width:20%" src="{{ asset($settings->favicon) }}" alt="Current Favicon" class="img-fluid">
                            @endif
                            <input type="file" name="favicon" class="form-control-file">
                        </div>

                        
                        <div class="form-group">
                            <label for="webtitle" class="form-control-label">Web Title:</label>
                            <input type="text" id="webtitle" name="webtitle" class="form-control" value="{{ old('webtitle', $settings->webtitle) }}">
                        </div>
                        <div class="form-group">
                            <label for="headercolor" class="form-control-label">Web Title:</label>
                            <input type="color" id="headercolor" name="headercolor" class="form-control" value="{{ old('headercolor', $settings->headercolor) }}">
                        </div>
                        <div class="form-group">
                            <label for="callnownumber" class="form-control-label">Call Now Number:</label>
                            <input type="text" id="callnownumber" name="callnownumber" class="form-control" value="{{ old('callnownumber', $settings->callnownumber) }}">
                        </div>

                        <div class="form-group">
                            <label for="whatsapp" class="form-control-label">WhatsApp:</label>
                            <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ old('whatsapp', $settings->whatsapp) }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-control-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $settings->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="opentime" class="form-control-label">Open Time:</label>
                            <input type="text" id="opentime" name="opentime" class="form-control" value="{{ old('opentime', $settings->opentime) }}">
                        </div>

                        <div class="form-group">
                            <label for="facebook" class="form-control-label">Facebook:</label>
                            <input type="text" id="facebook" name="facebook" class="form-control" value="{{ old('facebook', $settings->facebook) }}">
                        </div>

                        <div class="form-group">
                            <label for="twitter" class="form-control-label">Twitter:</label>
                            <input type="text" id="twitter" name="twitter" class="form-control" value="{{ old('twitter', $settings->twitter) }}">
                        </div>

                        <div class="form-group">
                            <label for="pinterest" class="form-control-label">Pinterest:</label>
                            <input type="text" id="pinterest" name="pinterest" class="form-control" value="{{ old('pinterest', $settings->pinterest) }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
