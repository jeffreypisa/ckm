import $ from "jquery";

export function parallax() {
	
	window.addEventListener("scroll", function() {

		var st = window.pageYOffset || document.documentElement.scrollTop;
		
		var bracestop = st * .3; 
		
		$('#BracesLinks div').css('transform', 'translateX(-' + bracestop + 'px)');
		$('#BracesRechts div').css('transform', 'translateX(' + bracestop + 'px)');
		
	}, false);
}