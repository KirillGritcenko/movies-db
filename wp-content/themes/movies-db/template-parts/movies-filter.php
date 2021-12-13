<form action="<?php echo get_post_type_archive_link( 'movie' ); ?>" method="get">
	<div class="mb-3">
		<label for="filter_search" class="form-label">Search</label>
		<input type="text" name="filter_search" class="form-control" id="filter_search" value="<?php echo $_GET['filter_search']; ?>">
	</div>
	<div class="mb-3">
		<label for="filter_released_on" class="form-label">Released On</label>
		<input type="text" name="filter_released_on" class="form-control" id="filter_released_on" value="<?php echo $_GET['filter_released_on']; ?>">
	</div>
	<div class="mb-3 form-check">
		<input type="checkbox" name="filter_rating_over_7" class="form-check-input" id="filter_rating_over_7" value="1" <?php echo checked( '1', $_GET['filter_rating_over_7'] ); ?>>
		<label class="form-check-label" for="filter_rating_over_7">Rating > 7</label>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
