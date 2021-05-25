<<<<<<< HEAD
<?php

class Xml_helper_test extends CI_TestCase {

	public function set_up()
	{
		$this->helper('xml');
	}

	public function test_xml_convert()
	{
		$this->assertEquals('&lt;tag&gt;my &amp; test &#45; &lt;/tag&gt;', xml_convert('<tag>my & test - </tag>'));
	}

=======
<?php

class Xml_helper_test extends CI_TestCase {

	public function set_up()
	{
		$this->helper('xml');
	}

	public function test_xml_convert()
	{
		$this->assertEquals('&lt;tag&gt;my &amp; test &#45; &lt;/tag&gt;', xml_convert('<tag>my & test - </tag>'));
	}

>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
}