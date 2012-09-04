<?php

namespace App\Controllers\Admin;
use Sea\Controller;
use Post;

class ArticulosController extends Controller
{
	protected $access_filter = array(
		'*' => 'staff'
	);
	
	public function index($page)
	{
		$pagination = $this->get('pagination')
						->page($page)
						->model('Post')
						->includes(array('author'))
						->order('published_at DESC')
						->init();
		
		return array('pagination' => $pagination);
	}
	
	public function redactar() {
		$post = new Post();
		$post->user_id = $this->user->id;
		
		$request = $this->get('request');
		
		if($post->updateFrom($request))
			$request->redirectTo('/articulos');
		
		return array('post' => $post);
	}
	
	public function editar($permalink) {
		$post = Post::find_by('permalink', $permalink);
		
		if($post->updateFrom($this->get('request')))
			if($post->apply)
				$this->get('cache')->to($post)->clean();
		
		return array('post' => $post);
	}
	
	public function eliminar($permalink) {
		$confirmed = $this->get('request')->getMethod() == 'POST';
		$post = Post::find_by('permalink', $permalink);
		
		if(!$this->user->isRole('webmaster') and $post->author_name != $this->user->name)
			throw new \RuntimeException('No tienes permisos para eliminar este artículo.', 403);
		
		if($confirmed)
			$post->delete();
		
		return array('post' => $post, 'confirmed' => $confirmed);
	}
}
