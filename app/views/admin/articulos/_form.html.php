<?php

$form = $this->helper('form')->set('class', 'full');
$fieldset = $form->fieldset($post);

$fieldset->input('Título', 'title');

$fieldset->input('Imagen del artículo', 'image');

$fieldset->textarea('Contenido', 'content')
		->set('rows', 25)
		->set('placeholder','Escribe el artículo aquí... ¡Puedes utilizar Markdown para dar formato!');

$fieldset->textarea('Descripción', 'description')
		->set('rows', 5)
		->set('placeholder', 'Escribe una descripción aquí... ¡También puedes usar Markdown!')
		->help('La descripción es el texto que aparecerá antes de acceder al artículo.');

$fieldset->input('Enlace permanente', 'permalink')
		->help('A través del enlace permanente se accederá al artículo. Déjalo en blanco para autogenerarlo.');

$fieldset->input('Categorías', 'new_cattegories')
		->help('Las categorías facilitan el encontrar un artículo. Ejemplos: Informática, Videojuegos, Programación, etc.');

$fieldset->input('Etiquetas', 'new_tags')
		->help('Las etiquetas son categorías más específicas. Ejemplos: Intel i5 2500k, Mass Effect 3, Ruby, etc.');

$fieldset->select('Colorear código', 'highlight')
		->option('No')
		->option('Twilight', 'twilight')
		->option('Dawn', 'dawn')
		->option('Mac classic', 'mac-classic')
		->option('Vibrant Ink', 'vibrant-ink');

$fieldset->select('Estado', 'status')
		->option('Borrador')
		->option('Publicado')
		->option('Rechazado')
		->help('Si todavía no has terminado el artículo puedes guardarlo como borrador y terminarlo más tarde.');

if($form->isEditing())
	$fieldset->select('Aplicar cambios', 'apply')
		->option('Sólo guardar los cambios')
		->option('Aplicar y guardar los cambios')
		->help('Puedes guardar los cambios sin que se apliquen en el artículo publicado.');

$form->submit('Publicar artículo', 'Guardar cambios');
$form->button('Cancelar')->set('type', 'reset');

$this->render('forms/main', array('form' => $form));
