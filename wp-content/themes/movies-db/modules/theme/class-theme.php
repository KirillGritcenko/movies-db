<?php

namespace NIX_Movies_DB\Modules\Theme;

class Theme {
	public function __construct() {
		$this->theme_support();
		$this->define_constants();

		add_action( 'acf/init', [ $this, 'register_option_pages' ] );
	}

	public function register_option_pages() {
		$config = $this->get_option_pages_config();

		foreach ( $config as $page ) {
			acf_add_options_page( $page );
		}
	}

	private function get_option_pages_config(): array {
		return include get_template_directory() . '/modules/theme/config/option-pages.php';
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
