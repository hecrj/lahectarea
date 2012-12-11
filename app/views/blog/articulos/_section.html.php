<section>
	<h2><?= $title ?></h2>
<?php $this->render('blog/articulos/_list', array('posts' => $pagination->getResults())) ?>
<?php $this->render('paginations/main', array('pagination' => $pagination)) ?>
</section>
<?php $this->helper('includes')->local('js', 'disqus') ?>