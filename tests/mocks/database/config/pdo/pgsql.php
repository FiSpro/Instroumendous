<<<<<<< HEAD
<?php

return array(

	// Typical Database configuration
	'pdo/pgsql' => array(
		'dsn' => 'pgsql:host=localhost;port=5432;dbname=ci_test;',
		'hostname' => 'localhost',
		'username' => 'postgres',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'pgsql'
	),

	// Database configuration with failover
	'pdo/pgsql_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'pgsql',
		'failover' => array(
			array(
				'dsn' => 'pgsql:host=localhost;port=5432;dbname=ci_test;',
				'hostname' => 'localhost',
				'username' => 'postgres',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'pdo',
				'subdriver' => 'pgsql'
			)
		)
	)
=======
<?php

return array(

	// Typical Database configuration
	'pdo/pgsql' => array(
		'dsn' => 'pgsql:host=localhost;port=5432;dbname=ci_test;',
		'hostname' => 'localhost',
		'username' => 'postgres',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'pgsql'
	),

	// Database configuration with failover
	'pdo/pgsql_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'pgsql',
		'failover' => array(
			array(
				'dsn' => 'pgsql:host=localhost;port=5432;dbname=ci_test;',
				'hostname' => 'localhost',
				'username' => 'postgres',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'pdo',
				'subdriver' => 'pgsql'
			)
		)
	)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
);