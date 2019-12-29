<?php
/**
 * No heartbeats.
 * Copyright (c) 2019. TIV.NET INC. All Rights Reserved.
 */

if ( 0 ) {
	add_action(
		'init',
		function () {
			wp_deregister_script( 'heartbeat' );
		}
	);

	add_action(
		'admin_footer',
		function () {
			echo "<script>if ( typeof wp !== 'undefined' && wp.heartbeat ) wp.heartbeat.stop();</script>";
		}
	);
}
