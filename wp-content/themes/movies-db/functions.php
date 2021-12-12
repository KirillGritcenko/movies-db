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
                <input id="movie_release_date" name="movie_release_date" type="number" min="1800" value="<?php echo $release_date; ?>">
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
                <input id="movie_imdb_rating" name="movie_imdb_rating" type="number" min="0" max="10" step="0.1" value="<?php echo $imdb_rating; ?>">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="movie_kinopoisk_rating"><?php echo __( 'Kinopoisk', MOVIES_DB_TEXT_DOMAIN ); ?></label>
            </th>
            <td>
                <input id="movie_kinopoisk_rating" name="movie_kinopoisk_rating" type="number" min="0" max="10" step="0.1" value="<?php echo $kinopoisk_rating; ?>">
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
