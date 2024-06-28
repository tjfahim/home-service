particlesJS.load('particles-js', 'assets/particles.json', function() {
console.log('callback - particles.js config loaded');
});
$(function(){
    
// navbar bg when scroll    
$(window).scroll(function(){
    var scrolling = $(this).scrollTop();
    var sticky = $(".top");
    if(scrolling >=50){
        sticky.addClass("web_1723");
    }
    else{
        sticky.removeClass("web_1723");
    }
});
    
// veno box
    $('.venobox').venobox();

// wow js
new WOW().init();    
    
// scrollspy    
$('body').scrollspy({target: ".navbar", offset:80});    
    
//animation scroll js
    var html_body = $('html, body');
    $('nav a').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                html_body.animate({
                    scrollTop: target.offset().top - 75
                }, 1500);
                return false;
            }
        }
    });
    
    //back to top js
    
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.btn_back_top').fadeIn();
        } else {
            $('.btn_back_top').fadeOut();
        }
    });

    $('.btn_back_top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    
    // Preloader js    
    $(window).on('load', function(){
        $('.preloader').delay(1500).fadeOut(500);
    });
    
    
    
    // type js pluging 
    var TxtRotate = function(el, toRotate, period) {
      this.toRotate = toRotate;
      this.el = el;
      this.loopNum = 0;
      this.period = parseInt(period, 10) || 2000;
      this.txt = '';
      this.tick();
      this.isDeleting = false;
    };

        TxtRotate.prototype.tick = function() {
          var i = this.loopNum % this.toRotate.length;
          var fullTxt = this.toRotate[i];

          if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
          } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
          }

          this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

          var that = this;
          var delta = 300 - Math.random() * 100;

          if (this.isDeleting) { delta /= 2; }

          if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
          } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
          }

          setTimeout(function() {
            that.tick();
          }, delta);
        };

    window.onload = function() {
      var elements = document.getElementsByClassName('txt-rotate');
      for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
      }
      // INJECT CSS
      var css = document.createElement("style");
      css.type = "text/css";
      css.innerHTML = ".txt-rotate > .wrap { border-right: 1px solid #b90707 }";
      document.body.appendChild(css);
    };

});