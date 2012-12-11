<?php

namespace App\Helpers;

class Table {
	private $columns;
	private $links;
	private $rows;
	
	public function __construct() {
		
	}
	
	public function column($name, $attribute) {
		$this->columns[$attribute] = $name;
		
		return $this;
	}
	
	public function getColumns() {
		return $this->columns;
	}
	
	public function link($attribute, $format) {
		$this->links[$attribute] = $format;
		
		return $this;
	}
	
	public function isLink($attribute) {
		return array_key_exists($attribute, $this->links);
	}
	
	public function getLinkHref($attribute, $element) {
		$format = $this->links[$attribute];
		
		$href = '';
		$parts = explode('/', $format);
		
		foreach($parts as $key => $part)
		{
			if($part[0] == ':')
			{
				$part = substr($part, 1);
				$part = $element->$part;
			}
			
			$href .= '/'. $part;
		}
		
		return $href;
	}
	
	public function fillWith(Array $elements) {
		$this->rows = $elements;
		
		return $this;
	}
	
	public function getRows() {
		return $this->rows;
	}
}
