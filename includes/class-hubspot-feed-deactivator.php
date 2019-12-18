<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Magento_Bridge
 * @subpackage Magento_Bridge/includes
 */


/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Magento_Bridge
 * @subpackage Magento_Bridge/includes
 * @author     Your Name <email@example.com>
 */
class Hubspot_Feed_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		self::deactivate_cron();
		self::remove_feeds_folder();
	}

	public static function deactivate_cron() {
		wp_clear_scheduled_hook( 'hubspot_feed_update' );
	}

	protected static function remove_feeds_folder() {
		require_once ABSPATH . '/wp-admin/includes/file.php';

		/** @var WP_Filesystem_Direct $wp_filesystem */
		global $wp_filesystem;

		add_filter( 'filesystem_method', [ 'Hubspot_Feed', 'hubspot_feed_set_filesystem_to_direct' ], 10, 0 );

		WP_Filesystem( false, WP_CONTENT_DIR . '/uploads' );

		if ( ! $wp_filesystem ) {
			error_log( 'Unable to utilize filesystem when removing hubspot JSON.' );
			return;
		}

		$data_folder = $wp_filesystem->wp_content_dir() . 'uploads/wc_hubspot_data';

		if ( $wp_filesystem->is_dir( $data_folder ) ) {
			$wp_filesystem->rmdir($data_folder);
		}

		remove_filter( 'filesystem_method', [ 'Hubspot_Feed', 'hubspot_feed_set_filesystem_to_direct' ], 10 );
	}
}
