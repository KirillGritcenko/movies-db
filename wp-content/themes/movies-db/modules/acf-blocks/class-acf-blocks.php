<?php

namespace NIX_Movies_DB\Modules\ACF_Blocks;

class ACF_Blocks {
	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_blocks' ] );
	}

	public function register_blocks() {
		$config = $this->get_config();

		foreach ( $config as $block ) {
			acf_register_block_type( $block );
		}
	}

	private function get_config(): array {
		return include get_template_directory() . '/modules/acf-blocks/config/blocks.php';
	}
}
