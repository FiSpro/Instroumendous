<<<<<<< HEAD
<?php

return array(

	// Typical Database configuration
	'sqlite' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => realpath(__DIR__.'/..').'/ci_test.sqlite',
		'dbdriver' => 'sqlite3'
	),

	// Database configuration with failover
	'sqlite_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => '../not_exists.sqlite',
		'dbdriver' => 'sqlite3',
		'failover' => array(
			array(
				'dsn' => '',
				'hostname' => 'localhost',
				'username' => 'sqlite',
				'password' => 'sqlite',
				'database' => realpath(__DIR__.'/..').'/ci_test.sqlite',
				'dbdriver' => 'sqlite3'
			)
		)
	)
=======
<?php

return array(

	// Typical Database configuration
	'sqlite' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => realpath(__DIR__.'/..').'/ci_test.sqlite',
		'dbdriver' => 'sqlite3'
	),

	// Database configuration with failover
	'sqlite_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => '../not_exists.sqlite',
		'dbdriver' => 'sqlite3',
		'failover' => array(
			array(
				'dsn' => '',
				'hostname' => 'localhost',
				'username' => 'sqlite',
				'password' => 'sqlite',
				'database' => realpath(__DIR__.'/..').'/ci_test.sqlite',
				'dbdriver' => 'sqlite3'
			)
		)
	)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
);