@extends('frontend.layouts.master')

@section('content')
<!-- navbar part end -->
<style>
   #banner{
    background-image: url('{{ asset( $homeContent->section1image) }}');
    }
    .card-body{
        height: 750px;
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
                        <a href="#" class="btn btn-dark">View All</a>
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
                    <div class="col-md-2 mb-3">
                        <img class="brand-image-custom" src="{{ asset($brand->image) }}" alt="">
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
    <section id="servicepart" class="">
        <div class="container">
            <div class="row commomGap servicePart">
                <div class="col-md-8 col-sm-12 serviceHeading commomHdeading">
                    <h2>eBooks</h2>
                    <p>eBooks have been and continue to be one of the most popular digital products for both creators and customers. They are relatively simple to produce since they require little more than written text and a few relevant images. eBooks are simple to distribute via large marketplaces or self-created online stores. They’re easily consumed by customers, who can read them on e-readers, tablets, computers, and even their mobile phones.

    The beauty of creating eBooks is that you can share almost anything you know, or are passionate about, in text form. You can educate, advise, or curate existing content with an eBook to then sell on your website.</p>
                </div>
                <div class="col-md-4 col-sm-12">
                        <div class="serviceImage">
                            <img src="{{ asset('frontend/images/ebook.jpg') }}">

                        </div>
                </div>
            </div>
        </div>
    </section>
    <section id="servicepart" class="">
        <div class="container">
            <div class="row commomGap servicePart"> 
                <div class="col-md-4 col-sm-12">
                    <div class="serviceImage">
                        <img src="{{ asset('frontend/images/video.jpg') }}">
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 serviceHeading commomHdeading">
                    <h2>Video</h2>
                    <p> 
                        Video is an extremely popular and effective format for delivering information online. Video content can be educational, informative, or entertaining. It’s significantly more engaging than text, and can be easily consumed by clicking a play button and watching. Users love video, and in many cases are happy to pay for it. If you’re a great public speaker, have a visual-based passion, or just love sharing your thoughts on video, with a little editing time up your sleeve you can sell videos online.
                    </p>
                </div>
            </div>
        </div>
    </section>
<!-- service part ends -->
<!-- <section id="section-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="banner-image-1">
                    <img src="images/photography.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section> -->
<section id="sectin-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-4">
                <div class="why-aff text-center">
                    <h4 class="mb-4">Why affworkmedia?</h4>
                    <p>affworkmedia shaped the CPA industry developing new technologies and better solutions. Offering the best platform and tools for CPA affilates.</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section id="count-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="count-header">
                    <center>
                        <h3>Last month on Aff Work Media</h3>
                    </center>
                </div>
                <div class="counters">
                    <div class="count-1">
                        <center>
                            <h4>250</h4>
                            <p>Countries </p>
                        </center>
                    </div>
                    <div class="count-2">
                        <center>
                            <h4>3,000</h4>
                            <p>Offers </p>
                        </center>
                    </div>
                    <div class="count-3">
                        <center>
                            <h4>5,000 M</h4>
                            <p>Hits </p>
                        </center>
                    </div>
                    <div class="count-4">
                        <center>
                            <h4>10,000 K</h4>
                            <p>Qualified leads </p>
                        </center>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<section id="sectin-7">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-4">
                <div class="why-aff">
                    <h4 class="mb-4">Global Next Gen Affiliate Network</h4>
                    <p>With offices and experienced teams in several strategic cities as well as business relationships all around the world, affworkmedia empowers Advertisers and Publishers to effectively develop their business worldwide.
                    </p>
                    <p>
                        We provide them with all the needed capabilities, resources and tools to evolve, and this, by collaborating with one single and effective self-serve platform focused on performance.
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
