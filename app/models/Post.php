<?php

use ActiveRecord\Utils;

class Post extends ManyToMany
{
	static $belongs_to = array(
		array('author', 'class_name' => 'User', 'select' => 'id, username, name')
	);
	static $has_many = array(
		array('postcattegories'),
		array('posttags'),
		array('cattegories', 'through' => 'postcattegories'),
		array('tags', 'through' => 'posttags')
	);
	static $delegate = array(
		array('name', 'to' => 'author', 'prefix' => 'author')
	);
	static $attr_names = array(
		'title'			=>	'El título',
		'image'			=>	'La imagen',
		'content'		=>	'El contenido',
		'description'	=>	'La descripción'
	);
	static $attr_protected = array('user_id');
	static $after_save = array('applyChanges');
	
	static $validates_presence_of = array(
		array('title'),
		array('image'),
		array('content')
	);
	
	public $apply = true;
	private $broken = false;
	private $commentsNum;
	private $nestedComments = array();
	
	public function get_created()
	{
		return $this->created_at->format('d/m/y');
	}
	
	public function get_updated()
	{
		return $this->updated_at->format('d/m/y');
	}
	
	public function get_published() {
		if($this->status == 1)
			return $this->published_at->format('d/m/y');
		else
			return 'No';
	}
	
	public function get_description() {
		if($this->is_new_record())
			return null;
		
		$description = $this->read_attribute('description');
		
		if(! empty($description))
			return $description;
		
		$description = preg_replace('/\s+?(\S+)?$/', '', mb_substr($this->content, 0, 200)).'...';
		
		if(empty($description))
			return null;
		else
			return $description;
	}
	
	public function set_status($status) {
		if($this->status != 1 and $status == 1)
			$this->published_at = new \DateTime;
		
		$this->assign_attribute('status', $status);
	}
	
	public function applyChanges()
	{
		$this->applyChangesTo('cattegories');
		$this->applyChangesTo('tags');
	}
	
	protected function getCattegoryValues($name)
	{
		return $this->getManyValues($name);
	}
	
	protected function getTagValues($name)
	{
		return $this->getManyValues($name);
	}
	
	private function getManyValues($name)
	{
		$permalink = Utils::toAscii($name);
		
		return array(
			'permalink' => $permalink,
			'name' => $name
		);
	}
}
