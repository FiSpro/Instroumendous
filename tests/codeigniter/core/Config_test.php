<<<<<<< HEAD
<?php

class Config_test extends CI_TestCase {

	public function set_up()
	{
		$cls =& $this->ci_core_class('cfg');

		// set predictable config values
		$this->cfg = array(
			'index_page'		=> 'index.php',
			'base_url'		=> 'http://example.com/',
			'subclass_prefix'	=> 'MY_'
		);
		$this->ci_set_config($this->cfg);

		$this->config = new $cls;
	}

	// --------------------------------------------------------------------

	public function test_item()
	{
		$this->assertEquals($this->cfg['base_url'], $this->config->item('base_url'));

		// Bad Config value
		$this->assertNull($this->config->item('no_good_item'));

		// Index
		$this->assertNull($this->config->item('no_good_item', 'bad_index'));
		$this->assertNull($this->config->item('no_good_item', 'default'));
	}

	// --------------------------------------------------------------------

	public function test_set_item()
	{
		$this->assertNull($this->config->item('not_yet_set'));

		$this->config->set_item('not_yet_set', 'is set');
		$this->assertEquals('is set', $this->config->item('not_yet_set'));
	}

	// --------------------------------------------------------------------

	public function test_slash_item()
	{
		// Bad Config value
		$this->assertNull($this->config->slash_item('no_good_item'));

		$this->assertEquals($this->cfg['base_url'], $this->config->slash_item('base_url'));
		$this->assertEquals($this->cfg['subclass_prefix'].'/', $this->config->slash_item('subclass_prefix'));
	}

	// --------------------------------------------------------------------

	public function test_base_url()
	{
		// Test regular base URL
		$base_url = $this->cfg['base_url'];
		$this->assertEquals($base_url, $this->config->base_url());

		// Test with URI
		$uri = 'test';
		$this->assertEquals($base_url.$uri, $this->config->base_url($uri));

		// Clear base_url
		$this->ci_set_config('base_url', '');

		// Rerun constructor
		$cls =& $this->ci_core_class('cfg');
		$this->config = new $cls;

		// Test default base
		$this->assertEquals('http://localhost/', $this->config->base_url());

		// Capture server vars
		$old_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : NULL;
		$old_script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : NULL;
		$old_script_filename = $_SERVER['SCRIPT_FILENAME'];
		$old_https = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : NULL;
		$old_server_addr = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : NULL;

		// The 'Host' header is user input and must not be trusted
		$_SERVER['HTTP_HOST'] = 'test.com';
		$this->config = new $cls;
		$this->assertEquals('http://localhost/', $this->config->base_url());

		// However, we may fallback to the server's IP address
		$_SERVER['SERVER_ADDR'] = '127.0.0.1';
		$_SERVER['SCRIPT_NAME'] = '/base_test.php';
		$_SERVER['SCRIPT_FILENAME'] = '/foo/bar/base_test.php';
		$this->config = new $cls;
		$this->assertEquals('http://127.0.0.1/', $this->config->base_url());

		// Making sure that HTTPS and URI path are also detected
		$_SERVER['HTTPS'] = 'on';
		$_SERVER['SCRIPT_NAME'] = '/path/base_test.php';
		$_SERVER['SCRIPT_FILENAME'] = '/foo/bar/path/base_test.php';
		$this->config = new $cls;
		$this->assertEquals('https://127.0.0.1/path/', $this->config->base_url());

		// Restore server vars
		$_SERVER['HTTP_HOST'] = $old_host;
		$_SERVER['SCRIPT_NAME'] = $old_script_name;
		$_SERVER['SCRIPT_FILENAME'] = $old_script_filename;
		$_SERVER['HTTPS'] = $old_https;
		$_SERVER['SERVER_ADDR'] = $old_server_addr;
	}

	// --------------------------------------------------------------------

	public function test_site_url()
	{
		$base_url = $this->cfg['base_url'];
		$index_page = $this->cfg['index_page'];
		$this->assertEquals($base_url.$index_page, $this->config->site_url());

		$old_base = $this->config->item('base_url');
		$this->config->set_item('base_url', '');

		$q_string = $this->config->item('enable_query_strings');
		$this->config->set_item('enable_query_strings', FALSE);

		$uri = 'test';
		$uri2 = '1';
		$this->assertEquals($index_page.'/'.$uri, $this->config->site_url($uri));
		$this->assertEquals($index_page.'/'.$uri.'/'.$uri2, $this->config->site_url(array($uri, $uri2)));

		$this->assertEquals($index_page.'/test/', $this->config->site_url('test/'));

		$suffix = 'ing';
		$this->config->set_item('url_suffix', $suffix);

		$arg = 'pass';
		$this->assertEquals($index_page.'/'.$uri.$suffix, $this->config->site_url($uri));
		$this->assertEquals($index_page.'/'.$uri.$suffix.'?'.$arg, $this->config->site_url($uri.'?'.$arg));

		$this->config->set_item('url_suffix', FALSE);
		$this->config->set_item('enable_query_strings', TRUE);

		$this->assertEquals($index_page.'?'.$uri, $this->config->site_url($uri));
		$this->assertEquals($index_page.'?0='.$uri.'&1='.$uri2, $this->config->site_url(array($uri, $uri2)));

		$this->config->set_item('base_url', $old_base);

		$this->assertEquals($base_url.$index_page.'?'.$uri, $this->config->site_url($uri));

		// back to home base
		$this->config->set_item('enable_query_strings', $q_string);
	}

	// --------------------------------------------------------------------

	public function test_load()
	{
		// Test regular load
		$file = 'test.php';
		$key = 'testconfig';
		$val = 'my_value';
		$cfg = array($key => $val);
		$this->ci_vfs_create($file, '<?php $config = '.var_export($cfg, TRUE).';', $this->ci_app_root, 'config');
		$this->assertTrue($this->config->load($file));
		$this->assertEquals($val, $this->config->item($key));

		// Test reload - value should not change
		$val2 = 'new_value';
		$cfg = array($key => $val2);
		$this->ci_vfs_create($file, '<?php $config = '.var_export($cfg, TRUE).';', $this->ci_app_root, 'config');
		$this->assertTrue($this->config->load($file));
		$this->assertEquals($val, $this->config->item($key));

		// Test section load
		$file = 'secttest';
		$cfg = array(
			'one' => 'prime',
			'two' => 2,
			'three' => TRUE
		);
		$this->ci_vfs_create($file.'.php', '<?php $config = '.var_export($cfg, TRUE).';', $this->ci_app_root, 'config');
		$this->assertTrue($this->config->load($file, TRUE));
		$this->assertEquals($cfg, $this->config->item($file));

		// Test section merge
		$cfg2 = array(
			'three' => 'tres',
			'number' => 42,
			'letter' => 'Z'
		);

		$pkg_dir = 'package';
		$this->ci_vfs_create(
			$file.'.php',
			'<?php $config = '.var_export($cfg2, TRUE).';',
			$this->ci_app_root,
			array($pkg_dir, 'config')
		);
		array_unshift($this->config->_config_paths, $this->ci_vfs_path($pkg_dir.'/', APPPATH));
		$this->assertTrue($this->config->load($file, TRUE));
		$this->assertEquals(array_merge($cfg, $cfg2), $this->config->item($file));
		array_shift($this->config->_config_paths);

		// Test graceful fail of invalid file
		$file = 'badfile';
		$this->ci_vfs_create($file, '', $this->ci_app_root, 'config');
		$this->assertFalse($this->config->load($file, FALSE, TRUE));

		// Test regular fail of invalid file
		$this->setExpectedException(
			'RuntimeException',
			'CI Error: Your '.$this->ci_vfs_path('config/'.$file.'.php', APPPATH).
				' file does not appear to contain a valid configuration array.'
		);
		$this->assertNull($this->config->load($file));
	}

	// --------------------------------------------------------------------

	public function test_load_nonexistent()
	{
		// Test graceful fail of nonexistent file
		$this->assertFalse($this->config->load('not_config_file', FALSE, TRUE));

		// Test regular fail
		$file = 'absentia';
		$this->setExpectedException(
			'RuntimeException',
			'CI Error: The configuration file '.$file.'.php does not exist.'
		);
		$this->assertNull($this->config->load($file));
	}

}
=======
<?php

class Config_test extends CI_TestCase {

	public function set_up()
	{
		$cls =& $this->ci_core_class('cfg');

		// set predictable config values
		$this->cfg = array(
			'index_page'		=> 'index.php',
			'base_url'		=> 'http://example.com/',
			'subclass_prefix'	=> 'MY_'
		);
		$this->ci_set_config($this->cfg);

		$this->config = new $cls;
	}

	// --------------------------------------------------------------------

	public function test_item()
	{
		$this->assertEquals($this->cfg['base_url'], $this->config->item('base_url'));

		// Bad Config value
		$this->assertNull($this->config->item('no_good_item'));

		// Index
		$this->assertNull($this->config->item('no_good_item', 'bad_index'));
		$this->assertNull($this->config->item('no_good_item', 'default'));
	}

	// --------------------------------------------------------------------

	public function test_set_item()
	{
		$this->assertNull($this->config->item('not_yet_set'));

		$this->config->set_item('not_yet_set', 'is set');
		$this->assertEquals('is set', $this->config->item('not_yet_set'));
	}

	// --------------------------------------------------------------------

	public function test_slash_item()
	{
		// Bad Config value
		$this->assertNull($this->config->slash_item('no_good_item'));

		$this->assertEquals($this->cfg['base_url'], $this->config->slash_item('base_url'));
		$this->assertEquals($this->cfg['subclass_prefix'].'/', $this->config->slash_item('subclass_prefix'));
	}

	// --------------------------------------------------------------------

	public function test_base_url()
	{
		// Test regular base URL
		$base_url = $this->cfg['base_url'];
		$this->assertEquals($base_url, $this->config->base_url());

		// Test with URI
		$uri = 'test';
		$this->assertEquals($base_url.$uri, $this->config->base_url($uri));

		// Clear base_url
		$this->ci_set_config('base_url', '');

		// Rerun constructor
		$cls =& $this->ci_core_class('cfg');
		$this->config = new $cls;

		// Test default base
		$this->assertEquals('http://localhost/', $this->config->base_url());

		// Capture server vars
		$old_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : NULL;
		$old_script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : NULL;
		$old_script_filename = $_SERVER['SCRIPT_FILENAME'];
		$old_https = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : NULL;
		$old_server_addr = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : NULL;

		// The 'Host' header is user input and must not be trusted
		$_SERVER['HTTP_HOST'] = 'test.com';
		$this->config = new $cls;
		$this->assertEquals('http://localhost/', $this->config->base_url());

		// However, we may fallback to the server's IP address
		$_SERVER['SERVER_ADDR'] = '127.0.0.1';
		$_SERVER['SCRIPT_NAME'] = '/base_test.php';
		$_SERVER['SCRIPT_FILENAME'] = '/foo/bar/base_test.php';
		$this->config = new $cls;
		$this->assertEquals('http://127.0.0.1/', $this->config->base_url());

		// Making sure that HTTPS and URI path are also detected
		$_SERVER['HTTPS'] = 'on';
		$_SERVER['SCRIPT_NAME'] = '/path/base_test.php';
		$_SERVER['SCRIPT_FILENAME'] = '/foo/bar/path/base_test.php';
		$this->config = new $cls;
		$this->assertEquals('https://127.0.0.1/path/', $this->config->base_url());

		// Restore server vars
		$_SERVER['HTTP_HOST'] = $old_host;
		$_SERVER['SCRIPT_NAME'] = $old_script_name;
		$_SERVER['SCRIPT_FILENAME'] = $old_script_filename;
		$_SERVER['HTTPS'] = $old_https;
		$_SERVER['SERVER_ADDR'] = $old_server_addr;
	}

	// --------------------------------------------------------------------

	public function test_site_url()
	{
		$base_url = $this->cfg['base_url'];
		$index_page = $this->cfg['index_page'];
		$this->assertEquals($base_url.$index_page, $this->config->site_url());

		$old_base = $this->config->item('base_url');
		$this->config->set_item('base_url', '');

		$q_string = $this->config->item('enable_query_strings');
		$this->config->set_item('enable_query_strings', FALSE);

		$uri = 'test';
		$uri2 = '1';
		$this->assertEquals($index_page.'/'.$uri, $this->config->site_url($uri));
		$this->assertEquals($index_page.'/'.$uri.'/'.$uri2, $this->config->site_url(array($uri, $uri2)));

		$this->assertEquals($index_page.'/test/', $this->config->site_url('test/'));

		$suffix = 'ing';
		$this->config->set_item('url_suffix', $suffix);

		$arg = 'pass';
		$this->assertEquals($index_page.'/'.$uri.$suffix, $this->config->site_url($uri));
		$this->assertEquals($index_page.'/'.$uri.$suffix.'?'.$arg, $this->config->site_url($uri.'?'.$arg));

		$this->config->set_item('url_suffix', FALSE);
		$this->config->set_item('enable_query_strings', TRUE);

		$this->assertEquals($index_page.'?'.$uri, $this->config->site_url($uri));
		$this->assertEquals($index_page.'?0='.$uri.'&1='.$uri2, $this->config->site_url(array($uri, $uri2)));

		$this->config->set_item('base_url', $old_base);

		$this->assertEquals($base_url.$index_page.'?'.$uri, $this->config->site_url($uri));

		// back to home base
		$this->config->set_item('enable_query_strings', $q_string);
	}

	// --------------------------------------------------------------------

	public function test_load()
	{
		// Test regular load
		$file = 'test.php';
		$key = 'testconfig';
		$val = 'my_value';
		$cfg = array($key => $val);
		$this->ci_vfs_create($file, '<?php $config = '.var_export($cfg, TRUE).';', $this->ci_app_root, 'config');
		$this->assertTrue($this->config->load($file));
		$this->assertEquals($val, $this->config->item($key));

		// Test reload - value should not change
		$val2 = 'new_value';
		$cfg = array($key => $val2);
		$this->ci_vfs_create($file, '<?php $config = '.var_export($cfg, TRUE).';', $this->ci_app_root, 'config');
		$this->assertTrue($this->config->load($file));
		$this->assertEquals($val, $this->config->item($key));

		// Test section load
		$file = 'secttest';
		$cfg = array(
			'one' => 'prime',
			'two' => 2,
			'three' => TRUE
		);
		$this->ci_vfs_create($file.'.php', '<?php $config = '.var_export($cfg, TRUE).';', $this->ci_app_root, 'config');
		$this->assertTrue($this->config->load($file, TRUE));
		$this->assertEquals($cfg, $this->config->item($file));

		// Test section merge
		$cfg2 = array(
			'three' => 'tres',
			'number' => 42,
			'letter' => 'Z'
		);

		$pkg_dir = 'package';
		$this->ci_vfs_create(
			$file.'.php',
			'<?php $config = '.var_export($cfg2, TRUE).';',
			$this->ci_app_root,
			array($pkg_dir, 'config')
		);
		array_unshift($this->config->_config_paths, $this->ci_vfs_path($pkg_dir.'/', APPPATH));
		$this->assertTrue($this->config->load($file, TRUE));
		$this->assertEquals(array_merge($cfg, $cfg2), $this->config->item($file));
		array_shift($this->config->_config_paths);

		// Test graceful fail of invalid file
		$file = 'badfile';
		$this->ci_vfs_create($file, '', $this->ci_app_root, 'config');
		$this->assertFalse($this->config->load($file, FALSE, TRUE));

		// Test regular fail of invalid file
		$this->setExpectedException(
			'RuntimeException',
			'CI Error: Your '.$this->ci_vfs_path('config/'.$file.'.php', APPPATH).
				' file does not appear to contain a valid configuration array.'
		);
		$this->assertNull($this->config->load($file));
	}

	// --------------------------------------------------------------------

	public function test_load_nonexistent()
	{
		// Test graceful fail of nonexistent file
		$this->assertFalse($this->config->load('not_config_file', FALSE, TRUE));

		// Test regular fail
		$file = 'absentia';
		$this->setExpectedException(
			'RuntimeException',
			'CI Error: The configuration file '.$file.'.php does not exist.'
		);
		$this->assertNull($this->config->load($file));
	}

}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
