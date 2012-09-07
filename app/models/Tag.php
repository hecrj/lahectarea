<?php

class Tag extends Sea\Model
{
	static $has_many = array(
		array('posttags'),
		array('posts', 'through' => 'posttags')
	);
}
