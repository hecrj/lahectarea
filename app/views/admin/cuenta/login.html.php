<?php $this->extend('admin/layouts/login') ?>
<h1 id="brand">la hectárea</h1>
<div class="row">
	<div class="span4 offset3">
		<h2>Iniciar sesión</h2>
		<form method="post" action="">
			<?php if($error): ?>
				<div class="alert alert-error">
					¡El nombre de usuario y/o contraseña no son correctos!
				</div>
			<?php endif; ?>
			<fieldset>
				<div class="control-group">
					<input name="login[username]" id="username" type="text" class="span4" placeholder="Nombre de usuario" />
				</div>
				
				<div class="control-group">
					<input name="login[password]" id="password" type="password" class="span4" placeholder="Contraseña" />
				</div>
			</fieldset>
			<label for="remember" class="checkbox pull-left">
				<input type="checkbox" name="login[remember]" id="remember" value="remember" />
				No cerrar sesión
			</label>
			<button class="pull-right btn btn-large btn-primary" type="submit">Iniciar sesión</button>
		</form>
	</div>
</div>