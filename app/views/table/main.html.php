<?php $columns = $table->getColumns() ?>
<table class="table table-striped">
	<thead>
<?php foreach($columns as $column): ?>
		<th><?= $column ?></th>
<?php endforeach; ?>
<?php if($table->isLink('remove')): ?>
		<th></th>
<?php endif; ?>
	</thead>
	<tbody>
<?php foreach($table->getRows() as $row): ?>
		<tr>
<?php foreach($columns as $attribute => $column): ?>
			<td>
<?php if($table->isLink($attribute)): ?>
				<a href="<?= $table->getLinkHref($attribute, $row) ?>"><?= $row->$attribute ?></a>
<?php else: ?>
				<?= $row->$attribute ?>
<?php endif; ?>
			</td>
<?php endforeach; ?>
<?php if($table->isLink('remove')): ?>
			<td>
				<a href="<?= $table->getLinkHref('remove', $row) ?>"><i class="icon-trash"></i></a>
			</td>
<?php endif; ?>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>