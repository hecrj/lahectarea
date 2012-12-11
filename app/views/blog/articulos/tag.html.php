<?php $this->extend('blog/layouts/main')->set('title', 'Etiquetados en '. $tag->name) ?>
<?php $this->render('blog/articulos/_subnav') ?>
<?php $this->render('blog/articulos/_section', array(
	'title' 		=> "Etiquetados en {$tag->name}",
	'pagination'	=> $pagination
	)) ?>
