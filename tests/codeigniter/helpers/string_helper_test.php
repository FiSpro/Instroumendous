<<<<<<< HEAD
<?php

class String_helper_test extends CI_TestCase {

	public function set_up()
	{
		$this->helper('string');
	}

	public function test_strip_slashes()
	{
		$expected = array(
			"Is your name O'reilly?",
			"No, my name is O'connor."
		);

		$str = array(
			"Is your name O\'reilly?",
			"No, my name is O\'connor."
		);

		$this->assertEquals($expected, strip_slashes($str));
	}

	// --------------------------------------------------------------------

	public function test_strip_quotes()
	{
		$strs = array(
			'"me oh my!"'		=> 'me oh my!',
			"it's a winner!"	=> 'its a winner!',
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, strip_quotes($str));
		}
	}

	// --------------------------------------------------------------------

	public function test_quotes_to_entities()
	{
		$strs = array(
			'"me oh my!"'		=> '&quot;me oh my!&quot;',
			"it's a winner!"	=> 'it&#39;s a winner!',
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, quotes_to_entities($str));
		}
	}

	// --------------------------------------------------------------------

	public function test_reduce_double_slashes()
	{
		$strs = array(
			'http://codeigniter.com'		=> 'http://codeigniter.com',
			'//var/www/html/example.com/'	=> '/var/www/html/example.com/',
			'/var/www/html//index.php'		=> '/var/www/html/index.php'
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, reduce_double_slashes($str));
		}
	}

	// --------------------------------------------------------------------

	public function test_reduce_multiples()
	{
		$strs = array(
			'Fred, Bill,, Joe, Jimmy'	=> 'Fred, Bill, Joe, Jimmy',
			'Ringo, John, Paul,,'		=> 'Ringo, John, Paul,'
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, reduce_multiples($str));
		}

		$strs = array(
			'Fred, Bill,, Joe, Jimmy'	=> 'Fred, Bill, Joe, Jimmy',
			'Ringo, John, Paul,,'		=> 'Ringo, John, Paul'
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, reduce_multiples($str, ',', TRUE));
		}
	}

	// --------------------------------------------------------------------

	public function test_random_string()
	{
		$this->assertEquals(16, strlen(random_string('alnum', 16)));
		$this->assertEquals(32, strlen(random_string('unique', 16)));
		$this->assertInternalType('string', random_string('numeric', 16));
	}

	// --------------------------------------------------------------------

	public function test_increment_string()
	{
		$this->assertEquals('my-test_1', increment_string('my-test'));
		$this->assertEquals('my-test-1', increment_string('my-test', '-'));
		$this->assertEquals('file_5', increment_string('file_4'));
		$this->assertEquals('file-5', increment_string('file-4', '-'));
		$this->assertEquals('file-5', increment_string('file-4', '-'));
		$this->assertEquals('file-1', increment_string('file', '-', '1'));
		$this->assertEquals(124, increment_string('123', ''));
	}

}
=======
<?php

class String_helper_test extends CI_TestCase {

	public function set_up()
	{
		$this->helper('string');
	}

	public function test_strip_slashes()
	{
		$expected = array(
			"Is your name O'reilly?",
			"No, my name is O'connor."
		);

		$str = array(
			"Is your name O\'reilly?",
			"No, my name is O\'connor."
		);

		$this->assertEquals($expected, strip_slashes($str));
	}

	// --------------------------------------------------------------------

	public function test_strip_quotes()
	{
		$strs = array(
			'"me oh my!"'		=> 'me oh my!',
			"it's a winner!"	=> 'its a winner!',
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, strip_quotes($str));
		}
	}

	// --------------------------------------------------------------------

	public function test_quotes_to_entities()
	{
		$strs = array(
			'"me oh my!"'		=> '&quot;me oh my!&quot;',
			"it's a winner!"	=> 'it&#39;s a winner!',
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, quotes_to_entities($str));
		}
	}

	// --------------------------------------------------------------------

	public function test_reduce_double_slashes()
	{
		$strs = array(
			'http://codeigniter.com'		=> 'http://codeigniter.com',
			'//var/www/html/example.com/'	=> '/var/www/html/example.com/',
			'/var/www/html//index.php'		=> '/var/www/html/index.php'
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, reduce_double_slashes($str));
		}
	}

	// --------------------------------------------------------------------

	public function test_reduce_multiples()
	{
		$strs = array(
			'Fred, Bill,, Joe, Jimmy'	=> 'Fred, Bill, Joe, Jimmy',
			'Ringo, John, Paul,,'		=> 'Ringo, John, Paul,'
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, reduce_multiples($str));
		}

		$strs = array(
			'Fred, Bill,, Joe, Jimmy'	=> 'Fred, Bill, Joe, Jimmy',
			'Ringo, John, Paul,,'		=> 'Ringo, John, Paul'
		);

		foreach ($strs as $str => $expect)
		{
			$this->assertEquals($expect, reduce_multiples($str, ',', TRUE));
		}
	}

	// --------------------------------------------------------------------

	public function test_random_string()
	{
		$this->assertEquals(16, strlen(random_string('alnum', 16)));
		$this->assertEquals(32, strlen(random_string('unique', 16)));
		$this->assertInternalType('string', random_string('numeric', 16));
	}

	// --------------------------------------------------------------------

	public function test_increment_string()
	{
		$this->assertEquals('my-test_1', increment_string('my-test'));
		$this->assertEquals('my-test-1', increment_string('my-test', '-'));
		$this->assertEquals('file_5', increment_string('file_4'));
		$this->assertEquals('file-5', increment_string('file-4', '-'));
		$this->assertEquals('file-5', increment_string('file-4', '-'));
		$this->assertEquals('file-1', increment_string('file', '-', '1'));
		$this->assertEquals(124, increment_string('123', ''));
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
