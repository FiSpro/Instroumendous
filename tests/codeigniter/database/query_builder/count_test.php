<<<<<<< HEAD
<?php

class Count_test extends CI_TestCase {

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
	public function test_count_all()
	{
		$this->assertEquals(4, $this->db->count_all('job'));
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_count_all_results()
	{
		$this->assertEquals(2, $this->db->like('name', 'ian')->count_all_results('job'));
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_count_all_results_limit()
	{
		$this->assertEquals(1, $this->db->like('name', 'ian')->limit(1)->count_all_results('job'));
	}

=======
<?php

class Count_test extends CI_TestCase {

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
	public function test_count_all()
	{
		$this->assertEquals(4, $this->db->count_all('job'));
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_count_all_results()
	{
		$this->assertEquals(2, $this->db->like('name', 'ian')->count_all_results('job'));
	}

	// ------------------------------------------------------------------------

	/**
	 * @see ./mocks/schema/skeleton.php
	 */
	public function test_count_all_results_limit()
	{
		$this->assertEquals(1, $this->db->like('name', 'ian')->limit(1)->count_all_results('job'));
	}

>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
}