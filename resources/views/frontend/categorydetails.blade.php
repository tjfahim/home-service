@extends('frontend.layouts.master')

@section('content')
<!-- banner part start -->

<section class="categorydetails-section pb-5">
    <div class="container">
        <h2 class="text-center p-4 ">{{ $category->name }}</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row align-items-center py-3" style="border-bottom: 1px solid #000000;">
                </div>
                @forelse($services as $service)
    <div class="row align-items-center py-3" style="border-bottom: 1px solid #000000;">
        <!-- Circle Image -->
        <div class="col-md-2 text-center">
            <img src="{{ asset($service->image) }}" class="rounded-circle img-fluid" alt="{{ $service->title }}">
        </div>
        
        <!-- Title, Description, and View Link -->
        <div class="col-md-5">
            <h5>{{ $service->title }}</h5>
            <p>{{ $service->short_description }}</p>
            <a href="#" class="">View Details</a>
        </div>
        
        <!-- Price -->
        <div class="col-md-2 text-center">
            <h5>${{ $service->price }}</h5>
        </div>
        
        <!-- Order Now Button -->
        <div class="col-md-3 text-center">
            <a href="{{ route('service.booking', $service->id) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>
    
@empty
    <div class="row">
        <div class="col-md-12 text-center">
            <p>There are no services available.</p>
        </div>
    </div>
@endforelse
<div class="d-flex justify-content-end mb-3 mt-5">
    <a href="{{ route('allservice', $category->id) }}" class="btn btn-dark">View All Services</a>
</div>
            </div>
        </div>
    </div>
</section>
@endsection
