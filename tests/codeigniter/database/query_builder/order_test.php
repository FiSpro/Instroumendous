<<<<<<< HEAD
<?php

class Order_test extends CI_TestCase {

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
	public function test_order_ascending()
	{
		$jobs = $this->db->order_by('name', 'asc')
		                      ->get('job')
		                      ->result_array();

		// Check the result
		$this->assertCount(4, $jobs);
		$this->assertEquals('Accountant', $jobs[0]['name']);
		$this->assertEquals('Developer', $jobs[1]['name']);
		$this->assertEquals('Musician', $jobs[2]['name']);
		$this->assertEquals('Politician', $jobs[3]['name']);
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_order_descending()
	{
		$jobs = $this->db->order_by('name', 'desc')
		                      ->get('job')
		                      ->result_array();

		$this->assertCount(4, $jobs);
		$this->assertEquals('Politician', $jobs[0]['name']);
		$this->assertEquals('Musician', $jobs[1]['name']);
		$this->assertEquals('Developer', $jobs[2]['name']);
		$this->assertEquals('Accountant', $jobs[3]['name']);
	}

}
=======
<?php

class Order_test extends CI_TestCase {

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
	public function test_order_ascending()
	{
		$jobs = $this->db->order_by('name', 'asc')
		                      ->get('job')
		                      ->result_array();

		// Check the result
		$this->assertCount(4, $jobs);
		$this->assertEquals('Accountant', $jobs[0]['name']);
		$this->assertEquals('Developer', $jobs[1]['name']);
		$this->assertEquals('Musician', $jobs[2]['name']);
		$this->assertEquals('Politician', $jobs[3]['name']);
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_order_descending()
	{
		$jobs = $this->db->order_by('name', 'desc')
		                      ->get('job')
		                      ->result_array();

		$this->assertCount(4, $jobs);
		$this->assertEquals('Politician', $jobs[0]['name']);
		$this->assertEquals('Musician', $jobs[1]['name']);
		$this->assertEquals('Developer', $jobs[2]['name']);
		$this->assertEquals('Accountant', $jobs[3]['name']);
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
