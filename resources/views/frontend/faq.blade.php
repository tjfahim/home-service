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
                    <img id="logoPreview" src="{{ asset('frontend/images/banimage.png') }}" alt="Default Image">
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
                    <h2>FAQ</h2>
                    <p>
How do I sign up? <br>
To become an affiliate or merchant, please visit our signup page. https://affworkmedia.com <br><br>




How long does it take for my account to be approved? <br>

When you sign up, a dedicated affiliate manager reviews your application, normally within 48 hours. AdCenter reserves the right to refuse applications at its discretion. <br><br>


Do you accept email marketing campaigns?<br>

Yes.  However, we have do not tolerate spamming and have the right to suspend accounts if they are found to be violating anti-spam laws.<br><br>



I don't have a website yet. Can I still apply to the affiliate program?<br>

Yes, in addition to webmasters we also work with other online marketers. We can help put together the content you need to assemble your website or help plan your advertising strategy. <br><br>


When I earn a commission, how soon will it be reflected in my account?<br>

Your reports are updated every 5-10 minutes.<br><br>


When will I get paid?<br>


Payments will be made on a bi-weekly schedule: from the 1st to the 15th of each month and from the 16th to the end of each month. Payments are sent within five business days at the end of the next payment period. All payments will be made in US Dollars.<br><br>

Is there a minimum I have to earn before I can get paid?<br>


The minimum payout amount depends on the payment method you've selected. If you've not reached the minimum payout amount, your earnings are carried over until the next pay period until the minimum payout is reached.<br><br>

The minimum payout for each payment is as follows:<br>

$100: PayPal<br>

$100 payoneer<br><br><br>

What are the affworkmedia advertising policies?<br><br>


1.User Information provided upon signup must be accurate and true.<br>
2.Domain information must be accurate and represent your business.<br>
3.User information must be true and validated.<br>
4.Payment details must be accurate.<br>
5.No Duplicate accounts are permitted.<br>
6.All user account information must be valid.<br>
7.No Prohibited content is allowed (adult, terrorism, copyrighted material).<br>
8.All websites advertising our programs MUST have a Contact Us page on each<br> website promoting ad-center products.<br>
9.All websites advertising our programs MUST have a clear DMCA page on each website promoting ad-center products that must include contact information (email) or link to contact page.<br>
10.All websites must have a purpose to exist such as a homepage with sub-pages. Isolated Landing Pages with no homepage are prohibited.<br>
11.All websites must have a clear and valid logo which represents the website's’ niche.<br>
12.Affiliates are not allowed to mimic functions of a site nor imitate advertiser - copy or clone any elements of advertisers promotional elements and/or landing pages which include any of the following:<br>
affworkmedia prohibits the use of signup button(s) and/or signup hyperlink directly links to our Advertiser's website.<br>
Incentivized, non-compliant advertising tactics and/or wall offers are forbidden.<br>
13.Affiliates are not allowed to make false claims or mislead visitors to click on ads or links nor use any tactics promising content, encouraging clicks or displaying unnatural attention towards AdCenter offers.<br>
                    </p>
                </div>
              
            </div>
        </div>
      
      
      
    </section>
<!-- service part ends -->
@endsection
