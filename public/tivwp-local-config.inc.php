<?php
/**
 * Local settings. Do not sync.
 */

// define( 'WP_DEBUG', true );
// define( 'WP_DEBUG_LOG', true );
// define( 'WP_DEBUG_DISPLAY', true );

if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) ) {
	define( 'WP_ENVIRONMENT_TYPE', 'development' );
}
if ( ! defined( 'WP_DEBUG_DISPLAY' ) ) {
	define( 'WP_DEBUG_DISPLAY', null );
	ini_set( 'display_errors', 0 ); // phpcs:ignore
}

define( 'SCRIPT_DEBUG', true );

// Uncomment if WooCommerce!
define( 'DISABLE_WP_CRON', true );

define( 'WP_POST_REVISIONS', false );

define( 'QM_SHOW_ALL_HOOKS', true );

define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

$GLOBALS['TIVWP']['EMAIL'] = array(
	// Using GMail SMTP
	'SMTP_ENABLED'  => true,
	'SMTP_HOST'     => 'smtp.gmail.com',
	'SMTP_PORT'     => '587',
	'SMTP_SECURE'   => 'tls',
	'SMTP_AUTH'     => true,
	'SMTP_USER'     => 'xxxx@gmail.com',
	'SMTP_PASSWORD' => 'xxxx',
	// Forcing all email sent to ... (better if not the same as the SMTP_USER)
	'MAIL_TO'       => 'xxxx@gmail.com',
	'SMTP_OPTIONS'  => array(
		'ssl' => array(
			'verify_peer'       => false,
			'verify_peer_name'  => false,
			'allow_self_signed' => true,
		),
	),
);

