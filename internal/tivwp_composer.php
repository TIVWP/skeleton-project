<?php
/**
 * File: tivwp_composer.php
 *
 * @package TIVWP
 */

use Composer\Script\Event;

/**
 * Class tivwp_composer
 * @todo composer.json should change. Different project name; do not need to run script.
 */
class tivwp_composer {
	/**
	 * @param Event $event
	 */
	public static function post_create_project( Event $event ) {

		$project_root = str_replace( '\\', '/', dirname( __DIR__ ) );
		if ( ':' === substr( $project_root, 1, 1 ) ) {
			$project_root = substr( $project_root, 2 );
		}

		$default_site_name = str_replace( 'www.', '', basename( $project_root ) );

		list( $default_db ) = explode( '.', $default_site_name );

		$io = $event->getIO();

		$io->write( 'Please enter the configuration values:' );

		$db_name     = $io->ask( 'DB_NAME [' . $default_db . '] : ', $default_db );
		$db_user     = $io->ask( 'DB_USER [' . $default_db . '] : ', $default_db );
		$db_password = $io->ask( 'DB_PASSWORD :', 'tivwp_password' );
		$site_name   = $io->ask( 'Domain name [' . $default_site_name . '] : ', $default_site_name );
		$replaces    = array(
			'{{DB_NAME}}'      => $db_name,
			'{{DB_USER}}'      => $db_user,
			'{{DB_PASSWORD}}'  => $db_password,
			'{{SITE_NAME}}'    => $site_name, // TODO remove checking for SITE_NAME in dbdbump. And do we need this replacement?
			'{{PROJECT_ROOT}}' => $project_root,
		);

		$io->write( print_r( $replaces, true ) );

		if ( ! $io->askConfirmation( 'OK [Y/n]?' ) ) {
			$io->writeError( 'Aborted.' );
			$io->write( 'To repeat the configuration, please run:' );
			$io->write( 'composer run-script post-create-project-cmd' );

			return;
		}

		$replace_in_files = array(
			'internal/dist/dbcreate.sql'         => 'internal/dbcreate.sql',
			'internal/dist/wp-config.php'        => 'public/wp-config.php',
			'internal/dist/dbdump-config.inc.sh' => 'dbdump-config.inc.sh',
			'internal/dist/httpd.conf'           => 'apache/httpd.conf',
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
