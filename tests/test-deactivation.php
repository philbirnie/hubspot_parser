<?php
/**
 * Tests Deactivation Script
 *
 * @package    Hubspot_Parser
 * @subpackage Hubspot_Parser
 * @since      2019 Dec
 */

class DeActivationTest extends WP_UnitTestCase {


	public function test_removes_folder() {

		// Run activation
		deactivate_hubspot_feed();

		$hubspost_uploads_directory = wp_upload_dir();

		$hubspost_uploads_directory_path = $hubspost_uploads_directory['basedir'] . '/wc_hubspot_data';

		$this->assertFalse( file_exists( $hubspost_uploads_directory_path ) );
		$this->assertFalse( is_dir( $hubspost_uploads_directory_path ) );

		activate_hubspot_feed();
	}
}
