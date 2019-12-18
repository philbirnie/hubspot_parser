<?php
/**
 * Tests Activation Script
 *
 * @package    Noxgear
 * @subpackage Noxgear
 * @since      2019 Oct
 */

class ActivationTest extends WP_UnitTestCase {


	public function test_creates_folder() {

		$hubspost_uploads_directory = wp_upload_dir();

		$hubspost_uploads_directory_path = $hubspost_uploads_directory['basedir'] . '/wc_hubspot_data';

		$this->assertTrue( file_exists( $hubspost_uploads_directory_path ) );
		$this->assertTrue( is_dir( $hubspost_uploads_directory_path ) );
	}
}
