<?php

$nav = $this->helper('simplenav');

$nav->item('Portada', '/', array('highlights_on' => '/^\/([0-9]+)?$/'));

$nav->defaults(array('subpath' => true));
$nav->item('Artículos', '/articulos', array(
	'highlights_on' => '/^\/(articulo(s)?|categoria|tag)/'
	));
$nav->item('Acerca de...', '/acerca');
$nav->item('Contacto', '/contacto');

$this->render('navs/main', array(
	'nav'	=> $nav,
	'icons'	=> array('home', 'book', 'info-sign', 'envelope')
	));
