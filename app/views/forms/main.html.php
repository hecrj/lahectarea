<form<?= $form->getAttributes() ?>>
	<input name="csrf_token" type="hidden" value="<?= $form->getToken() ?>" />
	
<?php foreach($form->getFieldsets() as $fieldset)
		$this->render('forms/fieldset', array('fieldset' => $fieldset)) ?>

<?php if($form->hasButtons()): ?>
	<div class="form-actions">
<?php foreach($form->getButtons() as $button)
		$this->render('forms/buttons/'. $button->getTagName(), array('button' => $button)) ?>
	</div>
<?php endif; ?>
</form>
