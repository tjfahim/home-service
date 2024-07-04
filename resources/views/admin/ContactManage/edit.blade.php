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
                    <strong>Update Contact</strong>
                    <a href="{{ route('contactmanage.index') }}" class="btn btn-secondary">Back to Contacts</a>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('contactmanage.update', $contactManage->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                       
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $contactManage->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $contactManage->email) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-control-label">Phone:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $contactManage->phone) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-control-label">Address:</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $contactManage->address) }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea name="description" class="form-control">{{ old('description', $contactManage->description) }}</textarea>
                        </div>
                      
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
