<?php

class PostTag extends Sea\Core\Model
{
	static $belongs_to = array(
		array('post'),
		array('tag')
	);
}

?>
