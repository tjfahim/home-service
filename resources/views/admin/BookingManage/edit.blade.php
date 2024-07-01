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
                    <strong>Update Booking</strong>
                    <a href="{{ route('bookingmanage.index') }}" class="btn btn-secondary">Back to Bookings</a>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('bookingmanage.update', $bookingManage->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                       
                        <div class="form-group">
                            <label for="" class="form-control-label">Name:</label>
                            <input type="text" name="" disabled class="form-control" value="{{  $bookingManage->service->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-control-label">Date:</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', $bookingManage->date) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="time" class="form-control-label">Time:</label>
                            <select name="time" id="selectedTime" class="form-control" required>
                                <option value="">Select Time</option>
                                <option value="Shift 1: 12AM - 11.59AM" {{ $bookingManage->time == 'Shift 1: 12AM - 11.59AM' ? 'selected' : '' }}>Shift 1: 12AM - 11.59AM</option>
                                <option value="Shift 2: 12PM - 11.59PM" {{ $bookingManage->time == 'Shift 2: 12PM - 11.59PM' ? 'selected' : '' }}>Shift 2: 12PM - 11.59PM</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $bookingManage->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $bookingManage->email) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-control-label">Phone:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $bookingManage->phone) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description:</label>
                            <textarea name="description" class="form-control">{{ old('description', $bookingManage->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ old('status', $bookingManage->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ old('status', $bookingManage->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ old('status', $bookingManage->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status', $bookingManage->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
