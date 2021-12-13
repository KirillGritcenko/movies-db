<?php
get_header();
?>
	<div class="row py-5 gx-5">
		<div class="col-3">
			<?php echo get_template_part( 'template-parts/movies-filter' ); ?>
		</div>
		<div class="col-9">
			<div class="row">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<div class="col-4">
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
					<?php endwhile;
				else: ?>
					<h3><?php echo __( 'Such empty', MOVIES_DB_TEXT_DOMAIN ); ?> :(</h3>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php
get_footer();
