@extends('frontend.layouts.master')

@section('content')
<!-- navbar part end -->
<style>
   #banner{
    background-image: url('{{ asset( $homeContent->section1image) }}');
    }
    .card-body{
        height: 750px;
        transition: box-shadow 0.3s ease;

    }
    .card-body:hover{
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);

    }
    .brand-image-custom{
        height: 100px;
    }
</style>
<!-- banner part start -->
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 bannerPart text-center">
                <span>{!! $homeContent->section1title !!}</span>
                <span>{!! $homeContent->section1subtitle !!}</span>
                <a href="{{ $homeContent->section1buttonlink }}" class="btn btn-dark btn-capsule">{{ $homeContent->section1buttontext }}</a>
            </div>
        </div>
    </div>
   
    </div>
</section>
<!-- banner part end -->
<section class="about-section">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-5 about-section-img">
                <img class="" src="{{ asset( $homeContent->section2image) }}" alt="">
            </div>
            <div class="col-md-6 ">
                <span class="mt-3">{!! $homeContent->section2title !!}</span>
                <span class="mt-3">{!! $homeContent->section2description !!}</span>
                <a href="tel:+{{ $settingsinfo->callnownumber }}" class="call-now btn btn-dark">Call Now</a>
            </div>
            
        </div>
    </div>
</section>
<section class="featured-section">
    <div class="container">
        <h1 class="text-center p-5">Featured Services
        </h1>
        <div class="row mb-4">
            @foreach($features as $feature)

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $feature->name }}</h3>
                        <br>
                        <img src="{{ asset( $feature->image) }}" class="card-img-top rounded-circle" alt="Circle Image 1">
                        <br>
                        <br>
                        <span class="card-text">Starting from: <strong class="custom-price">${{ $feature->price }}</strong></span>
                        <br><br>
                        <a href="{{ route('category.details', ['id' => $feature->id]) }}" class="btn btn-dark">View All</a>
                        <br><br>
                        <p class="card-text">{!! $feature->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach

          
        </div>
    </div>
</section>
<section class="brand-section pb-5">
    <div class="container">
        <h2 class="text-center p-5">Brands Serviced</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @foreach($brands as $brand)
                    <div class="col-md-2 mb-3 ">
                        <img class="brand-image-custom p-1" src="{{ asset($brand->image) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="details-section py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class=" p-2">{!! $homeContent->aboutservicetitle !!}</h2>
                <p class="">{!! $homeContent->aboutservicedescription !!}</p>
            </div>
        </div>
    </div>
</section>
<!-- service part starts -->
  
@endsection
