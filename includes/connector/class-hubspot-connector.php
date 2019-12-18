<?php

namespace Hubspot_Feed\Connector;

class Hubspot_Connector {

	protected $url = '';

	public function __construct( $url = '' ) {
		$this->url = $url;
	}

	/**
	 * Send Response
	 *
	 * @return string|\WP_Error
	 * @throws \Exception
	 */
	public function send_request() {

		if ( ! $this->url ) {
			return '';
		}

		$request = $this->url;

		$response = wp_remote_request(
			$request,
			[
				'method' => 'GET',
			]
		);

		if ( 200 != $response['response']['code'] ?? 0 ) {
			throw new \Exception( sprintf( 'Hubspot Request Failure. %d, %s', $response['response']['code'] ?? 0, static::class ) );
		}

		return $response['body'];
	}
}
