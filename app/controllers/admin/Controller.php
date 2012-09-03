<?php

namespace App\Controllers\Admin;

abstract class Controller extends \Core\Controller {
	protected $model;
	protected $access_filter = array(
		'*' => 'staff'
	);
	protected $before = array();
	
	protected function edit($attribute, $value) {
		$model = $this->model;
		
		$item = $model::find_by($attribute, $value);
		
		$this->callbacks('before', 'edit', $item);
		
		$item->updateFrom($this->get('request'));
		
		return array(lcfirst($model) => $item);
	}
	
	protected function delete($attribute, $value) {
		$model = $this->model;
		
		$item = $model::find_by($attribute, $value);
		
		$this->callbacks('before', 'delete', $item);
		
		$confirmed = $this->get('request')->getMethod() == 'POST';
		
		
	}
	
	private function callbacks($when, $event, $argument) {
		if(! isset($this->$when[$event]))
			return false;
		
		foreach($this->$when[$event] as $callback)
			$this->$callback($argument);
		
		return true;
	}
}