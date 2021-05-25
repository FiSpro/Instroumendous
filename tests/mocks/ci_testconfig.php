<<<<<<< HEAD
<?php

class CI_TestConfig extends CI_Config {

	public $config = array();
	public $_config_paths = array(APPPATH);
	public $loaded = array();

	public function item($key, $index = '')
	{
		return isset($this->config[$key]) ? $this->config[$key] : FALSE;
	}

	public function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE)
	{
		$this->loaded[] = $file;
		return TRUE;
	}

}
=======
<?php

class CI_TestConfig extends CI_Config {

	public $config = array();
	public $_config_paths = array(APPPATH);
	public $loaded = array();

	public function item($key, $index = '')
	{
		return isset($this->config[$key]) ? $this->config[$key] : FALSE;
	}

	public function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE)
	{
		$this->loaded[] = $file;
		return TRUE;
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
