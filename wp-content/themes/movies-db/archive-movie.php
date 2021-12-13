<?php
get_header();
?>
	<div class="py-5">
		<div class="row row-cols-4">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col">
					<div class="card h-100">
						<?php the_post_thumbnail( 'large', [
							'class' => 'img-fluid',
						] ); ?>
						<div class="card-body">
							<h5 class="card-title">
								<a class="text-black" href="<?php echo get_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h5>
							<p class="card-text"><?php the_excerpt(); ?></p>
						</div>
						<div class="card-footer">
							<a href="<?php echo get_permalink(); ?>" class="btn btn-primary"><?php echo __( 'Read more', MOVIES_DB_TEXT_DOMAIN ); ?></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php
get_footer();
