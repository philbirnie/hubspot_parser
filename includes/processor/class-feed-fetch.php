<?php
/**
 * Feed Fetcher
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

namespace Hubspot_Feed\Processor;

use Hubspot_Feed\Connector\Hubspot_Connector;

class Feed_Fetch {

	private $connector;

	public function __construct( $url, $connector = null ) {
		if ( ! $connector ) {
			$connector = new Hubspot_Connector( $url );
		}
		$this->connector = $connector;
	}

	/**
	 * Fetches Request and returns Response.
	 *
	 * @return string|\WP_Error
	 * @throws \Exception
	 */
	public function fetch(  ) {
		return $this->connector->send_request();
	}
}
