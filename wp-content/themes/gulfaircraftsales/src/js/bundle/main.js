var $ = require('jquery');
var foundation = require('foundation');
var slick = require('slick-carousel-browserify');
var Inventory = require('./aircraftselector');

//check to see if we are on the aircraft for sale page
if(typeof forsale !== 'undefined') {
	Inventory.ajaxCall();
	var selector = Inventory.el;
	selector.addEventListener('change', Inventory, false);
}

$(document).foundation();
new Foundation.OffCanvas($('.off-canvas-wrapper'), {transitionTime: 500});

var elem = new Foundation.Equalizer($('.equalizer'));


$( document ).ready( function( $ ) {
	
	$('#offCanvas').bind("opened.zf.offcanvas closed.zf.offcanvas", function(e) {
		$('#nav-icon').toggleClass('open');
	});
	
	$('.gallery__slick-carousel').slick({
		prevArrow: $('.hero-slick__prev'),
		nextArrow: $('.hero-slick__next'),
	});
	
	
	
	
	
	function showOverlay() {
		$('.hero-slick__overlay').fadeOut('slow');
		$('.hero-slick__show-overlay').fadeIn('slow');
	}
	
	function hideOverlay() {
		$('.hero-slick__overlay').fadeIn('slow');
		$('.hero-slick__show-overlay').fadeOut('slow');
	}
	
	$( '.js-control' )
		.on('click', showOverlay);
	
	$( '.hero-slick__show-overlay' )
		.on('click', hideOverlay);
		
	$( window ).resize(function() {
		if ($( window ).width() < 640) {
			$( '.js-control' )
				.off('click', showOverlay);
			$( '.hero-slick__show-overlay' )
				.off('click', hideOverlay);
		}
		
		if ($( window ).width() > 640) {
			$( '.js-control' )
				.on('click', showOverlay);
			
			$( '.hero-slick__show-overlay' )
				.on('click', hideOverlay);
		}
		
	});
		
	$('.js-toc').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 500);
	    return false;
	});
	
	var offset = $('.secondary-nav').offset().top;
	console.log(offset);
	$(document)
		.on('scroll', function() {
			
			if( $( document ).scrollTop() > offset && $('.secondary-nav').css('position') != 'fixed' ) {
				console.log($('.secondary-nav').css('position'));
				$( '.secondary-nav' )
					.css({ "position": "fixed", "top": "0", "left": "0", "width": "100%" })
			} else if( $( document ).scrollTop() <= offset && $('.secondary-nav').css('position') == 'fixed' ) {
				$( '.secondary-nav' ).css( 'position', 'relative' );
			}
			

		});
	
		
});

