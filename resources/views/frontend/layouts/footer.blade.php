<!-- footer part starts -->
<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Section 1</h5>
                <p>Content for Section 1</p>
            </div>
            <div class="col-md-4">
                <h5>Section 2</h5>
                <p>Content for Section 2</p>
            </div>
            <div class="col-md-4">
                <h5>Section 3</h5>
                <p>Content for Section 3</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Your Company. All Rights Reserved.</p>
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