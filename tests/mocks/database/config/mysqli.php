<<<<<<< HEAD
<?php

return array(

	// Typical Database configuration
	'mysqli' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'travis',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'mysqli'
	),

	// Database configuration with failover
	'mysqli_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'mysqli',
		'failover' => array(
			array(
				'dsn' => '',
				'hostname' => 'localhost',
				'username' => 'travis',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'mysqli',
			)
		)
	)
=======
<?php

return array(

	// Typical Database configuration
	'mysqli' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'travis',
		'password' => '',
		'database' => 'ci_test',
		'dbdriver' => 'mysqli'
	),

	// Database configuration with failover
	'mysqli_failover' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'not_travis',
		'password' => 'wrong password',
		'database' => 'not_ci_test',
		'dbdriver' => 'mysqli',
		'failover' => array(
			array(
				'dsn' => '',
				'hostname' => 'localhost',
				'username' => 'travis',
				'password' => '',
				'database' => 'ci_test',
				'dbdriver' => 'mysqli',
			)
		)
	)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
);