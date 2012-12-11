<?php $this->extend('admin/layouts/main')->set('title', 'Eliminar un artículo') ?>
<?php $this->render('admin/articulos/_subnav') ?>

<h2>Eliminar un artículo</h2>
<?php if($confirmed): ?>
<div class="alert alert-success">
	¡El artículo con título: <strong><?= $post->title ?></strong> ha sido eliminado con
	éxito!
</div>
<?php else: ?>
<div class="alert alert-block alert-error">
	<h4>¡Atención!</h4>
	<p>¿Estás seguro de que quieres eliminar el artículo con título:
		<strong><?= $post->title ?></strong>?</p>
	<form action="" method="post">
		<p>
			<button type="submit" class="btn btn-danger">Sí, eliminar el artículo</button>
			<a href="/articulos" class="btn">Cancelar</a>
		</p>
	</form>
</div>
<?php endif; ?>
