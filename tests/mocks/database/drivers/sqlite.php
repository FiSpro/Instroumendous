<<<<<<< HEAD
<?php

class Mock_Database_Drivers_Sqlite extends Mock_Database_DB_Driver {

	/**
	 * Instantiate the database driver
	 *
	 * @param	array	DB configuration to set
	 * @return	void
	 */
	public function __construct($config = array())
	{
		parent::__construct('CI_DB_sqlite3_driver', $config);
	}

=======
<?php

class Mock_Database_Drivers_Sqlite extends Mock_Database_DB_Driver {

	/**
	 * Instantiate the database driver
	 *
	 * @param	array	DB configuration to set
	 * @return	void
	 */
	public function __construct($config = array())
	{
		parent::__construct('CI_DB_sqlite3_driver', $config);
	}

>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
}