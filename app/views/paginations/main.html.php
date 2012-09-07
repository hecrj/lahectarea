<div class="pagination pagination-centered">
	<ul>
<?php if($pagination->hasPrevious()): ?>
		<li>
			<a href="<?= $pagination->getPreviousPath() ?>">&larr; Anterior</a>
		</li>
<?php endif; ?>
<?php if($pagination->hasPreviousHidden()): ?>
		<li class="disabled">
			<a href="#">...</a>
		</li>
<?php endif; ?>
<?php foreach($pagination->getPages() as $page): ?>
		<li<?= $pagination->isActive($page) ? ' class="active"' : '' ?>>
			<a href="<?= $pagination->getPagePath($page) ?>"><?= $page ?></a>
		</li>
<?php endforeach; ?>
<?php if($pagination->hasNextHidden()): ?>
		<li class="disabled">
			<a href="#">...</a>
		</li>
<?php endif; ?>
<?php if($pagination->hasNext()): ?>
		<li>
			<a href="<?= $pagination->getNextPath() ?>">Siguiente &rarr;</a>
		</li>
<?php endif; ?>		
	</ul>
</div>
