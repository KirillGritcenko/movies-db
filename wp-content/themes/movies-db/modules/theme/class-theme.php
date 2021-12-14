<?php

namespace NIX_Movies_DB\Modules\Theme;

class Theme {
	public function __construct() {
		$this->theme_support();
		$this->define_constants();
	}

	private function define_constants() {
		$cur_theme = wp_get_theme();

		define( 'MOVIES_DB_VERSION', $cur_theme->get( 'Version' ) );
		define( 'MOVIES_DB_TEXT_DOMAIN', $cur_theme->get( 'TextDomain' ) );
	}

	private function theme_support() {
		add_theme_support( 'post-thumbnails' );
	}
}
