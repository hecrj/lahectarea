<?php

namespace App\Components;
use Sea\Components\DynamicInjector;

class ComponentInjector extends DynamicInjector
{
	
	protected $classes = array(
		//'auth'			=>	'Sea\\Components\\Auth\\HTTP', // Uncomment this line to activate Auth component
		'cache'			=>	'Sea\\Components\\Cache\\Cache',
		'cookie'		=>	'Sea\\Components\\Cookie',
		'compiler'		=>	'Sea\\Components\\Routing\\Routes\\RouteCompiler',
		'context'		=>	'Sea\\Components\\Routing\\Context',
		'finder'		=>	'Sea\\Components\\Templating\\Finder',
		'generator'		=>	'Sea\\Components\\Routing\\Generators\\URLGenerator',
		'helpers'		=>	'App\\Components\\HelperInjector',
		'pagination'	=>	'Sea\\Components\\Pagination\\Pagination',
		'request'		=>	'Sea\\Components\\Routing\\Request',
		'resolvers'		=>	'Sea\\Components\\Routing\\Resolvers\\ResolverCollection',
		'router'		=>	'Sea\\Components\\Routing\\Router',
		'security'		=>	'Sea\\Components\\Security',
		'session'		=>	'Sea\\Components\\Session',
		'extractor'		=>	'Sea\\Components\\Routing\\Resolvers\\ExtractResolver',
		'matcher'		=>	'Sea\\Components\\Routing\\Resolvers\\MatchResolver',
		'templating'	=>	'Sea\\Components\\Templating\\Engine'
	);

	protected $dependencies = array(
		'auth'			=>	array('session', 'cookie'),
		'helpers'		=>	array('injector'),
		'generator'		=>	array('router', 'compiler', 'context'),
		'security'		=>	array('session', 'request'),
		'session'		=>	array('cookie', 'request'),
		'matcher'		=>	array('compiler'),
		'pagination'	=>	array('context', 'generator'),
		'resolvers'		=>	array('matcher', 'extractor'),
		'router'		=>	array('resolvers'),
		'templating'	=>	array('helpers', 'finder')
	);
	
	protected $shared = array(
		'auth', 'cache', 'cookie', 'compiler', 'context', 'generator', 'helpers', 'pagination',
		'request', 'router', 'session', 'security', 'templating'
	);
}
