<?php

class PostTag extends Sea\Model
{
	static $belongs_to = array(
		array('post'),
		array('tag')
	);
}
