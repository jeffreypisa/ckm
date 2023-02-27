import $ from "jquery";
import 'slick-carousel';

export function slick_init() {	
	
	$('.js-slick-bannerslider').slick({
		autoplay: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		dots: true,
		centerMode: true,
		swipeToSlide: true,
		autoplaySpeed: 2000,
		speed: 400,
		cssEase: 'cubic-bezier(.19,1,.22,1)'
	});
	
	const settings = {
		autoplay: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		centerMode: true,
		swipeToSlide: true,
		autoplaySpeed: 2000,
		speed: 400,
		mobileFirst: true,
		cssEase: 'cubic-bezier(.19,1,.22,1)',
		responsive: [
			{
				breakpoint: 992,
				settings: "unslick"
			}
		]
	};
	
	const sl =  $('.js-slick-events').slick(settings);
		  
	$(window).on('resize', function() {
	   if( $(window).width() < 992 &&  !sl.hasClass('slick-initialized')) {
			 $('.js-slick-events').slick(settings);
		}
	});
	
}