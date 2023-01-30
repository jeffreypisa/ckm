<?php

	add_action('after_setup_theme', 'emonks_register_nav_menus');

	function emonks_register_nav_menus() {
		register_nav_menu('menu', __('Hoofdmenu'));
		register_nav_menu('taalmenu', __('Taalmenu'));
		register_nav_menu('footermenu', __('Footermenu'));
	}