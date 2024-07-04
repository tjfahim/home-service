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
                    <strong>All Contacts</strong>
                </div>
                <div class="card-body card-block">
                   
                    @if ($contactManages->isEmpty())
                        <p>No contacts available.</p>
                    @else
                        <table id="contact_manage_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactManages as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->description }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                        <td>
                                            <a href="{{ route('contactmanage.edit', $contact->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('contactmanage.destroy', $contact->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this contact?');">
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
        $('#contact_manage_table').DataTable({
            "order": [[6, 'desc']],
            "pageLength": 10,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "searching": true,
            "paging": true
        });
    });
</script>

@endsection
