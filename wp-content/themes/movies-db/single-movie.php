<?php get_header(); ?>

	<div class="row py-5">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4">
					<?php the_post_thumbnail( 'large', [
						'class' => 'img-fluid',
					] ); ?>
				</div>
				<div class="col-md-8">
					<h2><?php the_title(); ?></h2>
					<p class="blog-post-meta">
                        <span class="fw-bold">
                            <?php echo __( 'Released on', MOVIES_DB_TEXT_DOMAIN ); ?>
                        </span>: <?php echo get_post_meta( get_the_ID(), 'movie_release_date', true ); ?>
					</p>
					<p class="blog-post-meta">
                        <span class="fw-bold">
                            <?php echo __( 'Runtime', MOVIES_DB_TEXT_DOMAIN ); ?>
                        </span>: <?php the_movie_runtime( get_the_ID() ); ?>
					</p>
					<p class="blog-post-meta">
                        <span class="fw-bold">
                            <?php echo __( 'IMDB Rating', MOVIES_DB_TEXT_DOMAIN ); ?>
                        </span>: <?php echo get_post_meta( get_the_ID(), 'movie_imdb_rating', true ); ?>
					</p>
					<p class="blog-post-meta">
                        <span class="fw-bold">
                            <?php echo __( 'Kinopoisk Rating', MOVIES_DB_TEXT_DOMAIN ); ?>
                        </span>: <?php echo get_post_meta( get_the_ID(), 'movie_kinopoisk_rating', true ); ?>
					</p>
				</div>
			</div>
			<div class="row py-2">
				<div class="col">
					<article class="blog-post">
						<h3 class="blog-post-title"><?php echo __( 'Plot Summary' ); ?></h3>
						<?php the_content(); ?>
					</article>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="position-sticky" style="top: 2rem;">
				Sidebar
			</div>
		</div>
	</div>

<?php get_footer(); ?>