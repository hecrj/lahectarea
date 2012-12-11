<item>
    <title><![CDATA[<?=htmlspecialchars_decode($post->title)?>]]></title>
    <link>http://www.<?= WEB_DOMAIN ?>/articulo/<?=$post->permalink?></link>
    <guid>http://www.<?= WEB_DOMAIN ?>/articulo/<?=$post->permalink?></guid>
    <comments>http://www.<?= WEB_DOMAIN ?>/articulo/<?=$post->permalink?>#comentarios</comments>
    <description><![CDATA[<?= $this->helper('markdown')->translateSimple($post->description) ?>]]></description>
    <pubDate><?= date('r', $post->published_at->getTimestamp()) ?></pubDate>
</item>
