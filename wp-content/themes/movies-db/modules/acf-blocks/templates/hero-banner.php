<?php
/**
 * @var array $block
 */

$image     = get_field( 'background_image' );
$title     = get_field( 'title' );
$sub_title = get_field( 'sub_title' );
?>

<div style="background-image: url('<?php echo $image['url']; ?>'); background-size: 100% auto;">
	<div class="p-4 p-md-5 mb-4 text-white" style="background-color: rgba(0, 0, 0, 0.7);">
		<div class="col-md-6 px-0">
			<h1 class="display-4"><?php echo $title; ?></h1>
			<p class="lead my-3"><?php echo $sub_title; ?></p>
			<p class="lead mb-0">
				<a href="<?php echo get_post_type_archive_link( 'movie' ); ?>"
				   class="btn btn-lg btn-secondary fw-bold border-white bg-white text-dark">
					<?php echo __( 'Find movie', MOVIES_DB_TEXT_DOMAIN ); ?>
				</a>
			</p>
		</div>
	</div>
</div>
