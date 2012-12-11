<?php

namespace App\Helpers;

class Includes {
	private $includes;
	
	public function __construct() {
		$this->includes = array();
	}
	
	public function local($type, $path) {
		$this->includes[$type][] = 'http://static.' . \App\DOMAIN . "/{$type}/{$path}.{$type}";
		
		return $this;
	}
	
	public function external($type, $path) {
		$this->includes[$type][] = $path;
		
		return $this;
	}
	
	public function get($key) {
		if(array_key_exists($key, $this->includes))
			return $this->includes[$key];
		else
			return array();
	}
}
