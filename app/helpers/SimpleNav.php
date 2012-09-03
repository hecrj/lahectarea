<?php

namespace Sea\App\Helpers;
use Sea\Core\Components\Routing\RequestInterface;

class SimpleNav
{
	private $request;
	private $name;
	private $path;
	private $defaults;
	private $items;
	private $active;
	private $visible;

	public function __construct(RequestInterface $request, $name = null, $path = null, Array $options = null)
	{
		$this->request = $request;
		$this->name = $name;
		$this->path = $path;
		$this->defaults = array();
		$this->items = array();
		$this->visible = empty($options['if']) ? true : $options['if'];
		$this->active = self::shouldBeActive($path, $request->getPath(), $options);
	}

	public static function shouldBeActive($path, $req_path, Array $options = null)
	{
		if($path == null)
			return false;

		if(!empty($options['highlights_on']))
			return (preg_match($options['highlights_on'], $req_path) === 1);

		if(!empty($options['subpath']))
			return (strpos($req_path, $path) === 0);
		
		return ($path == $req_path);
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function getItems()
	{
		return $this->items;
	}

	public function isActive()
	{
		return $this->active;
	}

	public function visibleIf($visible)
	{
		$this->visible = (bool)$visible;
	}

	public function isVisible()
	{
		return $this->visible;
	}

	public function defaults(Array $defaults)
	{
		$this->defaults = $defaults;

		return $this;
	}

	public function item($name, $path, Array $options = null)
	{
		$options = array_merge($this->defaults, (array)$options);

		$item = new SimpleNav($this->request, $name, $path, $options);
		$this->items[] = $item;

		return $item;
	}
}