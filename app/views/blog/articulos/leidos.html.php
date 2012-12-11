<?php $this->extend('blog/layouts/main')->set('title', 'Los más leídos') ?>
<?php $this->render('blog/articulos/_subnav') ?>
<section>
	<h2>Los más leídos</h2>
<?php $this->render('blog/articulos/_list', array('posts' => $posts)) ?>
</section>
<?php $this->helper('includes')->local('js', 'disqus') ?>