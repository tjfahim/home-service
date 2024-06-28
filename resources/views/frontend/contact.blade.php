@extends('frontend.layouts.master')

@section('content')
<!-- banner part start -->
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 bannerPart">
                <h1>Aff Work Media is a Digital solution for Freelancers.</h1>
                <p>We can help you to Send, Receive, Exchange, Shopping payment, or accept online payment easily on your personal account.
</p>
              <div>
                <a href="https://affworkmedia.com/apps/signup"><button class="btn logbtn btn-sm navbar-btn btn-round" style="cursor:pointer;">Sign Up </button></a>
                  <a href="https://affworkmedia.com/apps/login"><button class="btn logbtn btn-sm navbar-btn btn-round"><i class="fa fa-sign-in"></i> Log In</button></a>
              </div>  
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="bannerImage">
                    <img src="{{ asset('frontend/images/banimage.png') }}">

                </div>
            </div>
        </div>
    </div>
   
    </div>
</section>
<!-- banner part end -->

<!-- service part starts -->
    <section id="servicepart" class="commomGap">
        <div class="container">
            <div class="row commomGap servicePart">
                <div class="col-md-12 col-md-12 col-sm-12 serviceHeading commomHdeading servicePart">
                    <h2>Contact </h2>
                    <p>

</p>
                </div>
              
            </div>
        </div>
      
      
      
    </section>
<!-- service part ends -->
@endsection
