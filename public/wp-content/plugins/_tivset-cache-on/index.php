<?php
/**
 * Plugin name: _tivset-cache-on
 * Description: $headers['Cache-Control'] = 'max-age=1200'
 */

\add_filter( 'wp_headers', function ( $headers ) {
	if ( empty( $headers['Cache-Control'] ) ) {
		$headers['Cache-Control'] = 'max-age=1200';
	}

	return $headers;
} );
