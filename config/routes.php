<?php

namespace Sea\Core\Components\Routing\Routes;

/**
 * Here you can configure the enrouting internal redirection.
 * See the example below to learn how it works:
 *
 * Every RouteCollection represents a collection of routes related to a module:
 * $routes = new RouteCollection(:moduleName); // The moduleName is optional
 * 
 * If you add a moduleName to the RouteCollection the controllers will be loaded
 * from /app/controllers/:moduleName/ folder.
 * 
 * Adding new routes to the collection is very simple:
 * 
 * $routes->addRoute(:routeName, :routePattern, :routeController);
 * 
 * For example, if you want to match '/contact' with PagesController::contact() you have to do:
 * 
 * $routes->addRoute('contact', '/contact', 'Pages:contact');
 * 
 * So, :routeController is an string with the format: controllerName:controllerAction
 * 
 * You can, of course, add arguments to the :routePattern that will be passed to the controller action.
 * Let's say that you want to match '/post/:permalink' with PostsController::read(:permalink), then:
 * 
 * $routes->addRoute('read_post', '/post/:permalink', 'Posts:read')
 * 
 * Now, the :permalink will be caught and passed to the Posts::read() method automatically.
 * 
 * But, what happens if you want the permalink to follow a format? No problem! You can add
 * requirements to any route you define. The method RouteCollection::addRoute() returns a Route object.
 * Let's say that you want the :permalink only be lower case characters and '-':
 * 
 * $routes	->addRoute('read_post', '/post/:permalink', 'Posts:read')
 * 				->addRequirement('permalink', '[a-z-]+');
 * 
 * By default, any parameter in the :routePattern has the requirement '[a-z0-9-]+' except :page and :id
 * which have '\d+' by default.
 * 
 * Finally, you have to return the collection related to a subdomain:
 * 
 * return array(
 * 		:subdomain	=>	$routes,
 *		[...]
 * );
 * 
 * As you see, every RouteCollection (or module) is related directly with a subdomain. This ables you to
 * create an admin module, for example:
 * 
 * $blog = new RouteCollection('blog');
 * 		// ...
 * 		
 * $admin = new RouteCollection('admin');
 * 		// ...
 * 	
 * return array(
 *		'www'	=>	$blog,
 *		'admin'	=>	$admin
 * );
 * 	
 * Now if you access towards the www subdomain the active module will be 'blog', otherwise in the admin
 * subdomain the 'admin' module will be active.
 */

$blog = new RouteCollection('blog');

	$blog->match('home', '/:page', 'index#index');
	$blog->match('read_post', '/articulo/:permalink', 'articulos#leer');
	$blog->match('posts', '/articulos/:page', 'articulos#index');
	$blog->match('explore_cattegory', '/categoria/:permalink/:page',
		'articulos#categoria');
	$blog->match('explore_tag', '/tag/:permalink/:page', 'articulos#tag');

$admin = new RouteCollection('admin');
	$admin->match('home', '/:page', 'articulos#index');
	$admin->match('posts', '/articulos/:page', 'articulos#index');

return array(
	'www'	=>	$blog,
	'admin'	=>	$admin
);
