var $ = require( "jquery" );
require('bootstrap');
var AOS = require( "aos" );

$(document).ready(function($) {

	
	// Initialize AOS
	AOS.init();
	
	// Mobile Menu
	$('#menu-nav-menu > .dropdown').append("<div class='nav-toggle'><i class='fas fa-chevron-down'></i></div>");
	
	$('#menu-nav-menu .dropdown .nav-toggle').click(function() {
		$(this).siblings('ul.dropdown-menu').slideToggle(300);
		$(this).toggleClass('active');
	});
	
	$('.navbar-toggler').click(function() {
		$('body').toggleClass('nav-open');
	});

	// homepage
	if($('.home-hero-slider').length > 0){
		$('.home-hero-slider').slick({
			dots: false,
			infinite: true,
			arrows: false,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true,
			autoplay: true,
			autoplaySpeed: 6000,
		}).on('afterChange', function(event, slick, currentSlide) {
			var cur_slide = currentSlide + 1;
			$('.home-hero-nav__numb-current').text(('0' + cur_slide).slice(-2));
		});
	}

	if($('.home-sites-slider').length > 0){
		$('.home-sites-slider').slick({
			slidesToShow: 3,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1
					}
				},
			]
		})
	}

	// sub navigations
	$(document).on('click', '.navigation-link', function(){
		$('.navigation-link').removeClass('active');
		$(this).addClass('active');

		let target = $(this).attr('href');

		console.log('target:', target);
		let scrollTop = $(target).offset().top;
		if($('.header').length > 0){
			scrollTop -= $('.header').outerHeight();
		}

		if($(window).width() > 782) {
			if($('.navigations').length > 0){
				scrollTop -= $('.navigations').outerHeight();
			}	
		}

		if($('#wpadminbar').length > 0){
			scrollTop -= $('#wpadminbar').outerHeight();
		}

		$('html, body').animate({
			scrollTop: scrollTop
		}, 100, 'linear');
	})

	var navigations_dom_offset = 0;

	if($('.navigations').length > 0 && !$('.navigations').hasClass('sticky')) {
		navigations_dom_offset = $('.navigations').offset().top;

		if($('.header').length > 0) {
			navigations_dom_offset -= $('.header').outerHeight();
		}

		if($('#wpadminbar').length > 0) {
			navigations_dom_offset -= $('#wpadminbar').outerHeight();
		}

		navigations_dom_offset += 15;
	}

	function processScrollSubNavigation(){
		if($('.navigations').length == 0){
			return;
		}

		var navigations = $('.navigations');
		var scroll = $(window).scrollTop();

		if (scroll >= navigations_dom_offset){
			$('body').addClass('sticky');
			$('body').css('padding-top', $(navigations).outerHeight() + 'px');
		} 
		else {
			$('body').removeClass('sticky');
			$('body').css('padding-top', 'initial');
		}
	}

	$(window).scroll(function(){
		processScrollSubNavigation();
	});

	processScrollSubNavigation();

	// homes page
	var selected_filters = [];
	if($('.homes').length > 0){
		function drawFilters(){
			
			$('#filter_selected_list').empty();
			for(var index = 0; index < selected_filters.length; index ++){
				var filter_item = $('#template_filter_selected_item').clone();
				$(filter_item).find('.filter-selected-item__title').text(selected_filters[index].title);
				$(filter_item).find('.filter-selected-item').attr('filter', selected_filters[index].value);
				$('#filter_selected_list').append($(filter_item).html())
			}
	
			processFilter();
		}
	
		function processFilter() {
			jQuery.post(wp_admin_url, { 
				action: 'get_homes',
				filters:  selected_filters
			}).done(function( data ) {
				$('.homes-list').html(data);
			});
		}
		$(document).on('change', '#style_select', function(){
			let filter_value = $(this).val();
			let filter_title = $(this).find('option:selected').text();
	
			if(filter_value == ''){
				return;
			}
			
			let found_filters = selected_filters.filter(function( filter ) {
				return filter.value === filter_value;
			});
	
			if(found_filters.length == 0){
				selected_filters.push({
					value: filter_value,
					title: filter_title
				});
				drawFilters();
			}
		})
	
		$(document).on('click', '.filter-selected-item i', function(){
			let filter_value = $(this).parents('.filter-selected-item').attr('filter');
			
			let filtered_filters = selected_filters.filter(function( filter ) {
				return filter.value !== filter_value;
			});
	
			if(filtered_filters.length != selected_filters.length){
				selected_filters = filtered_filters;
				drawFilters();
			}
		})
	}

	// gallery page
	if($('.galleries').length > 0){
		var selected_filters = [];
		function drawFilters(){
			$('#filter_selected_list').empty();
			for(var index = 0; index < selected_filters.length; index ++){
				var filter_item = $('#template_filter_selected_item').clone();
				$(filter_item).find('.filter-selected-item__title').text(selected_filters[index].title);
				$(filter_item).find('.filter-selected-item').attr('filter', selected_filters[index].value);
				$('#filter_selected_list').append($(filter_item).html())
			}

			processFilter();
		}

		function processFilter() {
			jQuery.post(wp_admin_url, { 
				action: 'get_galleries',
				filters:  selected_filters
			}).done(function( data ) {
				$('#galleries_list').html(data);
			});
		}
		$(document).on('change', '#style_select', function(){
			let filter_value = $(this).val();
			let filter_title = $(this).find('option:selected').text();

			if(filter_value == ''){
				return;
			}
			
			let found_filters = selected_filters.filter(function( filter ) {
				return filter.value === filter_value;
			});

			if(found_filters.length == 0){
				selected_filters.push({
					value: filter_value,
					title: filter_title
				});
				drawFilters();
			}
		})

		$(document).on('click', '.filter-selected-item i', function(){
			let filter_value = $(this).parents('.filter-selected-item').attr('filter');
			
			let filtered_filters = selected_filters.filter(function( filter ) {
				return filter.value !== filter_value;
			});

			if(filtered_filters.length != selected_filters.length){
				selected_filters = filtered_filters;
				drawFilters();
			}
		})
	}

	// single homes page
	if($('.single-homes').length > 0){
		Fancybox.bind(".single-homes-gallery-col", {
            groupAll : true, // Group all items
            on : {
                ready : (fancybox) => {
                    console.log(`fancybox #${fancybox.id} is ready!`);
                }
            }
        });
	}
	
}); /* end of as page load scripts */