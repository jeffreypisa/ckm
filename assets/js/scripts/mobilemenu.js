import $ from "jquery";

export function mobilemenu() {
	$(".js-menu").on("click", function() {
		$("body").toggleClass("menuopen");
		$("body").toggleClass("opensidemenu");
		$(".js-mobilemenu").toggleClass("open");
	});
	$(".menuoverlay").on("click", function() {
		$("body").removeClass("menuopen");
		$("body").removeClass("opensidemenu");
		$(".js-mobilemenu").removeClass("open");
	});
	

}