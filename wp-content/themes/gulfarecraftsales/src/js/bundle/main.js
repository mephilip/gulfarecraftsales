var $ = require('jquery');
var foundation = require('foundation');
$(document).foundation();
var aircraftselector = require('./aircraftselector');
var logger = require('./logger');

var selector = aircraftselector.el;
selector.addEventListener('change', aircraftselector, false);

new Foundation.OffCanvas($('.off-canvas-wrapper'), {transitionTime: 500});
$( document ).ready( function( $ ) {
	
	$('#offCanvas').bind("opened.zf.offcanvas closed.zf.offcanvas", function(e) {
		$('#nav-icon').toggleClass('open');
	});
	
});

