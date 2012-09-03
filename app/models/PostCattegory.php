<?php

class PostCattegory extends Sea\Core\Model
{
	static $belongs_to = array(
		array('post'),
		array('cattegory')
	);
}

?>
