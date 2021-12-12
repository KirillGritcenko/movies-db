<?php
get_header();
?>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row row-cols-3">
				<?php while ( have_posts() ) : the_post(); ?>
                    <div class="col">
                        <div class="card h-100">
							<?php the_post_thumbnail( 'large' ); ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
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
    </div>
<?php
get_footer();
