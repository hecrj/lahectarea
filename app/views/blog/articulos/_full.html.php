<article>
	<header>
		<h1><?= $post->title ?></h1>
		<h2><small>por</small> <?= $post->author ?> <small>el <?= $this->helper('time')->getFormatted($post->published_at) ?></small></h3>
		<img src="<?= $post->image ?>" title="Imagen de <?= $post->title ?>" class="img-rounded" />
	</header>
	<?= $this->helper('markdown')->translate($post->content) ?>
<?php foreach($post->cattegories as $cattegory)
	$cats[] = '<a href="/categoria/'. $cattegory->permalink .'">'. $cattegory->name .'</a>'; ?>
<?php foreach($post->tags as $key => $tag)
	$tags[] = '<a href="/tag/'. $tag->permalink .'">'. $tag->name .'</a>'; ?>
<?php if($cats): ?>
	<div class="filed">
			<?= 'Archivado en '. implode(', ', $cats) ?>
	<?php if(!empty($tags)): ?>
			<?= 'y etiquetado en '. implode(', ', $tags) ?>
	<?php endif; ?>
	</div>
<?php endif; ?>
</article>
