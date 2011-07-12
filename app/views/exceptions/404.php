<?php header('HTTP/1.1 404 Not Found'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ERROR 404 - Page not found</title>
<style type="text/css">
body {
	padding: 0 25px;
	color: #333;
	font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
	font-size: 1em;
	width: 1000px;
	margin: 0 auto;
	background: #FFF;
}
h1, h3 {
	color: #000;
	border-bottom: 1px solid #333;
	margin-bottom: 0.5em;
}
h1 { line-height: 36px; }
section, footer { margin: 50px 0; }
	.error, .error h3 { color: #900; }
		.error h3 { border-bottom: 1px solid #900; }
p {
	margin-top: 0;
	line-height: 1.5em;
}

footer { font-size: 0.8em; text-align: center; }
</style>
</head>
<body>
<section class="info">
	<h1>Oops! The requested page has not been found!</h1>
	<p>The page you are trying to access seems to be unavailable...</p>
	<p>You have requested the following page:</p>
	<p><strong>http://<?= $_SERVER['HTTP_HOST'] . ($_SERVER['PATH_INFO'] ? : '/') ?></strong></p>
	<p>It's possible that the website is having some technical problems or it's under manteinance.</p>
	<p>Please, try again later and if the problem persists, contact the webmaster: <strong><?= WEB_EMAIL ?></strong></p>
</section>
<?php if(isset($e)): ?>
<section class="error">
		<h3>Some errors have ocurred during your request:</h3>
		<p><?= $e->getMessage(); ?></p>
</section>
<footer>Edit this page at your will in: <strong><?= __FILE__ ?></strong></footer>
<?php endif; ?>
</body>
</html>