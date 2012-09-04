<?php

namespace Sea\App\Components;
use Sea\Core\Components\DynamicInjector;

class HelperInjector extends DynamicInjector
{
	protected $injectorClass = 'Sea\\App\\Components\\ComponentInjector';
	
	protected $classes = array(
		'cache'				=>	'Sea\\Core\\Helpers\\Cache',
		'form'				=>	'Sea\\Core\\Helpers\\Form\\Form',
		'includes'			=>	'Sea\\App\\Helpers\\Includes',
		'markdown'			=>	'Markdown\\Helper',
		'simplenav'			=>	'Sea\\App\\Helpers\\SimpleNav',
		'table'				=>	'Sea\\App\\Helpers\\Table',
		'time'				=>	'Sea\\App\\Helpers\\Time'
	);

	protected $dependencies = array(	
		'cache'			=>	array('templating'),
		'form'			=>	array('security', 'request'),
		'simplenav'		=>	array('request')
	);
	
	protected $shared = array('cache', 'includes', 'markdown', 'time');
	
}
