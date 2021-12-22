<?php

function register_option_pages() {
	acf_add_options_page( [
		'page_title' => 'Movie DB General Settings',
		'menu_title' => 'Movie DB Settings',
		'menu_slug'  => 'movie-db-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
	] );
}

add_action( 'acf/init', 'register_option_pages' );