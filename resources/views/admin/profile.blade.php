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
    
    <div class="card-header mb-3">
            <h3>Profile Page</h3>
    </div>    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Update Profile</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('profile.update') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Change Password</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('profile.changePassword') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="current_password" class="form-control-label">Current Password:</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="form-control-label">New Password:</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
