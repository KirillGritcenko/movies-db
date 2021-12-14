<?php
/**
 * @var array $block
 */
$movies = get_field( 'movies' ) ?: [];
?>

<div class="container">
	<h2><?php echo __( 'Featured today', MOVIES_DB_TEXT_DOMAIN ); ?></h2>
	<div class="row row-cols-3">
		<?php foreach ( $movies as $movie ) : ?>
			<div class="col h-100">
				<div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-4">
							<?php echo get_the_post_thumbnail( $movie, 'medium', [
								'class' => 'img-fluid',
							] ); ?>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php echo get_the_title( $movie ); ?></h5>
								<p class="card-text"><?php echo get_the_excerpt( $movie ); ?></p>
								<p class="card-text">
									<small class="text-muted">
										<?php echo get_the_date( '', $movie ); ?>
									</small>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

