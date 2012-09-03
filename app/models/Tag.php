<?php

class Tag extends Sea\Core\Model
{
	static $has_many = array(
		array('posttags'),
		array('posts', 'through' => 'posttags')
	);
}

?>
