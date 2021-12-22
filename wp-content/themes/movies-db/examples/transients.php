<?php

function get_cached_data() {
	$transient_key = 'some_data';
	if ( ! $data = get_transient($transient_key ) ) {
		$data = get_data();

		set_transient($transient_key, $data, 120);
	}

	return $data;
}

function get_data(): array {
	return [
		'key' => 'value',
	];
}
