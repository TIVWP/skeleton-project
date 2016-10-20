<?php
/**
 * Local settings. Do not sync.
 */

define( 'TIVWP_APPLICATION_ENV', 'development' );

define( 'WP_DEBUG', true );
//define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

define( 'SCRIPT_DEBUG', true );

//define( 'DISABLE_WP_CRON', true );

//define( 'WP_POST_REVISIONS', false );

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
);

