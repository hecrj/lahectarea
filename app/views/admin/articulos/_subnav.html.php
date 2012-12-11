<?php

$subnav = $this->helper('simplenav');

$subnav->item('Lista de artículos', '/articulos', array('highlights_on' => '/^\/(articulos)?$/'));
$subnav->item('Redactar un artículo', '/articulos/redactar');

$edit = $subnav->item('Editar un artículo', '#', array('highlights_on' => '/^\/articulos\/editar/'));
$edit->visibleIf($edit->isActive());

$delete = $subnav->item('Eliminar un artículo', '#', array('highlights_on' => '/^\/articulos\/eliminar/'));
$delete->visibleIf($delete->isActive());

$this->render('navs/secondary', array(
	'title'		=> 'Artículos',
	'path'		=>	'/articulos',
	'subnav'	=> $subnav,
	'icons'		=>	array('list-alt', 'pencil', 'edit', 'trash')
));
