<?php
/**
 * XML to JSON converter
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

namespace Hubspot_Feed\Processor;


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
		$xml = simplexml_load_string( $this->xml_string );

		if ( ! $xml ) {
			throw new \InvalidArgumentException( 'XML parsing error' );
		}

		return '';
	}

	/**
	 * Returns fields to utilize;
	 *
	 * @return array
	 */
	private function transpose_fields() {
		return [
			'title',
			'link',
			'description',
			'dc:date'
		];
	}


}
