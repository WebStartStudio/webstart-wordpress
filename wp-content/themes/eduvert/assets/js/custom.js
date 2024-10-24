(function ($) {
    'use strict';
	/*------------------------------------
       Sticky Menu 
   --------------------------------------*/
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 10) {
            $(".sticky-nav").removeClass("sticky-menu");
        } else {
            $(".sticky-nav").addClass("sticky-menu");
        }
    });
	
    $(".header-one .widget-social-widget ul li a,.footer-main .widget-social-widget ul li a").on({
            "mouseenter focusin": function () {
                var take_word =$(this).attr("class");
                var first_letter = take_word.charAt(0).toUpperCase();
                $(this).attr("data-letter",first_letter);
            },
            "mouseleave focusout": function () {
                //do noting
            }
        });
		
	
	$('.main-slider').owlCarousel({
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
    });

    $('.menubar, .widget_nav_menu').find('a').on('focus blur', function() {
      $( this ).parents('ul, li').toggleClass('focus');
    }); 

    $(".menu-toggle").on("click", function() {
      $mob_menu.addClass("header-menu-active");
      $mob_menu.addClass( "overlay-enabled" );
            mobileTrap($('.mobile-menu'));
    });


     //Mobile TRAP
    var mobileTrap = function (elem) {        
		$('.close-menu').focus();
		 var e, t, i, n = document.querySelector(".mobile-menu");
			let a = document.querySelector(".close-menu"),
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

    $(".menubar .menu-wrap").clone().appendTo(".mobile-menu");
    var $mob_menu = $("body");
    $(".close-menu").on("click", function() {
      $mob_menu.removeClass("header-menu-active");
      $mob_menu.removeClass( "overlay-enabled" );
          $(".menu-toggle").focus();
    });

    // scroll up
    var btn = $('#scrollup');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });

    $(".mobi_drop").on("click", function(e) {
        e.preventDefault();
        $(this).parent().toggleClass("current");
        $(this).next().slideToggle();
    });

    $(".menu-toggle").click(function(){
        $(".mobile-menu").css({
            "visibility":"visible",
            "display":"block"
        });
    });
    $(".close-style").click(function(){
      $(".mobile-menu").css({
            "display":"none"
        });
     });


    // Search Popup
    
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


    //Search TRAP
    var searchTrap = function (elem) {
        let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
        let firstTabbable = tabbable.first();
        let lastTabbable = tabbable.last();
        /set focus on first input/
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

}(jQuery));

