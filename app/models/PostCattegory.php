<?php

class PostCattegory extends Sea\Model
{
	static $belongs_to = array(
		array('post'),
		array('cattegory')
	);
}

?>
