<?php

class Cattegory extends Sea\Model
{
	static $has_many = array(
		array('postcattegories'),
		array('posts', 'through' => 'postcattegories', 'select' => 'posts.id')
	);
	
	public function get_posts_in() {
		return count($this->posts);
	}
}

?>
