<!-- footer part starts -->
<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Services</h5>
                @foreach ($categories as $category)
                <a class="nav-link {{ request()->is('category-details/' . $category->id) ? 'active' : '' }}" href="{{ route('category.details', ['id' => $category->id]) }}">{{ $category->name }}</a>

                @endforeach            </div>
            <div class="col-md-4">
                <h5>Useful Links</h5>
                    <a class="nav-link {{ request()->is('hvac-installation') ? 'active' : '' }}" href="{{ route('hvacpage') }}">HVAC Installation</a>
                    <a class="nav-link {{ request()->is('civil-work') ? 'active' : '' }}" href="{{ route('civilpage') }}">Civil Work</a>
                    <a class="nav-link {{ request()->is('plumbing') ? 'active' : '' }}" href="{{ route('plumbingpage') }}">Plumbing</a>
                    <a class="nav-link {{ request()->is('book-online') ? 'active' : '' }}" href="{{ route('allservice') }}">Book Online</a>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Page</a>
                                <a href="tel:+{{ $settingsinfo->callnownumber }}" class="nav-link">Phone: {{ $settingsinfo->callnownumber }}</a>
                
                <p class="nav-link" >Email: {{ $settingsinfo->email }}</p>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 . All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>


<!-- footar part ends -->
    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('frontend/slider/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/js/popper.min.js')}}"></script>
    <!--<script src="js/particles.min.js"></script>-->
    <script src="{{ asset('frontend/js/app.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/custom.js')}}"></script>
    
    <script> 
        var owl = $('.owl-carousel');
            owl.owlCarousel({
                items:10,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true
            });
            $('.play').on('click',function(){
                owl.trigger('play.owl.autoplay',[1000])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
            })
    </script>
</body>
</html>