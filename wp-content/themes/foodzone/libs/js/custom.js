// JavaScript Document


if(jQuery('.js-example-basic-single').length > 0){
$(document).ready(function () {
	"use strict";
	$('.js-example-basic-single').select2();
});
}

if(jQuery('.bla-1').length > 0){
jQuery(function () {
	"use strict";
	jQuery("a.bla-1").YouTubePopUp();
	jQuery("a.bla-2").YouTubePopUp({
		autoplay: 0
	}); // Disable autoplay
});
}

if(jQuery('.order-box').length > 0){
var flip = 0;
$("#myelement").click(function () {
	"use strict";
	$(".order-box").toggle(flip++ % 2 === 0);

});
}


if(jQuery('.owl-carousel').length > 0){
$(document).ready(function () {
	"use strict";
	$(".owl-carousel").owlCarousel();
});
}

if(jQuery('.hamza').length > 0){
$('.hamza').owlCarousel({
	loop: true,
	margin: 10,
	autoplay: true,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 1
		}
	}
});

}

if(jQuery('.element').length > 0){
$('.element').owlCarousel({

	loop: true,
	margin: 10,
	autoplay: true,
	nav: true,
	responsive: {
		0: {
			items: 2
		},
		600: {
			items: 3
		},
		1000: {
			items: 5
		}
	}
});
}

if(jQuery('.food-catt').length > 0){
$('.food-cat').owlCarousel({
    loop:true,
    margin:0,
	autoplay:true,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:4
        },
		 768:{
            items:4
        },
        1000:{
            items:8
        }
    }
});
}


if(jQuery('.cat').length > 0){
$('.cat').owlCarousel({
	loop: true,
	margin: 20,
	autoplay: true,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 3
		},
		1000: {
			items: 6
		}
	}
});
}

if(jQuery('.my-slider').length > 0){
$('.my-slider').owlCarousel({
	loop: true,
	margin: 20,
	autoplay: true,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 3
		},
		1000: {
			items: 4
		}
	}
});
}



if(jQuery('.fc-slider').length > 0){
$('.fc-slider').owlCarousel({
	loop: true,
	margin: 20,
	autoplay: false,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
});
}




if(jQuery('.banner-slider').length > 0){
$('.banner-slider').owlCarousel({
	loop: true,
	margin: 20,
	autoplay: true,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 1
		},
		1000: {
			items: 1
		}
	}
});
}


if(jQuery('.count').length > 0){
$('.count').each(function () {
	"use strict";
	$(this).prop('Counter', 0).animate({
		Counter: $(this).text()
	}, {
		duration: 4000,
		easing: 'swing',
		step: function (now) {
			$(this).text(Math.ceil(now));
		}
	});
});
}



if(jQuery('.doc-stuff').length > 0){
$('.doc-stuff').each(function () {
	"use strict";
	$(this).prop('Counter', 0).animate({
		Counter: $(this).text()
	}, {
		duration: 8000,
		easing: 'swing',
		step: function (now) {
			$(this).text(Math.ceil(now));
		}
	});
});
}


if(jQuery('.fr-logo-details').length > 0){
$("#a").click(function () {
	"use strict";
	$(".fr-logo-details").fadeToggle(1000);
});
}

if(jQuery('.fr-logo-details2').length > 0){
$("#b").click(function () {
	"use strict";
	$(".fr-logo-details2").fadeToggle(1000);
});
}

if(jQuery('.fr-logo-details3').length > 0){
$("#c").click(function () {
	"use strict";
	$(".fr-logo-details3").fadeToggle(1000);
});
}


(function ($) {
    
     "use strict";
    $('[data-toggle="popover"]').popover();

    if ($(".preloader-site").length) {
        $(window).on('load', function () {
            $('.preloader-site').fadeOut();
        });
    }

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 300) {
            $('.scroll-top').fadeIn(300);
        } else {
            $('.scroll-top').fadeOut(300);
        }
    });
    $('.scroll-top').on('click', function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });

    
    
    

    $('[data-toggle="tooltip"]').tooltip();
    $('.wp-block-archives-dropdown select, .wp-block-categories select, .blog-sidebar .widget select, .woocommerce-ordering .orderby').select2({
        width: '100%',
        theme: "classic",
    });
    
    
    
    var $container = $('.grid');
    $container.imagesLoaded(function () {
        $container.masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            layoutMode: 'masonry',
            transitionDuration: '0.7s',
        });
    });


	$('p:empty').remove();

})(jQuery);





