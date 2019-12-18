<?php
/**
 * Feed Update
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

namespace Hubspot_Feed\Processor;

class Hubspot_Feed_Update {

	public static function run() {

		$hubspot = new \Hubspot_Feed();

		$feeds = $hubspot->get_feeds();

		$feed_data = [];

		foreach ( $feeds as $key => $feed_url ) {

			$connector = new Feed_Fetch( $feed_url );

			try {
				$result      = $connector->fetch();
				$converter   = new Xml_To_Json_Converter( $result );
				$json_result = $converter->convert();
			} catch ( \Exception $e ) {
				error_log( $e->getMessage() );
				$json_result = false;
			}

			$feed_data[ $key ] = $json_result;
		}
		self::save_data( $feed_data );
		self::save_aggregated( $feed_data );
	}

	/**
	 * Saves Data.
	 *
	 * @param array $feed_data
	 */
	public static function save_data( array $feed_data ) {
		foreach ( $feed_data as $key => $data ) {
			if ( $data ) {
				$feed_save = new Feed_Save( $data, $key );
				$feed_save->save();
			}
		}
	}

	public static function save_aggregated( array $feed_data ) {

		$feed_objects = self::aggregate_feeds( $feed_data );

		$feed_save = new Feed_Save( json_encode( $feed_objects ), 'all' );
		$feed_save->save();
	}

	public static function aggregate_feeds( $feed_data ) {
		$feed_objects = [];

		foreach ( $feed_data as $feed_datum ) {
			$decoded_data = json_decode( $feed_datum );
			$feed_objects = array_merge( $feed_objects, $decoded_data );
		}

		usort( $feed_objects, function ( $a, $b ) {
			return strtotime( $b->date ) <=> strtotime( $a->date );
		} );

		return $feed_objects;
	}
}
