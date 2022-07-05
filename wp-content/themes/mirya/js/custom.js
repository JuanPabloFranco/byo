(function($) {

    'use strict';

    var win = $(window),
        htmlBody = $("html, body"),
        scrollToTop = $(".scroll-top"),
        navBar = $(".navbar"),
        progressCheck = false,
        factsCheck = false;


    /*========== Loading  ==========*/
     win.on('load', function () {
        $(".preloader").animate({
            "top": "-100%"
        }, 700, function () {
            $(this).remove();
        });
    });

     /*========== Navbar Animation On Scroll  ==========*/
     function activeNavbar() {
        
        if (win.scrollTop() > 20) {
            navBar.addClass("active-nav");
        } else {
            navBar.removeClass("active-nav");
        }
        
    }
    
    activeNavbar();
    
    win.on("scroll", function () {
        activeNavbar();
    });

    /*========== Mobile Menu  ==========*/
    $(".navbar .menu-toggle").on("click", function () {
        navBar.toggleClass("menu-active");
    });

    $(".navbar .navbar-nav > li.menu-item-has-children").on("click", function () {
        $(this).find(".sub-menu").slideToggle();
    });

    $(".navbar .navbar-nav > li.menu-item-has-children > a").on("click", function (e) {
        e.preventDefault();
    });

    /*========== Contact Form Control  ==========*/
    $(".contact .contact-form .form-group .form-control").attr("value", "");
    $(".contact .contact-form .form-group .form-control").bind("focus",function() {
        $(this).parent().siblings("label").addClass("up");
        $(this).parent().siblings(".input-border").addClass("scale"); })
     .bind("blur",function() {
        $(this).parent().siblings("label").removeClass("up");
        $(this).parent().siblings(".input-border").removeClass("scale");
        if ($(this).attr("value") != "") {
            $(this).parent().siblings("label").addClass("up");
            $(this).parent().siblings(".input-border").addClass("scale");
        }
     });

     $(".contact .contact-form .form-group .form-control").on("keyup",function() {
        $(this).attr("value", $(this).val());
     });

     /*========== Portfolio Filter  ==========*/
     $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });
    
    $(".portfolio-filter li").on("click", function () {
        $(this).addClass("active").siblings("li").removeClass("active");
        var dataFilter = $(this).attr('data-filter');
        $('.grid').isotope({
            filter: dataFilter
        });
    });

    /*========== Facts Counter  ==========*/
    if (!factsCheck && $(this).scrollTop() >= $(".facts").offset().top - 400) {
        $(".facts .fact-number").countTo();
        factsCheck = true;
    }
    
    win.on("scroll", function () {
        if (!factsCheck && $(this).scrollTop() >= $(".facts").offset().top - 400) {
            $(".facts .fact-number").countTo();
            factsCheck = true;
        }
    });

    /*========== Owl Carousel Js Testimonial  ==========*/
    $("#testimonial-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        singleItem : true,
        pagination: true,
        transitionStyle: "backSlide",
        autoPlay: true
    });

})(jQuery);