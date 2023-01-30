import $ from "jquery";

export function scrolleffects() {

	scroll.on('scroll', (t) => {
		let direction = t.direction;
		let offsettop = t.scroll.y;

		if (offsettop < '100') {
			$('header').removeClass('nav-up');
			$('header').removeClass('nav-down');
		} else if (direction == 'up') {
			$('header').addClass('nav-down');
			$('header').removeClass('nav-up');
		} else if (direction == 'down') {
			$('header').addClass('nav-up');
			$('header').removeClass('nav-down');
		}
	});

	$('#theposts').on('click', '#load-older-posts', function(e) {

		// prevent new page load

		e.preventDefault();

		// store next page number

		var next_page = $(this).attr('href');

		// remove older posts button from DOM

		$(this).remove();

		// ajax older posts below existing posts

		$('#theposts').append(
			$('<div />').load(next_page + ' #theposts')
		);

		function greet() {
			scroll.update();
		}
		setTimeout(greet, 1000); //execute greet after 2000 milliseconds (2 seconds)


	});


	$(document).on('click', 'a[href^="#"]', function (event) {
		event.preventDefault();
		
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 500);
	});

}