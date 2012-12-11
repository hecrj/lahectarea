<ul class="nav">
<?php foreach($nav->getItems() as $key => $item): ?>
	<li<?= $item->isActive() ? ' class="active"' : '' ?>>
		<a href="<?= $item->getPath() ?>">
			<i class="icon-<?= $icons[$key] ?>"></i>
			<?= $item->getName() ?>
		</a>
	</li>
<?php endforeach ?>
</ul>