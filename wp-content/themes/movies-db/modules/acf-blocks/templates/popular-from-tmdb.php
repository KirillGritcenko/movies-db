<?php

$moviesAPI = new TMDB_API( '28caeefed48fdba75c70a3440d56221e' );
$popular   = $moviesAPI->popular();
?>

<div class="container">
	<h2><?php echo __( 'Popular from themoviedb.org', MOVIES_DB_TEXT_DOMAIN ); ?></h2>
	<div class="row row-cols-3 g-4">
		<?php foreach ( array_slice( $popular->results, 0, 6 ) as $movie ) : ?>
			<div class="col">
				<div class="card mb-3 h-100">
					<div class="row g-0">
						<div class="card-header py-3">
							<h4 class="my-0 fw-normal"><?php echo $movie->original_title; ?></h4>
						</div>
						<div class="col-md-4">
							<img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?php echo $movie->poster_path; ?>"/>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<p class="card-text">
									<span class="fw-bold"><?php echo __( 'Adult', MOVIES_DB_TEXT_DOMAIN ); ?>: </span>
									<span class="badge <?php echo $movie->adult ? 'bg-warning' : 'bg-info'; ?>">
										<?php echo __( $movie->adult ? 'Yes' : 'No', MOVIES_DB_TEXT_DOMAIN ); ?>
									</span>
								</p>
								<p class="card-text">
									<span class="fw-bold"><?php echo __( 'Rating', MOVIES_DB_TEXT_DOMAIN ); ?>: </span>
									<?php echo $movie->vote_average; ?>
								</p>
								<p class="card-text">
									<span class="fw-bold"><?php echo __( 'Votes', MOVIES_DB_TEXT_DOMAIN ); ?>: </span>
									<?php echo $movie->vote_count; ?>
								</p>
								<p class="card-text">
									<span
										class="fw-bold"><?php echo __( 'Release date', MOVIES_DB_TEXT_DOMAIN ); ?>: </span>
									<?php echo $movie->release_date; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

