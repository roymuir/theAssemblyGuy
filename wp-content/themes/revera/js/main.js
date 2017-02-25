/*

	Main.js

	01. Side menu
	02. Horizontal menu
	03. Process slider
	04. Quote slider
	05. Image slider
	06. Services slider
	07. Work slider
	08. Thumbnail slider
	09. Employee slider
	10. Grab function
	11. Contact form
	12. Magnific popup
	13. Equal height
	14. fitVids
	15. MixItUp
	16. Background and content slider
	17. Background slider

*/


jQuery(document).ready(function ($) {
	
	"use strict";
	
	/* ==================== 01. Side menu ==================== */
	// Smooth scroll and auto close the menu
	$('a[href^="#"]').bind('click.scrollto',function (e) {
		e.preventDefault();

		var target = this.hash,
		$target = $(target);

		if($target.offset() == undefined) return;

		$('html, body').stop().animate({
			'scrollTop': $target.offset().top-0
		}, 900, 'swing').promise().done(function(){
			if($('body').hasClass('body-push') && $('.menu-open').length > 0){
				$('#toggle-left, #toggle-right').click();
			}
			window.location.hash = target;
		});
	});

	// Menu settings for displaying the menu on the right
	$('#toggle-right, .menu-close').on('click', function(){
		$('#toggle-right').toggleClass('active');
		$('body').toggleClass('body-push-toleft');
		$('#theMenu').toggleClass('menu-open');
	});

	// Menu settings for displaying the menu on the left
	$('#toggle-left, .menu-close-left').on('click', function(){
		$('#toggle-left').toggleClass('active');
		$('body').toggleClass('body-push-toright');
		$('#theMenu').toggleClass('menu-open');
	});

	// Display a light toggle on the home section and the subheaders
	$(window).on("load resize",function(e){
		
		if ($(".home, .subheader")[0]) {
			var startY = $('.home, .subheader').position().top + $('.home, .subheader').outerHeight() - 30;
			
			$(window).scroll(function(){
				checkY(startY);
			});
			
			checkY(startY);
		}
		
	});
	
	function checkY(startY){
		if( $(window).scrollTop() > startY ){
			$('#toggle-right, #toggle-left').removeClass('toggle-light');
		}else{
			$('#toggle-right, #toggle-left').addClass('toggle-light');
		}
	}

	/* ==================== 02. Horizontal menu ==================== */
	$(function(){
		$('#toggle').click(function (e){
			e.stopPropagation();
		});
		$('html').click(function (e){
			if (!$('.toggle').is($(e.target))){
				$('#toggle').prop("checked", false);
			}
		});
	});

	// Show the horizontal menu after scrolling the page
	$(window).bind("scroll", function() {
		if ($(this).scrollTop() > 200) {
			$(".menu-horizontal").removeClass("mh-hide").addClass("mh-show");
		} else {
			$(".menu-horizontal").removeClass("mh-show").addClass("mh-hide");
		}
	});


	/* ==================== 05. Image slider ==================== */
	if ($(".img-slider")[0]) {
		$('.img-slider').bxSlider({
			mode: 'fade',
			pager: true,
			controls: true,
			nextText: '<i class="fa fa-long-arrow-right"></i>',
			prevText: '<i class="fa fa-long-arrow-left"></i>'
		});
	}

	/* ==================== 06. Services slider ==================== */
	if ($(".services-slider")[0]) {
		$(".services-slider").owlCarousel({
			pagination: false,
			navigation: false,
			items: 3,
			itemsDesktop: [1024,3],
			itemsTablet: [768,2],
			itemsMobile: [321,1]
		});
	}

	/* ==================== 07. Work slider ==================== */
	if ($(".work-slider")[0]) {
		$(".work-slider").owlCarousel({
			pagination: false,
			navigation: false,
			items: 3,
			itemsDesktop: [1024,3],
			itemsTablet: [768,2],
			itemsMobile: [321,2]
		});
	}

	/* ==================== 08. Thumbnail slider ==================== */
	if ($(".tn-slider")[0]) {
		$(".tn-slider").owlCarousel({
			pagination: false,
			navigation: false,
			items: 3,
			itemsDesktop: [1024,3],
			itemsTablet: [768,2],
			itemsMobile: [321,2]
		});
	}

	/* ==================== 10. Grab function ==================== */
	$(function(){
		$(".grab").mouseup(function(){
			$(".grab").css("cursor","grab");
		}).mousedown(function(){
			$(".grab").css("cursor","grabbing");
		}).mouseleave(function(){
			$(".grab").css("cursor","grab");
		});
	});

	
	// Form popup
	if ($(".popup-form")[0]) {
		
		$('.popup-form').magnificPopup({ 
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: false,
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
	}
	
	// Form placeholders
	$('input, textarea').placeholder();


	/* ==================== 12. Magnific popup ==================== */
	// Image popup
	if ($(".popup")[0]) {
		$('.popup').magnificPopup({ 
			type: 'image',
			fixedContentPos: false,
			fixedBgPos: false,
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
	}

	// YouTube, Vimeo and Google Maps popup
	if ($(".popup-iframe")[0]) {
		$('.popup-iframe').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			fixedContentPos: false,
			fixedBgPos: false,
			removalDelay: 300,
			mainClass: 'mfp-fade',
			preloader: false
		});
	}
	
	// Gallery popup - Use this class to create a gallery where every thumbnail or link is visible
	if ($(".popup-gallery")[0]) {
		$('.popup-gallery').magnificPopup({
			type: 'image',
			gallery:{
				enabled:true
			},
			fixedContentPos: false,
			fixedBgPos: false,
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
	}

	// Gallery link - Use the gallery-link to create a link to a gallery
	$('.gallery-link').on('click', function () {
		$(this).next().magnificPopup('open');
	});

	// Gallery - Add every image you want to become visible in a popup inside a div with the gallery class
	if ($(".gallery")[0]) {
		$('.gallery').each(function () {
			$(this).magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
					enabled: true,
					navigateByImgClick: true
				},
				fixedContentPos: false,
				fixedBgPos: false,
				removalDelay: 300,
				mainClass: 'mfp-fade'
			});
		});
	}


	/* ==================== 13. Equal height ==================== */
	// Use the .equal class on a row if you want the columns to be equal in height
	$('.equal').children('.col').equalizeHeight();
	$(window).resize( function() {
		$('.equal').children('.col').equalizeHeight();
		setTimeout(function(){
			$('.equal').children('.col').equalizeHeight();
		},100);
		setTimeout(function(){
			$('.equal').children('.col').equalizeHeight();
		},400);
		setTimeout(function(){
			$('.equal').children('.col').equalizeHeight();
		},1400);
		setTimeout( function() {
			$('.equal').children('.col').equalizeHeight();
		},2400);
	});
	setTimeout(function(){
		$(window).trigger('resize scroll');
	},1000);
	setTimeout(function(){
		$(window).trigger('resize scroll');
	},3000);
	$(window).load(function(){
		$('.equal').children('.col').equalizeHeight();
		$(window).trigger('resize scroll');
		setTimeout(function(){
			$('.equal').children('.col').equalizeHeight();
		},1000);
		setTimeout(function(){
			$('.equal').children('.col').equalizeHeight();
		},1300);
	});


	/* ==================== 14. fitVids ==================== */
	$(".responsive-video").fitVids();


	/* ==================== 16. Background and content slider ==================== */
	if ($(".bg-content-slider")[0]) {
		$('.bg-content-slider').superslides({
			animation: 'fade' // Choose between 'fade' or 'slide'
		});
	}


	/* ==================== 17. Background slider ==================== */
	if ($(".bg-slider")[0]) {
		$('.bg-slider').superslides({
			play: 5000, // 5 seconds between each slide
			animation_speed: 1500, // 1.5 seconds transition speed
			pagination: false, // Hiding the pagination bullets
			animation: 'fade' // Choose between 'fade' or 'slide'
		});
	}
		
	/* ==================== isDesktop  ==================== */
	var isDesktop = (function() {
		return !('ontouchstart' in window) // works on most browsers 
		|| !('onmsgesturechange' in window); // works on ie10
	})();
	window.isDesktop = isDesktop;

});