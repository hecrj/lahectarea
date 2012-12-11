<?php $this->extend('admin/layouts/main')->set('title', 'Lista de artículos') ?>
<?php $this->render('admin/articulos/_subnav') ?>

<h2>Lista de artículos</h2>
<?php

$table = $this->helper('table')
		->column('#', 'id')
		->column('Título', 'title')
		->column('Autor', 'author')
		->column('Publicada', 'published')
		->link('title', 'articulos/editar/:permalink')
		->link('remove', 'articulos/eliminar/:permalink')
		->fillWith($pagination->getResults());

$this->render('tables/main', array('table' => $table));
$this->render('paginations/main', array('pagination' => $pagination));

?>
