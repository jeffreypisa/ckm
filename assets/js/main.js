import $ from "jquery";
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle';
window.bootstrap = bootstrap;

// Init plugins
import { slick_init } from './scripts/slick.js';
import { matchheight } from './scripts/matchheightplugin.js';
import { lity_init } from './scripts/lityplugin.js';
import { parallax } from './scripts/parallax.js';

// Scripts
import { site_is_loaded } from './scripts/site_is_loaded.js';
import { footer_down } from './scripts/footer_down.js';
import { mobilemenu } from './scripts/mobilemenu.js';
import { sticky_header } from './scripts/sticky_header.js';

lity_init();

$( document ).ready(function() {
	footer_down();
	mobilemenu();
	slick_init();
	parallax();
});

$(window).on('load', function() {
	matchheight();
	sticky_header();
	site_is_loaded();
});