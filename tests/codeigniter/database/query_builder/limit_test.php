<<<<<<< HEAD
<?php

class Limit_test extends CI_TestCase {

	/**
	 * @var object Database/Query Builder holder
	 */
	protected $db;

	public function set_up()
	{
		$this->db = Mock_Database_Schema_Skeleton::init(DB_DRIVER);

		Mock_Database_Schema_Skeleton::create_tables();
		Mock_Database_Schema_Skeleton::create_data();
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_limit()
	{
		$jobs = $this->db->limit(2)
		                      ->get('job')
		                      ->result_array();

		$this->assertCount(2, $jobs);
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_limit_and_offset()
	{
		$jobs = $this->db->limit(2, 2)
		                      ->get('job')
		                      ->result_array();

		$this->assertCount(2, $jobs);
		$this->assertEquals('Accountant', $jobs[0]['name']);
		$this->assertEquals('Musician', $jobs[1]['name']);
	}

}
=======
<?php

class Limit_test extends CI_TestCase {

	/**
	 * @var object Database/Query Builder holder
	 */
	protected $db;

	public function set_up()
	{
		$this->db = Mock_Database_Schema_Skeleton::init(DB_DRIVER);

		Mock_Database_Schema_Skeleton::create_tables();
		Mock_Database_Schema_Skeleton::create_data();
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_limit()
	{
		$jobs = $this->db->limit(2)
		                      ->get('job')
		                      ->result_array();

		$this->assertCount(2, $jobs);
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_limit_and_offset()
	{
		$jobs = $this->db->limit(2, 2)
		                      ->get('job')
		                      ->result_array();

		$this->assertCount(2, $jobs);
		$this->assertEquals('Accountant', $jobs[0]['name']);
		$this->assertEquals('Musician', $jobs[1]['name']);
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
