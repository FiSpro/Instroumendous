<<<<<<< HEAD
<?php

class Distinct_test extends CI_TestCase {

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
	public function test_distinct()
	{
		$users = $this->db->select('country')
					->distinct()
					->get('user')
					->result_array();

		$this->assertCount(3, $users);
	}

}
=======
<?php

class Distinct_test extends CI_TestCase {

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
	public function test_distinct()
	{
		$users = $this->db->select('country')
					->distinct()
					->get('user')
					->result_array();

		$this->assertCount(3, $users);
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
