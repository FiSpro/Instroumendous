<<<<<<< HEAD
<?php

return array(

	// Typical Database configuration
	'pdo/sqlite' => array(
		'dsn' => 'sqlite:/'.realpath(__DIR__.'/../..').'/ci_test.sqlite',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => 'sqlite',
		'dbdriver' => 'pdo',
		'subdriver' => 'sqlite'
	),

	// Database configuration with failover
	'pdo/sqlite_failover' => array(
		'dsn' => 'sqlite:not_exists.sqlite',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => 'sqlite',
		'dbdriver' => 'pdo',
		'subdriver' => 'sqlite',
		'failover' => array(
			array(
				'dsn' => 'sqlite:/'.realpath(__DIR__.'/../..').'/ci_test.sqlite',
				'hostname' => 'localhost',
				'username' => 'sqlite',
				'password' => 'sqlite',
				'database' => 'sqlite',
				'dbdriver' => 'pdo',
				'subdriver' => 'sqlite'
			)
		)
	)
=======
<?php

return array(

	// Typical Database configuration
	'pdo/sqlite' => array(
		'dsn' => 'sqlite:/'.realpath(__DIR__.'/../..').'/ci_test.sqlite',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => 'sqlite',
		'dbdriver' => 'pdo',
		'subdriver' => 'sqlite'
	),

	// Database configuration with failover
	'pdo/sqlite_failover' => array(
		'dsn' => 'sqlite:not_exists.sqlite',
		'hostname' => 'localhost',
		'username' => 'sqlite',
		'password' => 'sqlite',
		'database' => 'sqlite',
		'dbdriver' => 'pdo',
		'subdriver' => 'sqlite',
		'failover' => array(
			array(
				'dsn' => 'sqlite:/'.realpath(__DIR__.'/../..').'/ci_test.sqlite',
				'hostname' => 'localhost',
				'username' => 'sqlite',
				'password' => 'sqlite',
				'database' => 'sqlite',
				'dbdriver' => 'pdo',
				'subdriver' => 'sqlite'
			)
		)
	)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
);