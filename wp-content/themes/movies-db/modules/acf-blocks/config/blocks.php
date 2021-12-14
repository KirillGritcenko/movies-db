<?php

return [
	[
		'name'            => 'hero_banner',
		'title'           => __( 'Hero Banner', MOVIES_DB_TEXT_DOMAIN ),
		'render_template' => 'modules/acf-blocks/templates/hero-banner.php',
		'mode'            => 'edit',
	],
	[
		'name'            => 'featured_today',
		'title'           => __( 'Featured Today', MOVIES_DB_TEXT_DOMAIN ),
		'render_template' => 'modules/acf-blocks/templates/featured-today.php',
		'mode'            => 'edit',
	],
];
