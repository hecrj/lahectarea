<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title><?= $this->get('title') ? : 'Página sin título' ?> - la hectárea</title>
		<link type="image/x-icon" rel="shortcut icon" href="http://static.<?= App\DOMAIN ?>/favicon.ico" />
		<link href="http://static.<?= App\DOMAIN ?>/css/main.css" rel="stylesheet" />
<?php foreach($this->helper('includes')->get('css') as $css): ?>
			<link href="<?= $css ?>" rel="stylesheet" />
<?php endforeach; ?>
		<script src="http://static.<?= App\DOMAIN ?>/js/jquery.min.js"></script>
<?php if(App\ENV == 'production'): ?>
		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-20402927-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
<?php endif; ?>
	</head>
	<body>
		<div id="main">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="brand" href="/">la hectárea</a>

<?php $this->render('blog/layouts/_nav') ?>

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
						Powered by <a href="https://github.com/hecrj/sea_project" target="_new">Sea framework</a> and
						<a href="http://twitter.github.com/bootstrap/" target="_new">Bootstrap, from Twitter</a>.</p>
				</div>
			</footer>
		</div>
<?php foreach($this->helper('includes')->get('js') as $js): ?>
			<script src="<?= $js ?>"></script>
<?php endforeach; ?>
	</body>
</html>
