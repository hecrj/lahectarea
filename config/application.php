<?php

namespace App;

const ENV		= 'production';    # Set to current environment

# Load environment constants
require(__DIR__ .'/env/'. ENV . '.php');

const EMAIL		= 'webmaster@lahectarea.es';
const DOMAIN    = Env\DOMAIN;

# Load components configuration
require(__DIR__ . '/components.php');

# Load helpers configuration
require(__DIR__ . '/helpers.php');
