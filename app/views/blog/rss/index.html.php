<?php $this->extend('layouts/rss') ?>
<?php foreach($posts as $post): ?>
<?php 

$this->helper('cache')
	->to($post)
	->render(
		'rss',
		'blog/articulos/_rss',
		array('post' => $post)
	);

?>
<?php endforeach ?>
