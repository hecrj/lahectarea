<div class="subnav">
	<div class="container">
		<a href="<?= $path ?>" class="brand"><?= $title ?></a>
		<ul class="nav nav-pills">
<?php foreach($subnav->getItems() as $key => $item): ?>
<?php if($item->isVisible()): ?>
			<li<?= $item->isActive() ? ' class="active"' : '' ?>>
				<a href="<?= $item->getPath() ?>">
					<i class="icon-<?= $icons[$key] ?>"></i>
					<?= $item->getName() ?>
				</a>
			</li>
<?php endif ?>
<?php endforeach ?>
		<ul>
	</div>
</div>
<?php $this->helper('includes')->local('js', 'subnav') ?>
