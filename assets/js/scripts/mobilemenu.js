import $ from "jquery";

export function mobilemenu() {
	$(".js-menu").on("click", function() {
		$("body").toggleClass("menuopen");
		$("body").toggleClass("opensidemenu");
		$(".js-mobilemenu").toggleClass("open");
	});
	$( ".taalcontent .nav .nav-item" ).each(function() {
	  var language = $(this).find('div').text();
	  var newlanguage = language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ' + language + ' ';
	  $(this).find('div').text(newlanguage);
	});
	
}