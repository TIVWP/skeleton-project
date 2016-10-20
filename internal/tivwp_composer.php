<?php
/**
 * File: tivwp_composer.php
 *
 * @package TIVWP
 */

use Composer\Script\Event;

/**
 * Class tivwp_composer
 */
class tivwp_composer {
	/**
	 * @param Event $event
	 */
	public static function post_create_project( Event $event ) {
		$io = $event->getIO();

		$io->write( 'Please enter the configuration values:' );

		$db_name     = $io->ask( 'DB_NAME=', 'tivwp_db' );
		$db_user     = $io->ask( 'DB_USER=', 'tivwp_user' );
		$db_password = $io->ask( 'DB_PASSWORD=', 'tivwp_password' );
		$site_name = $io->ask( 'SITE_NAME [www.example.com] :', 'www.example.com' );

		$replaces = array(
			'{{DB_NAME}}'     => $db_name,
			'{{DB_USER}}'     => $db_user,
			'{{DB_PASSWORD}}' => $db_password,
			'{{SITE_NAME}}' => $site_name,
		);

		$replace_in_files = array(
			'internal/dist/dbcreate.sql'         => 'internal/dbcreate.sql',
			'internal/dist/wp-config.php'        => 'public/wp-config.php',
			'internal/dist/dbdump-config.inc.sh' => 'dbdump-config.inc.sh',
		);

		$io->write( 'Processing files:' );
		foreach ( $replace_in_files as $source => $destination ) {
			$io->write( "$source => $destination" );
			file_put_contents(
				$destination,
				strtr(
					file_get_contents( $source ),
					$replaces
				)
			);
		}
	}
}
