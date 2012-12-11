<?php $cache = $this->helper('cache'); ?>
<?php $i = 0; ?>
<?php foreach($posts as $post): ?>
<?php $cache->to($post)->render(
		'overview',
		'blog/articulos/_overview',
		array('post' => $post)
		) ?>
<?php endforeach ?>
