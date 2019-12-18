<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Magento_Bridge
 * @subpackage Magento_Bridge/includes
 */

use Hubspot_Feed\Processor\Hubspot_Feed_Update;


/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Hubspot_Feed
 * @subpackage Hubspot_Feed/includes
 * @author     Your Name <email@example.com>
 */
class Hubspot_Feed_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::create_feeds_folder();
		self::schedule_cron();
		Hubspot_Feed_Update::run();
	}

	protected static function schedule_cron() {
		if ( ! wp_next_scheduled( 'hubspot_feed_update' ) ) {
			wp_schedule_event( time(), 'daily', 'hubspot_feed_update' );
		}
	}

	protected static function create_feeds_folder() {
		require_once ABSPATH . '/wp-admin/includes/file.php';

		/** @var WP_Filesystem_Direct $wp_filesystem */
		global $wp_filesystem;

		add_filter( 'filesystem_method', [ 'Hubspot_Feed', 'hubspot_feed_set_filesystem_to_direct' ], 10, 0 );

		WP_Filesystem( false, WP_CONTENT_DIR . '/uploads' );

		if ( ! $wp_filesystem ) {
			error_log( 'Unable to utilize filesystem when creating hubspot JSON.' );
			return;
		}

		$data_folder = $wp_filesystem->wp_content_dir() . 'uploads/wc_hubspot_data';

		if ( ! $wp_filesystem->is_dir( $data_folder ) ) {
			if ( ! $wp_filesystem->mkdir( $data_folder ) ) {
				//Unable to create directory.
				error_log( 'Unable to create hubspot JSON folder' );
				return;
			}
		}

		remove_filter( 'filesystem_method', [ 'Hubspot_Feed', 'hubspot_feed_set_filesystem_to_direct' ], 10 );
	}

}
