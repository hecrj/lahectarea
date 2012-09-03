<?php

/**
 *  You can include here any component or script you will need in every request
 */

# Default timezone
date_default_timezone_set('Europe/Madrid');

# Locale
setlocale(LC_ALL, 'es_ES.UTF-8');

const STATIC_URL = '';

# Load regular expressions
require(__DIR__ . '/pregs.php');

# Load application config
require(__DIR__ . '/application.php');