<<<<<<< HEAD
<?php

class Parser_test extends CI_TestCase {

	public function set_up()
	{
		$this->parser = new CI_Parser();
		$this->ci_instance_var('parser', $this->parser);
	}

	// --------------------------------------------------------------------

	public function test_set_delimiters()
	{
		// Make sure default delimiters are there
		$this->assertEquals('{', $this->parser->l_delim);
		$this->assertEquals('}', $this->parser->r_delim);

		// Change them to square brackets
		$this->parser->set_delimiters('[', ']');

		// Make sure they changed
		$this->assertEquals('[', $this->parser->l_delim);
		$this->assertEquals(']', $this->parser->r_delim);

		// Reset them
		$this->parser->set_delimiters();

		// Make sure default delimiters are there
		$this->assertEquals('{', $this->parser->l_delim);
		$this->assertEquals('}', $this->parser->r_delim);
	}

	// --------------------------------------------------------------------

	public function test_parse_string()
	{
		$data = array(
			'title' => 'Page Title',
			'body' => 'Lorem ipsum dolor sit amet.'
		);

		$template = "{title}\n{body}";

		$result = implode("\n", $data);

		$this->assertEquals($result, $this->parser->parse_string($template, $data, TRUE));
	}

	// --------------------------------------------------------------------

	public function test_parse()
	{
		$this->_parse_no_template();
		$this->_parse_var_pair();
		$this->_mismatched_var_pair();
	}

	// --------------------------------------------------------------------

	private function _parse_no_template()
	{
		$this->assertFalse($this->parser->parse_string('', '', TRUE));
	}

	// --------------------------------------------------------------------

	private function _parse_var_pair()
	{
		$data = array(
			'title'		=> 'Super Heroes',
			'powers'	=> array(array('invisibility' => 'yes', 'flying' => 'no'))
		);

		$template = "{title}\n{powers}{invisibility}\n{flying}{/powers}\nsecond:{powers} {invisibility} {flying}{/powers}";

		$this->assertEquals("Super Heroes\nyes\nno\nsecond: yes no", $this->parser->parse_string($template, $data, TRUE));
	}

	// --------------------------------------------------------------------

	private function _mismatched_var_pair()
	{
		$data = array(
			'title'		=> 'Super Heroes',
			'powers'	=> array(array('invisibility' => 'yes', 'flying' => 'no'))
		);

		$template = "{title}\n{powers}{invisibility}\n{flying}";
		$result = "Super Heroes\n{powers}{invisibility}\n{flying}";

		$this->assertEquals($result, $this->parser->parse_string($template, $data, TRUE));
	}

=======
<?php

class Parser_test extends CI_TestCase {

	public function set_up()
	{
		$this->parser = new CI_Parser();
		$this->ci_instance_var('parser', $this->parser);
	}

	// --------------------------------------------------------------------

	public function test_set_delimiters()
	{
		// Make sure default delimiters are there
		$this->assertEquals('{', $this->parser->l_delim);
		$this->assertEquals('}', $this->parser->r_delim);

		// Change them to square brackets
		$this->parser->set_delimiters('[', ']');

		// Make sure they changed
		$this->assertEquals('[', $this->parser->l_delim);
		$this->assertEquals(']', $this->parser->r_delim);

		// Reset them
		$this->parser->set_delimiters();

		// Make sure default delimiters are there
		$this->assertEquals('{', $this->parser->l_delim);
		$this->assertEquals('}', $this->parser->r_delim);
	}

	// --------------------------------------------------------------------

	public function test_parse_string()
	{
		$data = array(
			'title' => 'Page Title',
			'body' => 'Lorem ipsum dolor sit amet.'
		);

		$template = "{title}\n{body}";

		$result = implode("\n", $data);

		$this->assertEquals($result, $this->parser->parse_string($template, $data, TRUE));
	}

	// --------------------------------------------------------------------

	public function test_parse()
	{
		$this->_parse_no_template();
		$this->_parse_var_pair();
		$this->_mismatched_var_pair();
	}

	// --------------------------------------------------------------------

	private function _parse_no_template()
	{
		$this->assertFalse($this->parser->parse_string('', '', TRUE));
	}

	// --------------------------------------------------------------------

	private function _parse_var_pair()
	{
		$data = array(
			'title'		=> 'Super Heroes',
			'powers'	=> array(array('invisibility' => 'yes', 'flying' => 'no'))
		);

		$template = "{title}\n{powers}{invisibility}\n{flying}{/powers}\nsecond:{powers} {invisibility} {flying}{/powers}";

		$this->assertEquals("Super Heroes\nyes\nno\nsecond: yes no", $this->parser->parse_string($template, $data, TRUE));
	}

	// --------------------------------------------------------------------

	private function _mismatched_var_pair()
	{
		$data = array(
			'title'		=> 'Super Heroes',
			'powers'	=> array(array('invisibility' => 'yes', 'flying' => 'no'))
		);

		$template = "{title}\n{powers}{invisibility}\n{flying}";
		$result = "Super Heroes\n{powers}{invisibility}\n{flying}";

		$this->assertEquals($result, $this->parser->parse_string($template, $data, TRUE));
	}

>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
}