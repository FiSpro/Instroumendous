<<<<<<< HEAD
<?php

/**
 * Mock library to subclass Driver for testing
 */
class Mock_Libraries_Driver extends CI_Driver_Library {
	/**
	 * Set valid drivers list
	 */
	public function driver_list($drivers = NULL)
	{
		if (empty($drivers))
		{
			return $this->valid_drivers;
		}

		$this->valid_drivers = (array) $drivers;
	}

	/**
	 * Get library name
	 */
	public function get_name()
	{
		return $this->lib_name;
	}
=======
<?php

/**
 * Mock library to subclass Driver for testing
 */
class Mock_Libraries_Driver extends CI_Driver_Library {
	/**
	 * Set valid drivers list
	 */
	public function driver_list($drivers = NULL)
	{
		if (empty($drivers))
		{
			return $this->valid_drivers;
		}

		$this->valid_drivers = (array) $drivers;
	}

	/**
	 * Get library name
	 */
	public function get_name()
	{
		return $this->lib_name;
	}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
}