<<<<<<< HEAD
<?php

return array(

	// Typical Database configuration
	'pdo/mysql' => array(
		'dsn' => 'mysql:host=localhost;dbname=ci_test',
		'hostname' => 'localhost',
		'username' => 'travis',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'mysql'
	),

	// Database configuration with failover
	'pdo/mysql_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'mysql',
		'failover' => array(
			array(
				'dsn' => 'mysql:host=localhost;dbname=ci_test',
				'hostname' => 'localhost',
				'username' => 'travis',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'pdo',
				'subdriver' => 'mysql'
			)
		)
	)
=======
<?php

return array(

	// Typical Database configuration
	'pdo/mysql' => array(
		'dsn' => 'mysql:host=localhost;dbname=ci_test',
		'hostname' => 'localhost',
		'username' => 'travis',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'mysql'
	),

	// Database configuration with failover
	'pdo/mysql_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'pdo',
		'subdriver' => 'mysql',
		'failover' => array(
			array(
				'dsn' => 'mysql:host=localhost;dbname=ci_test',
				'hostname' => 'localhost',
				'username' => 'travis',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'pdo',
				'subdriver' => 'mysql'
			)
		)
	)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
);