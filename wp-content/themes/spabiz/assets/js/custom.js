(function($) {
  'use strict';
$(document).ready(function(){
	
	$('.home-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:true,
        autoplayHoverPause:true,
        autoplay:true,
		autoplayTimeout: 9000,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    }) 
	
	$('.category-main').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:false,
        autoplayHoverPause:true,
        autoplay:true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            575:{
                items:2
            },
            768:{
                items:3
            },
            1024:{
                items:4
            },
            1199:{
                items:6,
            }
        }
    });

   


    // ScrollUp
        $(window).on('scroll', function () {
          if ($(this).scrollTop() > 200) {
            $('.scrollingUp').addClass('is-active');
          } else {
            $('.scrollingUp').removeClass('is-active');
          }
        });
        $('.scrollingUp').on('click', function () {
          $("html, body").animate({
            scrollTop: 0
          }, 600);
          return false;
        });



        $(".mobi_drop").on("click", function(e) {
        e.preventDefault();
        $(this).parent().toggleClass("current");
        $(this).next().slideToggle();
    });

    $(".menu-collapsed").click(function(){
        $(".main-mobile-build").toggleClass("active")
    });

    $(".close-style").click(function(){
      $(".main-mobile-build").removeClass("active");
     });

    $(".header-above-collapse").click(function(){
        $(".header-above-bar").toggleClass("active");
    });

    
    $(".mobile-collapsed").on("click", function(e) {
        e.preventDefault();
        $(this).parent().toggleClass("current");
        $(this).next().slideToggle();
    });


    $(document).on('click','.header-search-toggle', function(e){
      $( "body" ).addClass( 'header-search-active' );
      $( "body" ).addClass( "overlay-enabled" );
      searchTrap($('.header-search-popup'));
    });

    $(document).on('click','.header-search-close', function(e){
        $( "body" ).removeClass('header-search-active');
        $( "body" ).removeClass( "overlay-enabled" );
        return this;
    });

    $(document).on('keyup', function(e){
      if (e.keyCode == 27) {
        $mob_menu.removeClass("header-menu-active");
        $mob_menu.removeClass( "overlay-enabled" );
        $( ".header-search-popup" ).removeClass('header-search-active');
      }
    });



    $('.main-mobile-build, .widget_nav_menu').find('a').on('focus blur', function() {
      $( this ).parents('ul, li').toggleClass('focus');
    }); 

    $(".menu-collapse-wrap").on("click", function() {
      $("body").addClass("header-menu-active");
     $("body").addClass( "overlay-enabled" );
            mobileTrap($('.main-mobile-wrapper'));
    });


    $(".header-above-btn").on("click", function() {
      $("body").addClass("header-menu-active");
     $("body").addClass( "overlay-enabled" );
            mobileTrap($('.header-above-bar'));
    });


    //Mobile TRAP
    var mobileTrap = function (elem) {        
		$('.header-close-menu').focus();
		 var e, t, i, n = document.querySelector(".main-mobile-build");
			let a = document.querySelector(".header-close-menu"),
				s = n.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),
				o = s[s.length - 1];
			if (!n) return !1;
			for (t = 0, i = (e = n.getElementsByTagName("a")).length; t < i; t++) e[t].addEventListener("focus", c, !0), e[t].addEventListener("blur", c, !0);

			function c() {
				for (var e = this; - 1 === e.className.indexOf("mobile-menu");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace(" focus", "") : e.className += " focus"), e = e.parentElement
			}
			document.addEventListener("keydown", function(e) {
				("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === a && (o.focus(), e.preventDefault()) : document.activeElement === o && (a.focus(), e.preventDefault()))
			})
    };

    //Search TRAP
    var searchTrap = function (elem) {
        let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
        let firstTabbable = tabbable.first();
        let lastTabbable = tabbable.last();
        /*set focus on first input*/
        firstTabbable.focus();
        //redirect last tab to first input/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });
        //redirect first shift+tab to last input/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });
    };


    

      // water ripple animation
    $(".funfact-section").ripples({
        resolution: 512,
        dropRadius: 20,
        // interactive: true,
        perturbance: 0.04,
    });


    // Sticky Header
        if ($(".is-sticky-on").length > 0) {
          $(window).on('scroll', function() {
            if ($(window).scrollTop() >= 250) {
                $('.is-sticky-on').addClass('is-sticky-menu');
            }
            else {
                $('.is-sticky-on').removeClass('is-sticky-menu');
            }
          });
        }

});
}(jQuery));

    

    