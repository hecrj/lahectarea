<?php

use ActiveRecord\Utils;

class ManyToMany extends Sea\Model
{
	private $newValues = array();
	private $classField;
	private $relationshipClassName;
	private $relationshipField;
	private $throughClassName;
	
	public function &__get($name)
	{
		try
		{
			return parent::__get($name);
		}
		
		catch(Exception $e)
		{
			if(substr($name, 0, 4) != 'new_')
				throw $e;
			
			$relationship = substr($name, 4);
			$names = $this->implodeNamesOf($relationship);

			return $names;
		}
	}
	
	public function __set($name, $value)
	{
		try
		{
			parent::__set($name, $value);
		}
		
		catch(Exception $e)
		{
			if(substr($name, 0, 4) != 'new_')
					throw $e;
			
			$relationship = substr($name, 4);
			$this->newValues[$relationship] = $value;
		}
	}
	
	protected function getNamesOf($relationship)
	{
		$names = array();
		$relations = static::table()->get_relationship($relationship)->load($this);
		
		foreach((array)$relations as $relation)
			$names[$relation->id] = $relation->name;
		
		return $names;
	}
	
	protected function implodeNamesOf($relationship)
	{
		return implode(', ', $this->getNamesOf($relationship));
	}
	
	protected function applyChangesTo($relationship)
	{
		if(! isset($this->newValues[$relationship]))
			return;
		
		$this->classField = strtolower(get_class($this)).'_id';
		
		$currentValues = $this->getNamesOf($relationship);
		
		if(empty($this->newValues[$relationship]))
			$newValues = array();
		else
			$newValues = $this->getNewNamesOf($relationship);
		
		$delValues = array_diff($currentValues, $newValues);
		$addValues = array_diff($newValues, $currentValues);
		
		$this->updateValues($relationship, $delValues, $addValues);
	}
	
	private function getNewNamesOf($relationship)
	{
		$newNames = explode(',', $this->newValues[$relationship]);
		
		return array_map('trim', $newNames);
	}
	
	private function updateValues($relationship, Array $delValues, Array $addValues)
	{
		$singularizedRelationship = Utils::singularize($relationship);
		
		$this->relationshipClassName = ucfirst($singularizedRelationship);
		$this->relationshipField = $singularizedRelationship . '_id';
		$this->throughClassName = get_class($this).ucfirst($singularizedRelationship);
				
		if(! empty($delValues))
			$this->deleteValues($delValues);
		
		if(! empty($addValues))
			$this->addValues($addValues);
	}
	
	private function deleteValues(Array $values)
	{
		$IdValues = array_keys($values);
		
		$throughClassName = $this->throughClassName;
		
		$throughClassName::delete_all(array(
			'conditions' => array($this->classField . ' = ? AND '. $this->relationshipField .' IN (?)', $this->id, $IdValues)
		));
	}
	
	private function addValues(Array $names)
	{
		$relationshipClassName = $this->relationshipClassName;
		$throughClassName = $this->throughClassName;
		
		foreach($names as $name)
		{
			if(! $relation = $relationshipClassName::find(array('name' => $name)))
			{
				$callbackName = 'get'.$relationshipClassName.'Values';
				$values = $this->$callbackName($name);
				$relation = $relationshipClassName::create((array)$values);
			}
			
			$throughClassName::create(array($this->classField => $this->id, $this->relationshipField => $relation->id));
		}
	}
}
