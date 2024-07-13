@extends('frontend.layouts.master')

@section('content')
<!-- navbar part end -->
<style>
   .banner{
    height: 250px; background-image: url('{{ asset($content->image) }}'); background-repeat: no-repeat; background-size: cover;
    margin-top: 120px;

    }
    .card-body{
        height: 750px;
    }
    .brand-image-custom{
        height: 100px;
    }
    .hover-card {
        transition: box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
</style>
<!-- banner part start -->
<section id="" class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 bannerPart pt-5 d-flex align-items-center justify-content-center text-center" style="">
                <h1>{!! $content->title !!}</h1>
            </div>
        </div>
    </div>
</section>


<section class="p-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-8">
                <div class="row">
                    <spna>{!! $content->description !!}</spna>
                </div>
                <br>
                <div class="col-12 m-3">
                    <a href="{{ route('category.details', ['id' => 3]) }}" class="call-now btn btn-dark">Book Now</a>
                </div>
                <div class="row my-5">
                    <div class="col-md-4 p-3 hover-card">
                        <div class="">
                            <div class="text-center">
                                <img src="{{ asset( $content->service1image) }}" class="card-img-top " alt="Image 1">
                                <br>
                                <br>
                                <h3 class="card-title">{{ $content->service1title}}</h3>
                                <h1 class="card-text">{{ $content->price1}}</h1>
                                <span class="card-title">{!! $content->service1description !!}</span>
                                <br>
                                <a href="{{ route('category.details', ['id' => 3]) }}" class="call-now btn btn-dark">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-3 hover-card">
                        <div class="">
                            <div class="text-center">
                                <img src="{{ asset( $content->service2image) }}" class="card-img-top " alt="Image 1">
                                <br>
                                <br>
                                <h3 class="card-title">{{ $content->service2title}}</h3>
                                <h1 class="card-text">{{ $content->price2}}</h1>
                                <span class="card-title">{!! $content->service2description !!}</span>
                                <br>
                                <a href="{{ route('category.details', ['id' => 3]) }}" class="call-now btn btn-dark">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-3 hover-card" >
                        <div class="">
                            <div class="text-center">
                                <img src="{{ asset( $content->service3image) }}" class="card-img-top " alt="Image 1">
                                <br>
                                <br>
                                <h3 class="card-title">{{ $content->service3title}}</h3>
                                <h1 class="card-text">{{ $content->price3}}</h1>
                                <span class="card-title">{!! $content->service3description !!}</span>
                                <br>
                                <a href="{{ route('category.details', ['id' => 3]) }}" class="call-now btn btn-dark">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br>
                    <div class="row pt-5">
                        <spna>{!! $content->final_description !!}</spna>
                    </div>
                    <br>
                    <div class="col-12">
                        <a href="{{ route('category.details', ['id' => 3]) }}" class="call-now btn btn-dark">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>



@endsection
