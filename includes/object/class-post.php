<?php
/**
 * Post Object
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

namespace Hubspot_Feed\Object;

class Post {

	public $title = '';

	public $description = '';

	public $link = '';

	public $date = '';

	/**
	 * Post constructor.
	 *
	 * @param string $title
	 * @param string $description
	 * @param string $link
	 * @param string $date
	 */
	public function __construct( string $title, string $description, string $link, string $date ) {
		$this->title       = $title;
		$this->description = strip_tags($description, '<em><strong><b><i></i>');
		$this->link        = $link;
		$this->date        = $this->process_date( $date );
	}


	/**
	 * Processes and updates date
	 *
	 * @param string $date_string Original Date String
	 *
	 * @return string Updated Date String.
	 */
	private function process_date( $date_string ) {
		$timezone = new \DateTimeZone( $this->get_timezone() );

		/**
		 * Publish date from returned format
		 *
		 * Example: Wed, 04 Dec 2019 00:00:00 GMT
		 */
		$publish_date = \DateTime::createFromFormat( 'D, d M Y H:i:s e', $date_string );
		$publish_date->setTimezone($timezone);

		return $publish_date->format( 'F j, Y' );
	}


	/**
	 * Returns Time String;
	 *
	 * @return string
	 */
	private function get_timezone(): string {
		$timezone_option = get_option( 'timezone_string' );

		if ( ! $timezone_option ) {
			$timezone_option = 'GMT';
		}

		return $timezone_option;
	}
}
