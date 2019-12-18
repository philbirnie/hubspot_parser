<?php
/**
 * Saves Feed to Uploads
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

namespace Hubspot_Feed\Processor;

class Feed_Save {

	protected $data;

	protected $filename;

	/**
	 * Feed_Save constructor.
	 *
	 * @param $data
	 * @param $filename
	 */
	public function __construct( $data, $filename ) {
		$this->data     = $data;
		$this->filename = $filename;
	}

	public function save() {
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

		$save_as = sprintf( '%s.json', $this->filename );

		$wp_filesystem->put_contents( $data_folder . "/{$save_as}", $this->data );

		remove_filter( 'filesystem_method', [ 'Hubspot_Feed', 'hubspot_feed_set_filesystem_to_direct' ], 10 );
	}

}
