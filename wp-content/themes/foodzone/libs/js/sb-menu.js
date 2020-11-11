// JavaScript Document
/**
	sb - HTML header navigation menu - v1.3.1
 	Copyright (c) 2019, Pophonic
	
	Author: Pophonic
	Profile: https://codecanyon.net/user/pophonic
	
**/


(function($) {
	
	"use strict";
	
	/* ========== Sticky on scroll ========== */
	function stickyNav() {

		var scrollTop = $(window).scrollTop(),
			noSticky = $('.no-sticky'),
			viewportSm = $('.viewport-sm'),
			viewportLg = $('.viewport-lg'),
			viewportLgBody = viewportLg.parent('body'),
			viewportLgNosticky = $('.viewport-lg.no-sticky'),
			viewportLgNostickyBody = viewportLgNosticky.parent('body'),
			viewportLgLogo = viewportLg.find('.logo img'),
			viewportLgNostickyLogo = viewportLgNosticky.find('.logo img'),
			headerTransparentLg = $('.viewport-lg.header-transparent'),
			headerTransparentLgNosticky = $('.viewport-lg.header-transparent.no-sticky'),
			headerTransparentLgBody = headerTransparentLg.parent('body'),
			headerOpacityLg = $('.viewport-lg.header-opacity'),
			headerOpacityLgNosticky = $('.viewport-lg.header-opacity.no-sticky'),
			headerOpacityLgBody = headerOpacityLg.parent('body');

		if (scrollTop > sbHeaderHeight) {
			sbHeader.addClass('sticky');
			viewportLgLogo.attr('src', stickyLogoSrc);
			viewportLgNostickyLogo.attr('src', logoSrc);
			headerTransparentLg.removeClass('header-transparent-on');
			headerOpacityLg.removeClass('header-opacity-on');
			headerTransparentLgNosticky.addClass('header-transparent-on');
			headerOpacityLgNosticky.addClass('header-opacity-on');
			viewportLgBody.css("margin-top", sbHeaderHeight);
			viewportLg.css("margin-top", -sbHeaderHeight);
		} else {
			sbHeader.removeClass('sticky');
			viewportLgLogo.attr('src', logoSrc);
			headerTransparentLg.addClass('header-transparent-on');
			headerOpacityLg.addClass('header-opacity-on');
			viewportLgBody.add(viewportLg).css("margin-top", "0");
		}

		noSticky.removeClass('sticky');
		viewportSm.removeClass('sticky');
		
		headerTransparentLg.add(headerTransparentLgBody).add(headerOpacityLg).add(headerOpacityLgBody).add(viewportLgNostickyBody).add(viewportLgNosticky).css("margin-top", "0");

		var logoCenterWidth = $('.logoCenter .logo img').width(),
			menuCenterOneWidth = $('.center-menu-1 .sb-menu').width(),
			menuCenterOneListMenu = $('.center-menu-1 .sb-menu > ul'),
			menuCenterOneListWidth = menuCenterOneWidth - logoCenterWidth;

		if ($(window).width() < 1200) {
			menuCenterOneListMenu.outerWidth( menuCenterOneWidth );
		} else {
			menuCenterOneListMenu.outerWidth( menuCenterOneListWidth / 2 );
		}

		$('.logoCenter').width(logoCenterWidth);
		
	}

	/* ========== Menu overlay transition ========== */
	function overlayMenuTransition() {
		var overlayMenuFirst = $('.sb-menu-overlay > ul > li:first-child'),
			overlayMenuList = $('.sb-menu-overlay > ul > li');

		overlayMenuFirst.attr('data-delay', '0');

		overlayMenuList.each(function(){
			var $this = $(this),
				overlayMenuNext = $this.next('li'),
				menuDataDelay = $this.attr('data-delay'),
				menuDataDelayNext = parseInt(menuDataDelay) + parseInt('100');

			overlayMenuNext.attr('data-delay', menuDataDelayNext);

			$this.delay(menuDataDelay).queue(function(next) {
				$(this).addClass("menuSlideIn");
				next();
			});
		});
	}

	/* ========== Horizontal navigation menu ========== */
	if ($('.sb-header').length) {

		var sbHeader = $('.sb-header'),
			sbHeaderHeight = sbHeader.height(),
			logo = sbHeader.find('.logo'),
			logoImg = logo.find('img'),
			logoSrc = logoImg.attr('src'),
			logoClone = logo.clone(),
			mobileLogoSrc = logo.data('mobile-logo'),
			stickyLogoSrc = logo.data('sticky-logo'),
			burgerMenu = sbHeader.find('.burger-menu'),
			sbMenuListWrapper = $('.sb-menu > ul'),
			sbMenuListDropdown = $('.sb-menu ul li:has(ul)'),
			headerShadow = $('.sb-header.header-shadow'),
			headerTransparent = $('.sb-header.header-transparent'),
			headerOpacity = $('.sb-header.header-opacity'),
			megaMenuFullwidthContainer = $('.mega-menu-fullwidth .mega-menu-container');

		/* ========== Center menu 1 ========== */
		$('.center-menu-1 .sb-menu > ul:first-child').after('<div class="logoCenter"></div>');
		$('.logoCenter').html(logoClone);

		/* ========== Mega menu fullwidth wrap container ========== */
		megaMenuFullwidthContainer.each(function(){
			$(this).children().wrapAll('<div class="mega-menu-fullwidth-container"></div>');
		});

		/* ========== Window resize ========== */
		$(window).on("resize", function() {

			var megaMenuContainer = $('.mega-menu-fullwidth-container');

			if ($(window).width() < 1200) {

				logoImg.attr('src', mobileLogoSrc);
				sbHeader.removeClass('viewport-lg');
				sbHeader.addClass('viewport-sm');
				headerTransparent.removeClass('header-transparent-on');
				headerOpacity.removeClass('header-opacity-on');
				megaMenuContainer.removeClass('container');

			} else {

				logoImg.attr('src', logoSrc);
				sbHeader.removeClass('viewport-sm');
				sbHeader.addClass('viewport-lg');
				headerTransparent.addClass('header-transparent-on');
				headerOpacity.addClass('header-opacity-on');
				megaMenuContainer.addClass('container');

			}

			stickyNav();

		}).resize();

		/* ========== Dropdown Menu Toggle ========== */
		burgerMenu.on("click", function(){
			$(this).toggleClass('menu-open');
			sbMenuListWrapper.slideToggle(300);
		});
		
		sbMenuListDropdown.each(function(){
			$(this).append( '<span class="dropdown-plus"></span>' );
			$(this).addClass('dropdown_menu');
		});
		
		$('.dropdown-plus').on("click", function(){
			$(this).prev('ul').slideToggle(300);
			$(this).toggleClass('dropdown-open');
		});
		
		$('.dropdown_menu a').append('<span></span>');

		/* ========== Added header shadow ========== */
		headerShadow.append('<div class="header-shadow-wrapper"></div>');

		/* ========== Sticky on scroll ========== */
		$(window).on("scroll", function() {
			stickyNav();
		}).scroll();

		/* ========== Menu hover transition ========== */
		var listMenuHover4 = $('.sb-menu.menu-hover-4 > ul > li > a');
		listMenuHover4.append('<div class="hover-transition"></div>');

	}

	/* ========== Overlay navigation menu ========== */
	if ($('.sb-header-overlay').length) {

		var sbHeaderOverlay = $('.sb-header-overlay'),
			sbMenuOverlay = $('.sb-menu-overlay'),
			burgerMenuOverlay = sbHeaderOverlay.find('.burger-menu'),
			lineMenuOverlay = sbHeaderOverlay.find('.line-menu'),
			menuOverlayLogo = sbHeaderOverlay.find('.logo'),
			overlayLogoClone = menuOverlayLogo.clone(),
			menuWrapperLogoSrc = menuOverlayLogo.data('overlay-logo'),
			menuOverlayListDropdown = $('.sb-menu-overlay > ul > li:has(ul)'),
			menuOverlayLink = $('.sb-menu-overlay > ul > li > a'),
			menuSlide = $('.sb-header-overlay.menu-slide'),
			menuSlideSubmenuLink = menuSlide.find('.sb-menu-overlay > ul ul a'),
			menuSlideSubmenuDropdown = menuSlide.find('.sb-menu-overlay > ul > li > ul li:has(ul)'),
			menuSocialMedia = sbMenuOverlay.next('.menu-social-media'),
			submenuVerticalListItem = $('.submenu-vertical > ul > li > ul li:has(ul)'),
			submenuVerticalLink = $('.submenu-vertical > ul > li > ul a');

		lineMenuOverlay.wrapAll('<span></span>');
		menuOverlayLink.wrap('<div class="menu-overlay-link"></div>');
		submenuVerticalLink.wrap('<div class="menu-overlay-link"></div>');
		menuSlideSubmenuLink.wrap('<div class="menu-overlay-link"></div>');

		/* ========== Submenu Toggle ========== */
		menuOverlayListDropdown.each(function(){
			var menuOverlayDropdownLink = $(this).children('.menu-overlay-link');
			menuOverlayDropdownLink.prepend( '<span class="overlay-dropdown-plus"></span>' );
			$(this).addClass('overlay_dropdown_menu');
		});

		submenuVerticalListItem.each(function(){
			var submenuVerticalDropdownLink = $(this).children('.menu-overlay-link');
			submenuVerticalDropdownLink.prepend( '<span class="overlay-dropdown-plus"></span>' );
			$(this).addClass('overlay_dropdown_menu');
		});

		menuSlideSubmenuDropdown.each(function(){
			var submenuVerticalDropdownLink = $(this).children('.menu-overlay-link');
			submenuVerticalDropdownLink.prepend( '<span class="overlay-dropdown-plus"></span>' );
			$(this).addClass('overlay_dropdown_menu');
		});

		$('.overlay_dropdown_menu > ul').addClass('overlay-submenu-close');
		
		$('.overlay-dropdown-plus').on("click", function(){
			var $thisParent = $(this).parent('.menu-overlay-link');
			$thisParent.next('ul').slideToggle(300).toggleClass('overlay-submenu-close');
			$(this).toggleClass('overlay-dropdown-open');
		});

		sbMenuOverlay.add(menuSocialMedia).wrapAll('<div class="nav-menu-wrapper"></div>');

		var overlayNavMenuWrapper = $('.nav-menu-wrapper');

		overlayNavMenuWrapper.prepend(overlayLogoClone);
		overlayNavMenuWrapper.find('.logo img').attr('src', menuWrapperLogoSrc);

		var menuOverlayHover = $('.sb-menu-overlay > ul > .overlay_dropdown_menu > ul');

		menuOverlayHover.each(function(){
			$(this).on("mouseenter", function () {
				$(this).parents("li").addClass("overlay-menu-hover");
			});
			$(this).on("mouseleave", function () {
				$(this).parents("li").removeClass("overlay-menu-hover");
			});
		});

		/* ========== Menu overlay open ========== */
		burgerMenuOverlay.on("click", function(){

			var overlayMenuList = $('.sb-menu-overlay > ul > li');

			$(this).toggleClass('menu-open');
			overlayNavMenuWrapper.toggleClass('overlay-menu-open');
			overlayMenuList.removeClass("menuSlideIn");
			
			if ($(this).hasClass("menu-open")) {
				overlayMenuTransition();
				overlayMenuList.removeClass("menuSlideOut").addClass("menuFade");
			}

			if (!$(this).hasClass("menu-open")) {
				overlayMenuList.addClass("menuSlideOut").removeClass("menuFade");
			}

		});

		/* ========== Menu slide settings ========== */
		var menuSlideNavWrapper = menuSlide.find('.nav-menu-wrapper'),
			menuSlideNavLogo = menuSlideNavWrapper.find('.logo');

		if (sbHeaderOverlay.hasClass('menu-slide')){
			sbHeaderOverlay.removeClass('overlay-center-menu');
		}

		menuSlideNavLogo.remove();
		menuSlideNavWrapper.after('<div class="slidemenu-bg-overlay"></div>');

		$('.slidemenu-bg-overlay').on("click", function(){
			menuSlideNavWrapper.removeClass('overlay-menu-open');
			burgerMenuOverlay.removeClass('menu-open');
		});

	}

	/* ========== Fixed sidebar menu ========== */
	if ($('.sb-fixed-sidebar').length) {
		var sbFixedSidebar = $('.sb-fixed-sidebar'),
			sbMenuFixed = $('.sb-menu-fixed'),
			sbSideContent = $('.sb-side-content'),
			logoFixedSidebar = sbFixedSidebar.find('.logo'),
			logoClone = logoFixedSidebar.clone(),
			burgerMenuFixedSidebar = sbFixedSidebar.find('.burger-menu'),
			burgerMenuDetach = burgerMenuFixedSidebar.detach(),
			sbFixedDropdown = sbMenuFixed.find('li:has(ul)');

		sbFixedSidebar.parent('body').addClass('body-fixed-sidebar');
		sbFixedSidebar.after('<div class="fixedsidebar-bg-overlay"></div>').after(burgerMenuDetach);
		sbSideContent.prepend(logoClone);

		$('.sb-fixed-sidebar .logo, .sb-menu-fixed').wrapAll('<div class="fixed-menu-wrap"></div>');

		var burgerMenuMove = sbFixedSidebar.next('.burger-menu'),
			fixedSidebarlineMenu = burgerMenuMove.find('.line-menu');

		fixedSidebarlineMenu.wrapAll('<span></span>');

		/* ========== Side menu open on mobile ========== */
		burgerMenuMove.on("click", function(){
			$(this).toggleClass('menu-open');
			sbFixedSidebar.toggleClass('fixed-sidebar-open');
		});

		$('.fixedsidebar-bg-overlay').on("click", function(){
			sbFixedSidebar.removeClass('fixed-sidebar-open');
			burgerMenuMove.removeClass('menu-open');
		});

		/* ========== Submenu collapse ========== */
		sbFixedDropdown.each(function(){
			$(this).append( '<span class="overlay-dropdown-plus"></span>' );
		});

		$('.overlay-dropdown-plus').on("click", function(){
			$(this).prev('ul').slideToggle(300).toggleClass('submenu-collapse');
			$(this).toggleClass('overlay-dropdown-open');
		});
	}

	/* ========== Menu icon color ========== */
	$('.sb-menu-icon').css('color', function () {
		var iconColorAttr = $(this).data('fa-color');
		return iconColorAttr;
	});

})(jQuery);