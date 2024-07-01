@extends('admin.layouts.master')

@section('main_content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('bookingmanage.index', ['status' => 'pending']) }}">
            <div class="card text-white bg-warning">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        $<span class="count">{{ $pendingTotal }}</span>
                    </h4>
                    <p class="text-light">Pending ({{ $pendingCount }})</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('bookingmanage.index', ['status' => 'confirmed']) }}">
            <div class="card text-white bg-success">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        $<span class="count">{{ $confirmedTotal }}</span>
                    </h4>
                    <p class="text-light">Confirmed ({{ $confirmedCount }})</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('bookingmanage.index', ['status' => 'completed']) }}">
            <div class="card text-white bg-primary">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        $<span class="count">{{ $completedTotal }}</span>
                    </h4>
                    <p class="text-light">Complete ({{ $completedCount }})</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('bookingmanage.index', ['status' => 'cancelled']) }}">
            <div class="card text-white bg-danger">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        $<span class="count">{{ $cancelledTotal }}</span>
                    </h4>
                    <p class="text-light">Cancelled ({{ $cancelledCount }})</p>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection
