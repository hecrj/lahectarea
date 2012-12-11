<?php $this->extend('blog/layouts/main')->set('title', 'Archivados en '. $cattegory->name) ?>
<?php $this->render('blog/articulos/_subnav') ?>
<?php $this->render('blog/articulos/_section', array(
		'title' 		=> "Archivados en {$cattegory->name}",
		'pagination'	=> $pagination
	)) ?>
