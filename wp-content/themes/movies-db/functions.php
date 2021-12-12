<?php

$cur_theme = wp_get_theme();

define( 'MOVIES_DB_VERSION', $cur_theme->get( 'Version' ) );
define( 'MOVIES_DB_TEXT_DOMAIN', $cur_theme->get( 'TextDomain' ) );

function enqueue_assets() {
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/deps/bootstrap/css/bootstrap.min.css', [], MOVIES_DB_VERSION );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/deps/bootstrap/js/bootstrap.js.css', [], MOVIES_DB_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_assets' );

function register_movies_post_type() {
	$args = [
		'public'      => true,
		'label'       => __( 'Movies', MOVIES_DB_TEXT_DOMAIN ),
		'has_archive' => true,
	];

	register_post_type( 'movie', $args );
}

add_action( 'init', 'register_movies_post_type' );
