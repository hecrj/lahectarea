<?php $this->extend('blog/layouts/main')->set('title', 'Portada') ?>
<?php $this->render('blog/articulos/_list', array('posts' => $pagination->getResults())) ?>
<?php $this->render('paginations/main', array('pagination' => $pagination)) ?>
<?php $this->helper('includes')->local('js', 'disqus') ?>
