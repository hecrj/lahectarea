<?php

namespace App\Controllers\Blog;
use Sea\Core\Controller;
use Post;

class RssController extends Controller
{

	public function index()
	{
		$posts = Post::all(array(
			'conditions'	=> array('status = 1'),
			'limit'			=> 25,
			'order'			=> 'published_at DESC'
		));
		
		return array('posts' => $posts);
	}

}
