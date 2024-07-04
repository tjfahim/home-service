@extends('frontend.layouts.master')

@section('content')
<!-- banner part start -->

<style>
    .service-details-container {
    display: flex;
    justify-content: center; /* Center items horizontally */

}
.onepxcolor{
    border: 1px solid #d8d9db
}
.service-detail {
    border: 1px solid #000; /* Adjust border color and style as needed */
    padding: 10px 15px; /* Adjust padding as needed */
}
</style>
<div style="margin-top: 70px"></div>
<section class="categorydetails-section text-center pb-5">
    <div class="container">
        <h1 class="text-center p-3">{{ $service->title }}</h1>
        <p class="text-center ">{{ $service->short_description }}</p>
        <div class="service-details-container text-center">
            <span class="service-detail">{{ $service->price }}</span>
            <span class="service-detail">{{ $service->time_duration }}</span>
            <span class="service-detail">{{ $service->location }}</span>
        </div>
        
        <div class="mt-4 "><a href="{{ route('service.details', ['id' => $service->id]) }}" class="call-now btn btn-dark ">Book Now</a>
            </div>

            <div class="onepxcolor m-3"></div>
            <p class="text-center ">{!! $service->description !!}</p>

            <div class="onepxcolor m-3"></div>
            <p>
                Phone: {{ $settingsinfo->callnownumber }}

<p class="" >Email: {{ $settingsinfo->email }}</p>
Singapore
            </p>

            <div class="onepxcolor m-3"></div>
    </div>
</section>
@endsection
