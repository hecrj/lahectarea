<?php header("Content-Type: text/xml"); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
    <title>la hectárea</title>
    <link>http://www.lahectarea.es/</link>
    <language>es-ES</language>
    <description>Blog de temática diversa (programación, videojuegos, tecnología, software, hardware, etc.)</description>
    <generator>Héctor Ramón Jiménez</generator>
    <copyright>lahectarea.es</copyright>
    <atom:link href="http://www.lahectarea.es/rss/" rel="self" type="application/rss+xml" />

<?php $this->output('content') ?>

</channel>
</rss>
