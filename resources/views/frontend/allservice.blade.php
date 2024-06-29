@extends('frontend.layouts.master')

@section('content')
<!-- banner part start -->

<section class="categorydetails-section pb-5">
    <div class="container">
        <h2 class="text-center p-4">Our Services</h2>
        
        <!-- Nav Tabs for Categories -->
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                @foreach($categories as $category)
                    <a class="nav-link {{ $selectedCategory->id == $category->id ? 'active' : '' }}" id="nav-{{ $category->id }}-tab" href="{{ route('allservice', $category->id) }}" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="{{ $selectedCategory->id == $category->id ? 'true' : 'false' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </nav>
        <div class="row align-items-center py-3" style="border-bottom: 1px solid #000000;">
</div>
        
        <!-- Tab Content for Services -->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-{{ $selectedCategory->id }}" role="tabpanel" aria-labelledby="nav-{{ $selectedCategory->id }}-tab">
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
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                @empty
                    <div class="row">
                        <div class="col-md-12 mt-5 text-center">
                            <p>There are no services available.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
