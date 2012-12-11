<?php

$subnav = $this->helper('simplenav');
$subnav->item('la hectárea', '/acerca');
$subnav->item('El desarrollo', '/acerca/desarrollo');

$this->render('navs/secondary', array(
	'title'		=> 'Acerca de...',
	'path'		=>	'/acerca',
	'subnav'	=> $subnav,
	'icons'		=> array('home', 'cog')
	));
