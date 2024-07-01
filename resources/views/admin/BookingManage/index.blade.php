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
                    <strong>All Bookings</strong>
                </div>
                <div class="card-body card-block">
                    <div class="mb-3">
                        <form action="{{ route('bookingmanage.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-3">
                                <label for="status" class="mr-2">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="all">All</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <div class="form-group mr-3">
                                <label for="sort_by" class="mr-2">Sort By:</label>
                                <select name="sort_by" id="sort_by" class="form-control">
                                    <option value="created_at-desc" {{ request('sort_by') == 'created_at-desc' ? 'selected' : '' }}>Created At (Newest First)</option>
                                    <option value="created_at-asc" {{ request('sort_by') == 'created_at-asc' ? 'selected' : '' }}>Created At (Oldest First)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </form>
                    </div>
                    @if ($bookingManages->isEmpty())
                        <p>No bookings available.</p>
                    @else
                        <table id="booking_manage_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookingManages as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->service->title }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->time }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->service->price }}</td>
                                        <td style="color: 
                                            @if($booking->status == 'pending') orange;
                                            @elseif($booking->status == 'confirmed') green;
                                            @elseif($booking->status == 'completed') blue;
                                            @elseif($booking->status == 'cancelled') red;
                                            @else black;
                                            @endif">
                                            {{ ucfirst($booking->status) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('bookingmanage.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('bookingmanage.destroy', $booking->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this booking?');">
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
        $('#booking_manage_table').DataTable({
            "order": [
                @if(request('sort_by') == 'created_at-asc')
                    [2, 'asc']
                @else
                    [2, 'desc']
                @endif
            ],
            "pageLength": 10,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "searching": true,
            "paging": true
        });
    });
</script>

@endsection
