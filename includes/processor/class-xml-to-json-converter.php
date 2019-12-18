<?php
/**
 * XML to JSON converter
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

namespace Hubspot_Feed\Processor;


use Hubspot_Feed\Object\Post;

class Xml_To_Json_Converter {

	protected $xml_string = '';

	/**
	 * XML_To_Json_Converter constructor.
	 *
	 * @param string $xml_string
	 */
	public function __construct( string $xml_string ) {
		$this->xml_string = $xml_string;
	}

	/**
	 * Parses XML and returns JSON String
	 *
	 * @return string
	 *
	 * @throws \InvalidArgumentException if XML cannot be parsed.
	 */
	public function convert(): string {
		try {
			$xml = simplexml_load_string( $this->xml_string );
		} catch ( \Exception $e ) {
			throw new \InvalidArgumentException( sprintf( 'Invalid XML: %s', $e->getMessage() ) );
		}

		$result = [];

		if ( ! $xml->channel->item ) {
			return json_encode( $result );
		}


		foreach ( $xml->channel->item as $item ) {
			$post = new Post(
				$item->title,
				$item->description,
				$item->link,
				$item->pubDate
			);

			$result[] = $post;
		}


		return json_encode( $result );
	}
}
