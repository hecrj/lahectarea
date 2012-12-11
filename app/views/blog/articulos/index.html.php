<?php $this->extend('blog/layouts/main')->set('title', 'Novedades') ?>
<?php $this->render('blog/articulos/_subnav') ?>
<?php $this->render('blog/articulos/_section', array(
	'title' 		=> 'Novedades',
	'pagination'	=> $pagination
	)) ?>
