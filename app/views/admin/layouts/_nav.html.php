<?php

$nav = $this->helper('simplenav');
$nav->item('Artículos', '/articulos', array('highlights_on' => '/^\/(articulos(.*))?/'));

$this->render('navs/main', array(
	'nav'	=> $nav,
	'icons'	=> array('book')
));
