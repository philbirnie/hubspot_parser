<?php

use Hubspot_Feed\Processor\Xml_To_Json_Converter;

/**
 * Parses XML
 *
 * @package    Worthington Christian
 * @subpackage Worthington Christian
 * @since      2019 Dec
 */

class ParseTest extends WP_UnitTestCase {

	public function test_invalid_xml_throws_exception() {
		$this->expectException(InvalidArgumentException::class);

		$converter = new Xml_To_Json_Converter('some_invlaid_xml');
		$converter->convert();
	}

	public function test_valid_xml_returns_correct_json(  ) {
		$converter = new Xml_To_Json_Converter($this->sample_xml);
		$result = $converter->convert();

		$json_result = json_decode($result);

		$this->assertEquals($json_result[0]->title,'High (School) Stakes [Q & A with Forbes publisher, Rich Karlgaard]');
		$this->assertEquals($json_result[0]->link, 'https://discover.worthingtonchristian.com/grades9-12/high-school-stakes-our-cultures-obsession-with-early-achievement-is-damaging-youth-q-a-with-forbes-publisher-rich-karlgaard');
		$this->assertEquals($json_result[0]->date, 'December 3, 2019');
	}


	protected $sample_xml = '<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" version="2.0">
  <channel>
    <title>Parent Blog-Grades 9-12</title>
    <link>https://discover.worthingtonchristian.com/grades9-12</link>
    <description>Navigating your child\'s education is more than just the three R\'s. Here you\'ll find trends, resources, and perspectives on issues facing today\'s students who are preparing for kindergarten, college, and the grades in between.</description>
    <language>en-us</language>
    <pubDate>Wed, 04 Dec 2019 00:00:00 GMT</pubDate>
    <dc:date>2019-12-04T00:00:00Z</dc:date>
    <dc:language>en-us</dc:language>
    <item>
      <title>High (School) Stakes [Q &amp; A with Forbes publisher, Rich Karlgaard]</title>
      <link>https://discover.worthingtonchristian.com/grades9-12/high-school-stakes-our-cultures-obsession-with-early-achievement-is-damaging-youth-q-a-with-forbes-publisher-rich-karlgaard</link>
      <description>&lt;div class="hs-featured-image-wrapper"&gt; 
 &lt;a href="https://discover.worthingtonchristian.com/grades9-12/high-school-stakes-our-cultures-obsession-with-early-achievement-is-damaging-youth-q-a-with-forbes-publisher-rich-karlgaard" title="" class="hs-featured-image-link"&gt; &lt;img src="https://discover.worthingtonchristian.com/hubfs/Rich%20Karlgaard-Facebook%20Post%20Size.png" alt="Rich Karlgaard-Facebook Post Size" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"&gt; &lt;/a&gt; 
&lt;/div&gt;    
&lt;p&gt;I recently published my latest book, &lt;em&gt;Late Bloomers: The Power of Patience in a World Obsessed with Early Achievement&lt;/em&gt;. Below is a question-and-answer &lt;a href="https://www.psychologytoday.com/us/blog/the-author-speaks/201904/late-bloomers"&gt;session&lt;/a&gt; I did with &lt;em&gt;Psychology Today&lt;/em&gt; soon after the book’s release. I’ve edited it exclusively for "Navigating Your Child\'s Education: Blog for Parents." I am also coming to central Ohio on Thursday, February 13, 2020 to speak to parents on this topic. Click on the picture below for more information.&lt;/p&gt;</description>
      <content:encoded>&lt;div class="hs-featured-image-wrapper"&gt; 
 &lt;a href="https://discover.worthingtonchristian.com/grades9-12/high-school-stakes-our-cultures-obsession-with-early-achievement-is-damaging-youth-q-a-with-forbes-publisher-rich-karlgaard" title="" class="hs-featured-image-link"&gt; &lt;img src="https://discover.worthingtonchristian.com/hubfs/Rich%20Karlgaard-Facebook%20Post%20Size.png" alt="Rich Karlgaard-Facebook Post Size" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"&gt; &lt;/a&gt; 
&lt;/div&gt;    
&lt;p&gt;I recently published my latest book, &lt;em&gt;Late Bloomers: The Power of Patience in a World Obsessed with Early Achievement&lt;/em&gt;. Below is a question-and-answer &lt;a href="https://www.psychologytoday.com/us/blog/the-author-speaks/201904/late-bloomers"&gt;session&lt;/a&gt; I did with &lt;em&gt;Psychology Today&lt;/em&gt; soon after the book’s release. I’ve edited it exclusively for "Navigating Your Child\'s Education: Blog for Parents." I am also coming to central Ohio on Thursday, February 13, 2020 to speak to parents on this topic. Click on the picture below for more information.&lt;/p&gt;    
&lt;img src="https://track.hubspot.com/__ptq.gif?a=5627441&amp;amp;k=14&amp;amp;r=https%3A%2F%2Fdiscover.worthingtonchristian.com%2Fgrades9-12%2Fhigh-school-stakes-our-cultures-obsession-with-early-achievement-is-damaging-youth-q-a-with-forbes-publisher-rich-karlgaard&amp;amp;bu=https%253A%252F%252Fdiscover.worthingtonchristian.com%252Fgrades9-12&amp;amp;bvt=rss" alt="" width="1" height="1" style="min-height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important; "&gt;</content:encoded>
      <category>Teens</category>
      <category>Parenting</category>
      <category>High School</category>
      <category>College Admissions</category>
      <category>Anxiety</category>
      <category>Mental Health</category>
      <category>Teen Mental Health</category>
      <pubDate>Wed, 04 Dec 2019 00:00:00 GMT</pubDate>
      <guid>https://discover.worthingtonchristian.com/grades9-12/high-school-stakes-our-cultures-obsession-with-early-achievement-is-damaging-youth-q-a-with-forbes-publisher-rich-karlgaard</guid>
      <dc:date>2019-12-04T00:00:00Z</dc:date>
      <dc:creator>Rich Karlgaard</dc:creator>
    </item>
    <item>
      <title>More than a Number: Holistic Review in College Admissions</title>
      <link>https://discover.worthingtonchristian.com/grades9-12/more-than-a-number-holistic-college-admissions</link>
      <description>&lt;div class="hs-featured-image-wrapper"&gt; 
 &lt;a href="https://discover.worthingtonchristian.com/grades9-12/more-than-a-number-holistic-college-admissions" title="" class="hs-featured-image-link"&gt; &lt;img src="https://discover.worthingtonchristian.com/hubfs/Blog%20Feature%20Images/More%20than%20a%20Number_Holistic%20College%20Admissions.png" alt="More than a Number_Holistic College Admissions" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"&gt; &lt;/a&gt; 
&lt;/div&gt;    
&lt;p&gt;Every year, I have hundreds of interactions at college fairs and high school visits with students who approach me with a nervous and apprehensive look. With sadness, they admit that their GPA isn’t as high as they would like it to be, or that they don’t do well on standardized tests like the ACT or SAT. My message to those students is always the same, and it’s the same message I give to you today:&lt;/p&gt;</description>
      <content:encoded>&lt;div class="hs-featured-image-wrapper"&gt; 
 &lt;a href="https://discover.worthingtonchristian.com/grades9-12/more-than-a-number-holistic-college-admissions" title="" class="hs-featured-image-link"&gt; &lt;img src="https://discover.worthingtonchristian.com/hubfs/Blog%20Feature%20Images/More%20than%20a%20Number_Holistic%20College%20Admissions.png" alt="More than a Number_Holistic College Admissions" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"&gt; &lt;/a&gt; 
&lt;/div&gt;    
&lt;p&gt;Every year, I have hundreds of interactions at college fairs and high school visits with students who approach me with a nervous and apprehensive look. With sadness, they admit that their GPA isn’t as high as they would like it to be, or that they don’t do well on standardized tests like the ACT or SAT. My message to those students is always the same, and it’s the same message I give to you today:&lt;/p&gt;    
&lt;img src="https://track.hubspot.com/__ptq.gif?a=5627441&amp;amp;k=14&amp;amp;r=https%3A%2F%2Fdiscover.worthingtonchristian.com%2Fgrades9-12%2Fmore-than-a-number-holistic-college-admissions&amp;amp;bu=https%253A%252F%252Fdiscover.worthingtonchristian.com%252Fgrades9-12&amp;amp;bvt=rss" alt="" width="1" height="1" style="min-height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important; "&gt;</content:encoded>
      <category>High School</category>
      <category>College Admissions</category>
      <category>College Readiness</category>
      <pubDate>Wed, 13 Nov 2019 00:00:00 GMT</pubDate>
      <guid>https://discover.worthingtonchristian.com/grades9-12/more-than-a-number-holistic-college-admissions</guid>
      <dc:date>2019-11-13T00:00:00Z</dc:date>
      <dc:creator>Tyler Bradshaw</dc:creator>
    </item>
    <item>
      <title>Youth Sports: To Specialize or Not to Specialize</title>
      <link>https://discover.worthingtonchristian.com/grades9-12/youth-sports-to-specialize-or-not-to-specialize</link>
      <description>&lt;div class="hs-featured-image-wrapper"&gt; 
 &lt;a href="https://discover.worthingtonchristian.com/grades9-12/youth-sports-to-specialize-or-not-to-specialize" title="" class="hs-featured-image-link"&gt; &lt;img src="https://discover.worthingtonchristian.com/hubfs/Youth%20Sports_-2.png" alt="Youth Sports_-2" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"&gt; &lt;/a&gt; 
&lt;/div&gt;    
&lt;p&gt;Over the last two decades, the trend of sport specialization has hit an all-time high in youth athletics. More and more young athletes are&amp;nbsp;&lt;em&gt;specializing:&lt;/em&gt;&amp;nbsp;devoting their energy, time, and ability to one singular sport. Many club sports play eleven months out of the year. School sports teams play their season and often spend the remainder of the year in extended workouts, team training camps, and skill-building sessions. In addition to team commitments, it’s not uncommon for individuals to hire private trainers to help them further develop their abilities.&lt;/p&gt;</description>
      <content:encoded>&lt;div class="hs-featured-image-wrapper"&gt; 
 &lt;a href="https://discover.worthingtonchristian.com/grades9-12/youth-sports-to-specialize-or-not-to-specialize" title="" class="hs-featured-image-link"&gt; &lt;img src="https://discover.worthingtonchristian.com/hubfs/Youth%20Sports_-2.png" alt="Youth Sports_-2" class="hs-featured-image" style="width:auto !important; max-width:50%; float:left; margin:0 15px 15px 0;"&gt; &lt;/a&gt; 
&lt;/div&gt;    
&lt;p&gt;Over the last two decades, the trend of sport specialization has hit an all-time high in youth athletics. More and more young athletes are&amp;nbsp;&lt;em&gt;specializing:&lt;/em&gt;&amp;nbsp;devoting their energy, time, and ability to one singular sport. Many club sports play eleven months out of the year. School sports teams play their season and often spend the remainder of the year in extended workouts, team training camps, and skill-building sessions. In addition to team commitments, it’s not uncommon for individuals to hire private trainers to help them further develop their abilities.&lt;/p&gt;    
&lt;img src="https://track.hubspot.com/__ptq.gif?a=5627441&amp;amp;k=14&amp;amp;r=https%3A%2F%2Fdiscover.worthingtonchristian.com%2Fgrades9-12%2Fyouth-sports-to-specialize-or-not-to-specialize&amp;amp;bu=https%253A%252F%252Fdiscover.worthingtonchristian.com%252Fgrades9-12&amp;amp;bvt=rss" alt="" width="1" height="1" style="min-height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important; "&gt;</content:encoded>
      <category>High School</category>
      <category>Sports</category>
      <category>Specialization</category>
      <pubDate>Thu, 31 Oct 2019 23:00:00 GMT</pubDate>
      <guid>https://discover.worthingtonchristian.com/grades9-12/youth-sports-to-specialize-or-not-to-specialize</guid>
      <dc:date>2019-10-31T23:00:00Z</dc:date>
      <dc:creator>Jeff Hartings</dc:creator>
    </item>
  </channel>
</rss>
';

}
