<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title><?= $this->get('title') ? : 'Página sin título' ?> - la hectárea</title>
		<link type="image/x-icon" rel="shortcut icon" href="http://static.<?= App\DOMAIN ?>/favicon.ico" />
		<link href="http://static.<?= App\DOMAIN ?>/css/main.css" rel="stylesheet" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="http://static.<?= App\DOMAIN ?>/css/responsive.css" rel="stylesheet" />
<?php foreach($this->helper('includes')->get('css') as $css): ?>
		<link href="<?= $css ?>" rel="stylesheet" />
<?php endforeach; ?>
		<script src="http://static.<?= App\DOMAIN ?>/js/jquery.min.js"></script>
	</head>
	<body>
		<div id="main">
			<div class="navbar navbar-fixed-top navbar-inverse">
				<div class="navbar-inner">
					<div class="container">
						<a class="brand" href="/">admin</a>

<?php $this->render('admin/layouts/_nav') ?>

						<ul class="nav pull-right">
							<li>
								<a href="/cuenta/logout">
									<i class="icon-exit"></i>
									Cerrar sesión
								</a>
							</li>
							<li>
								<a href="http://www.<?= App\DOMAIN ?>/">
									<i class="icon-home"></i>
									Volver a la hectárea
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="container">
					<?php $this->output('content') ?>
				</div>
			</div>
			<footer>
				<div class="container">
					<p class="pull-right">
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_new">
							<img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" />
						</a>
					</p>
					<p>Sitio web diseñado y programado por <strong>Héctor Ramón Jiménez</strong>.<br />
						Powered by <a href="https://github.com/hector0193/sea_project" target="_new">Sea framework</a> and
						<a href="http://twitter.github.com/bootstrap/" target="_new">Bootstrap, from Twitter</a>.</p>
				</div>
			</footer>
		</div>
<?php foreach($this->helper('includes')->get('js') as $js): ?>
		<script src="<?= $js ?>"></script>
<?php endforeach; ?>
	</body>
</html>