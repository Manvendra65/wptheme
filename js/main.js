jQuery(document).ready(function() {

"use strict";

var $=jQuery;

/*global woocommerce_params:false */

jQuery(document).ready(function($){
    $('body').bind('added_to_cart', function(){
        $(".added_to_cart").closest(".product").find(".add_to_cart_button").addClass('added');
        $('.add_to_cart_button.added').text('Added');
    });
	
	jQuery("#content_bottom .textwidget").mCustomScrollbar({
		autoHideScrollbar:true,
		theme:"rounded"
	});
	
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 37) {
			$(".StickyHeader").addClass('fixed');
			$("#main").addClass('main');
		}
		else {
			$(".StickyHeader").removeClass('fixed');
			$("#main").removeClass('main');
		}
	})
	
});

$('.woo_bt_compare_this').click(function(){
    $(this).addClass("active");
});
    

//Carousel 
$(function() {
    $("#slider").carouFredSel({
        prev: {button: '.slidprev'},
        next: {button: '.slidnext'},
        responsive: true,
        pagination: {container: '#myController'},
        scroll: 1,
        items		: {
		visible		: 1,
		width		: 870,
		height		: "46%"
	},
        swipe: {
            onMouse: true,
            onTouch: true
	}
    }); 
    $('.list_carousel .products').carouFredSel({
        prev: {button: '#prev_c'},
        next: {button: '#next_c'},
        scroll: 1,
        auto: false,
        swipe: {
            onMouse: true,
            onTouch: true
	}
    });
    $('.related .products').carouFredSel({
        prev: {button: '#prev_c2'},
        next: {button: '#next_c2'},
        scroll: 1,
        auto: false,
        swipe: {
            onMouse: true,
            onTouch: true
	}
    });
    $('.upsells .products').carouFredSel({
        prev: {button: '#prev_c3'},
        next: {button: '#next_c3'},
        scroll: 1,
        auto: false,
        swipe: {
            onMouse: true,
            onTouch: true
	}
    });
    $('#list_banners').carouFredSel({
        prev: {button: '#ban_prev'},
        next: {button: '#ban_next'},
        scroll: 1,
        auto: false,
        swipe: {
            onMouse: true,
            onTouch: true
	}
    });
    $('#thumblist').carouFredSel({
        prev: {button: '#img_prev'},
        next: {button: '#img_next'},
        scroll: 1,
        auto: false,
        circular: false,
        swipe: {
            onMouse: true,
            onTouch: true
	}
    });
    $(window).resize();
});

//Zoomer
$(function() { 
   $('.jqzoom').jqzoom({
        zoomType: is_touch_device() ? 'innerzoom' : 'standard',
        lens:true,
        preloadImages: true,
        alwaysOn:false
    });
});

//Primary menu(media < 984)
(function(){
    $('.primary .menu-select').toggle(function(){
        $('.primary ul.menu').slideDown('slow');
        $(this).addClass('minus');
    }, function() {
        $('.primary ul.menu').slideUp('slow');
        $(this).removeClass('minus');
    });
    
    $('.primary .sub-menu').parent('li').addClass('plus');
    $('.primary .sub-menu').prev('a').click(function (event) {
        if ($(window).width() <= 1007) {
            $(this).next('ul.sub-menu').slideToggle('slow');
            $(this).parent().toggleClass('minus');
            return false;
        }
        else if (is_touch_device()) {
            var $submenu = $(this).next('ul.sub-menu');

            $('.primary > ul.sub-menu').not($submenu[0]).slideUp('fast');

            if ($submenu.is(':visible')) {
                event.stopPropagation();
                return true;
            }
            else {
                $submenu.slideDown('slow');
                return false;
            }
        }
    });

    $("body").on('click', ':not(#nav a)', function () {
        $('.primary .parent > ul.sub-menu').slideUp('fast');
    });
})();

$("a[href$='#review_form_wrapper']").click(function(){
    $(".woocommerce_tabs .tabs li, .woocommerce-tabs .tabs li").removeClass("active");
    $(".woocommerce_tabs .tabs li.reviews_tab, .woocommerce-tabs .tabs li.reviews_tab").addClass("active");

    $(".woocommerce_tabs .panel, .woocommerce-tabs .panel").css("display", "none");
    $(".woocommerce_tabs #tab-reviews, .woocommerce-tabs #tab-reviews").css("display", "block");
    
});

$('#commentform').submit(function(){
    var valid = true;

    $("#commentform span.required").each(function () {
        if ($(this).closest("p, div").find("input,textarea,select").val().replace(/^\s*|\s*$/, '') === ''){
            valid = false;
        }
    });

    if (! valid) {
        alert("Please, fill in all required fields");
        return false;
    }

    if (! $("#email").val().match(/^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(?:\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@(?:[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(?:aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/)) {
        alert("Please, enter valid email");
        return false;
    }

    if (woocommerce_params.review_rating_required === 'yes' && $("#commentform .ratings-input input:checked").length === 0) {
        alert(woocommerce_params.required_rating_text);
        return false;
    }
});

 setTimeout(function () {
     $('.products:not(.grid):not(.list)').addClass('grid');
 }, 0);

function is_touch_device() {  
    try {  
        document.createEvent("TouchEvent");  
        return true;  
    } catch (e) {  
        return false;  
    }  
}

});