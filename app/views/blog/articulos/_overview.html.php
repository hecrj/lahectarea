<article>
	<h4 class="overview">
		<a href="/articulo/<?= $post->permalink ?>"><?= $post->title ?></a>
		<small>
			<?= $this->helper('time')->getFormatted($post->published_at) ?>
			&nbsp;
			<a href="/articulo/<?= $post->permalink ?>#disqus_thread"></a>
		</small>
	</h4>
	<?= $this->helper('markdown')->translateSimple($post->description) ?>
</article>
