<?php

# Database configuration
$db = array(
	
	// Connections to database
	'connections'	=>	array(
		
		// Development connection
		'development'	=>	array(
			// Database type
			'type'		=>	'mysql',
			// Server of your database
			'server'	=>	'localhost',
			// Name of your database
			'name'		=>	'lahectarea',
			// User of your database
			'user'		=>	'local',
			// User password
			'password'	=>	'BvF9TVEMRRz4baYV',
			// Connection charset
			'charset'	=>	'utf8'
		)
		
	),
	
	// Default connection
	'default'	=>	App\ENV # Current environment as default connection
	
);
