<?php

use Hubspot_Feed\Object\Post;

/**
 * Tests Activation Script
 *
 * @package    Noxgear
 * @subpackage Noxgear
 * @since      2019 Oct
 */
class PostTest extends WP_UnitTestCase {


	public function test_removes_line_breaks() {

		$post = new Post( 'test_title', '<div class="hs-featured-image-wrapper"> <a href="https://discover.worthingtonchristian.com/grades1-5/seeking-jesus-as-a-family-during-the-christmas-season" title="" class="hs-featured-image-link"> <img src="https://discover.worthingtonchristian.com/hubfs/Copy%20of%20Untitled.png" alt="Copy of Untitled" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"> </a> </div> <p>The Christmas season is often hectic. It seems that this time of year has almost become synonymous with busy-ness. Decorating, cooking and baking, shopping, scheduling out holiday events...all wonderful activities that have the potential to drown out the deeper meaning of the season.</p> <p>As parents, it\'s worth asking ourselves, "What are my children learning about Christmas through the way I approach the holiday? What am I communicating, directly and indirectly, about the meaning of Christmas?"</p>', 'https://whatever.com', 'Fri, 06 Dec 2019 00:00:00 GMT' );

		$this->assertStringStartsWith( 'The Christmas season is often hectic', $post->description );
		$this->assertContains( 'season. As parents', $post->description );
	}
}
