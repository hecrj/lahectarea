<?php $this->extend('admin/layouts/main')->set('title', 'Redactar un artículo') ?>
<?php $this->render('admin/articulos/_subnav') ?>

<h2>Redactar un artículo</h2>
<?php $this->render('admin/articulos/_form', array('post' => $post)) ?>
