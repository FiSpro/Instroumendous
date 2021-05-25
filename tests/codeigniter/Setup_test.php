<<<<<<< HEAD
<?php

class Setup_test extends PHPUnit_Framework_TestCase {

	public function test_bootstrap_constants()
	{
		$this->assertTrue(defined('PROJECT_BASE'));
		$this->assertTrue(defined('BASEPATH'));
		$this->assertTrue(defined('APPPATH'));
		$this->assertTrue(defined('VIEWPATH'));
	}

=======
<?php

class Setup_test extends PHPUnit_Framework_TestCase {

	public function test_bootstrap_constants()
	{
		$this->assertTrue(defined('PROJECT_BASE'));
		$this->assertTrue(defined('BASEPATH'));
		$this->assertTrue(defined('APPPATH'));
		$this->assertTrue(defined('VIEWPATH'));
	}

>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
}