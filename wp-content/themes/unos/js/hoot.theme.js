jQuery(document).ready(function($) {
	"use strict";

	if( 'undefined' == typeof hootData )
		window.hootData = {};

	/*** Superfish Navigation ***/

	if( 'undefined' == typeof hootData.superfish || 'enable' == hootData.superfish ) {
		if (typeof $.fn.superfish != 'undefined') {
			$('.sf-menu').superfish({
				delay: 500,						// delay on mouseout 
				animation: {height: 'show'},	// animation for submenu open. Do not use 'toggle' #bug
				animationOut: {opacity:'hide'},	// animation for submenu hide
				speed: 200,						// faster animation speed 
				speedOut: 'fast',				// faster animation speed
				disableHI: false,				// set to true to disable hoverIntent detection // default = false
			});
		}
	}

	/*** Responsive Navigation ***/

	if( 'undefined' == typeof hootData.menuToggle || 'enable' == hootData.menuToggle ) {
		$( '.menu-toggle' ).click( function() {
			if ( $(this).parent().is('.mobilemenu-fixed') )
				$(this).parent().toggleClass( 'mobilemenu-open' );
			else
				$( this ).siblings( '.wrap, .menu-items' ).slideToggle();
			$( this ).toggleClass( 'active' );
		});
		$('body').click(function (e) {
			if (!$(e.target).is('.nav-menu *, .nav-menu'))
				$( '.menu-toggle.active' ).click();
		});
	}

	/*** JS Search ***/

	$('.js-search i.fa-search, .js-search .js-search-placeholder').each(function(){
		var $self = $(this),
			searchform = $self.parent('.searchform');
		$self.on('click', function(){
			searchform.toggleClass('expand');
			if ( searchform.is('.expand' ) ) {
				$self.siblings('input.searchtext').focus();
				searchform.closest('.js-search').addClass('hasexpand');
			} else {
				searchform.closest('.js-search').removeClass('hasexpand');
			}
		});
	});
	$('.js-search .searchtext').each(function(){
		var $self = $(this),
			searchform = $self.parent('.searchform');
		$self.on({
			focus: function() { searchform.addClass('expand').closest('.js-search').addClass('hasexpand'); },
			blur: function() { searchform.removeClass('expand').closest('.js-search').removeClass('hasexpand'); }
		});
	});

	/*** Responsive Videos : Target your .container, .wrapper, .post, etc. ***/

	if( 'undefined' == typeof hootData.fitVids || 'enable' == hootData.fitVids ) {
		if (jQuery.fn.fitVids)
			$("#content").fitVids();
	}

	/*** Theia Sticky Sidebar ***/

	if( 'undefined' == typeof hootData.stickySidebar || 'enable' == hootData.stickySidebar ) {
		if (jQuery.fn.theiaStickySidebar && $('.hoot-sticky-sidebar .main-content-grid > #content').length && $('.hoot-sticky-sidebar .main-content-grid > .sidebar').length) {
			var stickySidebarTop = 10;
			if ( $('.hoot-sticky-header #header').length )
				stickySidebarTop = 100;
			if( 'undefined' != typeof hootData && 'undefined' != typeof hootData.stickySidebarTop )
				stickySidebarTop = hootData.stickySidebarTop;
			$( '#content, #sidebar-primary, #sidebar-secondary' ).theiaStickySidebar({
				additionalMarginTop: stickySidebarTop,
			});
		}
	}

});