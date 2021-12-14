<?php

function register_blocks() {
	acf_register_block_type( [
		'name'            => 'hero_banner',
		'title'           => __( 'Hero Banner', MOVIES_DB_TEXT_DOMAIN ),
		'render_template' => 'template-parts/blocks/hero-banner.php',
		'mode'            => 'edit',
	] );

	acf_register_block_type( [
		'name'            => 'featured_today',
		'title'           => __( 'Featured Today', MOVIES_DB_TEXT_DOMAIN ),
		'render_template' => 'template-parts/blocks/featured-today.php',
		'mode'            => 'edit',
	] );
}

add_action( 'acf/init', 'register_blocks' );
