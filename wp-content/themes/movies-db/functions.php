<?php

function enqueue_assets() {
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/deps/bootstrap/css/bootstrap.min.css', [], MOVIES_DB_VERSION );
	wp_enqueue_style( 'movies-db-main', get_stylesheet_directory_uri() . '/assets/css/main.css', [], MOVIES_DB_VERSION );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/deps/bootstrap/js/bootstrap.min.js', [], MOVIES_DB_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_assets' );

function register_movies_post_type() {
	$args = [
		'public'      => true,
		'label'       => __( 'Movies', MOVIES_DB_TEXT_DOMAIN ),
		'has_archive' => true,
		'supports'    => [
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		]
	];

	register_post_type( 'movie', $args );
}

add_action( 'init', 'register_movies_post_type' );

function register_meta_boxes() {
	add_meta_box( 'movie_details', 'Movie Details', 'render_movie_details_meta_box' );
	add_meta_box( 'movie_ratings', 'Movie Ratings', 'render_movie_ratings_meta_box' );
}

add_action( 'add_meta_boxes', 'register_meta_boxes' );

function render_movie_details_meta_box( $post ) {
	$release_date = get_post_meta( $post->ID, 'movie_release_date', true );
	$runtime      = get_post_meta( $post->ID, 'movie_runtime', true );
	?>
	<table class="form-table">
		<tbody>
		<tr>
			<th scope="row">
				<label for="movie_release_date"><?php echo __( 'Release date', MOVIES_DB_TEXT_DOMAIN ); ?></label>
			</th>
			<td>
				<input id="movie_release_date" name="movie_release_date" type="number" min="1800"
				       value="<?php echo $release_date; ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="movie_runtime"><?php echo __( 'Runtime (min)', MOVIES_DB_TEXT_DOMAIN ); ?></label>
			</th>
			<td>
				<input id="movie_runtime" name="movie_runtime" type="number" min="0" value="<?php echo $runtime; ?>">
			</td>
		</tr>
		</tbody>
	</table>
	<?php
}

function save_movie_details_meta( $post_id ) {
	$fields = [
		'movie_release_date',
		'movie_runtime'
	];

	foreach ( $fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			update_post_meta(
				$post_id,
				$field,
				$_POST[ $field ]
			);
		}
	}
}

add_action( 'save_post', 'save_movie_details_meta' );

function render_movie_ratings_meta_box( $post ) {
	$imdb_rating      = get_post_meta( $post->ID, 'movie_imdb_rating', true );
	$kinopoisk_rating = get_post_meta( $post->ID, 'movie_kinopoisk_rating', true );
	?>
	<table class="form-table">
		<tbody>
		<tr>
			<th scope="row">
				<label for="movie_imdb_rating"><?php echo __( 'IMDB', MOVIES_DB_TEXT_DOMAIN ); ?></label>
			</th>
			<td>
				<input id="movie_imdb_rating" name="movie_imdb_rating" type="number" min="0" max="10" step="0.1"
				       value="<?php echo $imdb_rating; ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="movie_kinopoisk_rating"><?php echo __( 'Kinopoisk', MOVIES_DB_TEXT_DOMAIN ); ?></label>
			</th>
			<td>
				<input id="movie_kinopoisk_rating" name="movie_kinopoisk_rating" type="number" min="0" max="10"
				       step="0.1" value="<?php echo $kinopoisk_rating; ?>">
			</td>
		</tr>
		</tbody>
	</table>
	<?php
}

function save_movie_ratings_meta( $post_id ) {
	$fields = [
		'movie_imdb_rating',
		'movie_kinopoisk_rating'
	];

	foreach ( $fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			update_post_meta(
				$post_id,
				$field,
				$_POST[ $field ]
			);
		}
	}
}

add_action( 'save_post', 'save_movie_ratings_meta' );

function change_excerpt_length( $length ): int {
	return 20;
}

add_filter( 'excerpt_length', 'change_excerpt_length', 999 );

function register_menus() {
	register_nav_menus( [
		'header_menu' => __( 'Header Menu', MOVIES_DB_TEXT_DOMAIN ),
		'footer_menu' => __( 'Footer Menu', MOVIES_DB_TEXT_DOMAIN ),
	] );
}

add_action( 'after_setup_theme', 'register_menus', 0 );

function add_bootstrap_classes_to_menu_item( $classes, $item, $args, $depth ) {
	$classes[] = 'nav-item';

	if ( array_search( 'menu-item-has-children', $classes ) ) {
		$classes[] = 'dropdown';
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_bootstrap_classes_to_menu_item', 10, 4 );

function add_bootstrap_class_to_menu_item_link( $atts, $item, $args, $depth ) {
	$classes = [
		'nav-link',
	];

	if ( array_search( 'current-menu-item', $item->classes ) ) {
		$classes[] = 'active';
	}

	if ( $depth > 0 ) {
		$classes[] = 'dropdown-item';
	}

	if ( array_search( 'menu-item-has-children', $item->classes ) ) {
		$classes[]              = 'dropdown-toggle';
		$atts['data-bs-toggle'] = 'dropdown';
	}

	$atts['class'] = implode( ' ', $classes );

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_bootstrap_class_to_menu_item_link', 10, 4 );

function add_bootstrap_class_to_submenu( $classes ) {
	$classes[] = 'dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow';

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'add_bootstrap_class_to_submenu' );

function the_movie_runtime( $post_id ) {
	$runtime = get_post_meta( $post_id, 'movie_runtime', true );

	if ( $runtime ) {
		$hours   = floor( $runtime / 60 );
		$minutes = $runtime % 60;

		echo "{$hours}h {$minutes}m";
	}
}

function modify_archive_movie_query( WP_Query $query ) {
	if ( is_admin() || ! $query->is_post_type_archive( 'movie' ) || ! $query->is_main_query() ) {
		return;
	}

	$search        = filter_input( INPUT_GET, 'filter_search', FILTER_SANITIZE_STRING );
	$released_on   = filter_input( INPUT_GET, 'filter_released_on', FILTER_VALIDATE_INT );
	$rating_over_7 = filter_input( INPUT_GET, 'filter_rating_over_7', FILTER_VALIDATE_BOOLEAN );

	$meta_query = [];

	if ( $search ) {
		$query->set( 's', $search );
	}

	if ( $released_on ) {
		$meta_query[] = [
			'key'   => 'movie_release_date',
			'value' => $released_on,
		];
	}

	if ( $rating_over_7 ) {
		$meta_query[] = [
			'relation' => 'OR',
			[
				'key'     => 'movie_imdb_rating',
				'value'   => 7,
				'compare' => '>=',
				'type'    => 'numeric',
			],
			[
				'key'     => 'movie_kinopoisk_rating',
				'value'   => 7,
				'compare' => '>=',
				'type'    => 'numeric',
			]
		];
	}

	if ( $meta_query ) {
		$query->set( 'meta_query', $meta_query );
	}
}

add_action( 'pre_get_posts', 'modify_archive_movie_query' );

//include 'examples/acf-blocks.php';
include 'modules/theme/class-theme.php';
new \NIX_Movies_DB\Modules\Theme\Theme();

include 'modules/acf-blocks/class-acf-blocks.php';
new \NIX_Movies_DB\Modules\ACF_Blocks\ACF_Blocks();

include 'modules/tmdb-api/class-tmdb-api.php';
