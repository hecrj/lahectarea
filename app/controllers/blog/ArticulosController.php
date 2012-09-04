<?php

namespace App\Controllers\Blog;
use Sea\Controller;
use Post, Cattegory, Tag;

class ArticulosController extends Controller
{

	public function index($page)
	{
		$pagination = $this->getPagination($page)->init();
		
		return array('pagination' => $pagination);
	}
	
	public function leidos()
	{
		$posts = Post::find_by_sql('SELECT * FROM ('.
			'SELECT posts.id, posts.title, posts.permalink, posts.description, posts.content, posts.reads, posts.status, posts.published_at '.
			'FROM posts WHERE posts.status = 1 ORDER BY posts.published_at DESC LIMIT 0, 10'.
			') as posts ORDER BY posts.reads DESC');
		
		return array('posts' => $posts);
	}
	
	public function categoria($permalink, $page)
	{
		$cattegory = Cattegory::find_by('permalink', $permalink);
		
		$pagination = $this->getPagination($page)
				->through($cattegory)
				->init();
		
		return array('cattegory' => $cattegory, 'pagination' => $pagination);
	}
	
	public function tag($permalink, $page)
	{
		$tag = Tag::find_by('permalink', $permalink);
		
		$pagination = $this->getPagination($page)
				->through($tag)
				->init();
		
		return array('tag' => $tag, 'pagination' => $pagination);
	}
	
	public function leer($permalink)
	{
		$post = Post::find_by('permalink', $permalink);
		
		$post->reads = $post->reads + 1;
		$post->save(false);
		
		return array('post' => $post);
	}
	
	private function getPagination($page)
	{
		return $this->get('pagination')
				->page($page)
				->model('Post')
				->conditions(array('posts.status = 1'))
				->limit(15)
				->order('published_at DESC');
	}
}
