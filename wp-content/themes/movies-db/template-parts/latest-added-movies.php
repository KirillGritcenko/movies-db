<?php
$latest_added = get_posts( [
	'post_type' => 'movie',
	'orderby'   => 'publish_date',
	'order'     => 'DESC',
] );
?>

<div class="p-4 bg-light rounded">
	<h4 class="fst-italic"><?php echo __( 'Latest Added', MOVIES_DB_TEXT_DOMAIN ); ?></h4>
	<ol class="list-unstyled mb-0">
		<?php foreach ( $latest_added as $movie ): ?>
			<li>
				<a href="<?php echo get_permalink( $movie ); ?>">
					<?php echo get_the_title( $movie ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ol>
</div>
