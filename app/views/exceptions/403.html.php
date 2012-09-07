<?php header('HTTP/1.1 403 Forbidden'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ERROR 403 - Forbidden</title>
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
	<h1>Oops! The requested page is forbidden!</h1>
	<p>The page you are trying to access seems to be restricted to authorized users...</p>
	<p>You have requested the following page:</p>
	<p><strong>http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?></strong></p>
</section>
<?php if(App\ENV == 'development' and isset($e)): ?>
<section class="error">
		<h3>Some errors have ocurred during your request:</h3>
		<p><?= $e->getMessage(); ?></p>
</section>
<footer>Edit this page at your will in: <strong><?= __FILE__ ?></strong></footer>
<?php endif; ?>
</body>
</html>