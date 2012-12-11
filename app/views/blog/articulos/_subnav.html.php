<?php

$subnav = $this->helper('simplenav');

$subnav->item('Novedades', '/articulos');
$subnav->item('Los más leídos', '/articulos/leidos');

$cat = $subnav->item('Explorar categoría', '#', array('highlights_on' => '/^\/categoria/'));
$cat->visibleIf($cat->isActive());

$tag = $subnav->item('Explorar tag', '#', array('highlights_on' => '/^\/tag/'));
$tag->visibleIf($tag->isActive());

$this->render('navs/secondary', array(
	'title'		=> 'Artículos',
	'path'		=> '/articulos',
	'subnav'	=> $subnav,
	'icons'		=> array('time', 'eye-open', 'folder-open', 'tags')
	));
