<?php

namespace App\Controllers\Blog;
use Sea\Controller;
use Post;

class IndexController extends Controller
{

	public function index($page)
	{
		$pagination = $this->get('pagination')
				->model('Post')
				->conditions(array('status' => 1))
				->order('published_at DESC')
				->page($page)
				->init();
		
		return array('pagination' => $pagination);
	}

	public function acerca() {
		
	}

	public function contacto() {
		
	}

}
