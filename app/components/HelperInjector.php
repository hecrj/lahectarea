<?php

namespace App\Components;
use Sea\Components\DynamicInjector;

class HelperInjector extends DynamicInjector
{
	protected $injectorClass = 'App\\Components\\ComponentInjector';
	
	protected $classes = array(
		'cache'				=>	'Sea\\Helpers\\Cache',
		'form'				=>	'Sea\\Helpers\\Form\\Form',
		'includes'			=>	'App\\Helpers\\Includes',
		'markdown'			=>	'Markdown\\Helper',
		'simplenav'			=>	'App\\Helpers\\SimpleNav',
		'table'				=>	'App\\Helpers\\Table',
		'time'				=>	'App\\Helpers\\Time'
	);

	protected $dependencies = array(	
		'cache'			=>	array('templating'),
		'form'			=>	array('security', 'request'),
		'simplenav'		=>	array('request')
	);
	
	protected $shared = array('cache', 'includes', 'markdown', 'time');
	
}
