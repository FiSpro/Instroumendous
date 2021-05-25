<<<<<<< HEAD
<?php

return array(

	// Typical Database configuration
	'mysql' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'travis',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'mysql'
	),

	// Database configuration with failover
	'mysql_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'mysql',
		'failover' => array(
			array(
				'dsn' => '',
				'hostname' => 'localhost',
				'username' => 'travis',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'mysql',
			)
		)
	)
=======
<?php

return array(

	// Typical Database configuration
	'mysql' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'travis',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'mysql'
	),

	// Database configuration with failover
	'mysql_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'mysql',
		'failover' => array(
			array(
				'dsn' => '',
				'hostname' => 'localhost',
				'username' => 'travis',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'mysql',
			)
		)
	)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
);