<?php

// Load database configuration
require(\Sea\DIR . '/config/database.php');

// Initialize ActiveRecord configuration
\ActiveRecord\Config::initialize(
function($cfg) use ($db)
{
	// Set path to models directory
	$cfg->set_model_directory(\Sea\DIR . 'app/models/');

	// Define connections as protocol url
	foreach($db['connections'] as $connection => $options)
		$connections[$connection] = $options['type'] . '://' . $options['user'] . ':' . $options['password'] . '@' . $options['server'] . '/' . $options['name'] .'?charset='. $options['charset'];

	// Set connections
	$cfg->set_connections($connections);

	// Set default connection
	$cfg->set_default_connection($db['default']);

	// Set error messages
	$cfg->set_error_messages(array(
		'inclusion'    => "no se incluye en la lista",
		'exclusion'    => "no puede utilizarse",
		'invalid'      => "no tiene un formato válido",
		'confirmation' => "no coincide con la confirmación",
		'accepted'     => "deben aceptarse",
		'empty'        => "no puede estar vacío",
		'blank'        => "no puede estar en blanco",
		'too_long'     => "debe contener menos de %d+1 caracteres",
		'too_short'    => "debe contener más de %d-1 caracteres",
		'wrong_length' => "tiene una longitud equivocada (debe ser de %d caracteres)",
		'taken'        => "ya está en uso",
		'not_a_number' => "no es un número",
		'greater_than' => "debe ser mayor que %d",
		'equal_to'     => "de ser igual a %d",
		'less_than'    => "debe ser menor que %d",
		'odd'          => "debe ser raro",
		'even'         => "debe ser normal",
		'unique'       => "debe ser original",
		'less_than_or_equal_to' => "debe ser menor o igual a %d",
		'greater_than_or_equal_to' => "debe ser mayor o igual a %d",
		'misstyped'    =>  'no coincide'
	));
}
);
