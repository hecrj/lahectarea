<?php $this->extend('admin/layouts/main')->set('title', 'Editar un artículo') ?>
<?php $this->render('admin/articulos/_subnav') ?>

<h2>Editar un artículo</h2>
<?php $this->render('admin/articulos/_form', array('post' => $post)) ?>
