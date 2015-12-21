<?php

namespace Day15;

class Larder implements \ArrayAccess, \Countable
{
	private $ingredients;
	
	public function offsetExists($name)
	{
		return isset($this->ingredients[$name]);
	}

	public function offsetGet($name)
	{
		return isset($this->ingredients[$name]) ? $this->ingredients[$name] : null;
	}

	public function offsetSet($name, $instance)
	{
		if (!$instance instanceof Ingredient) {
			throw new \InvalidArgumentException("You can only add instances of Day15\\Ingredient to a Larder!");
		}
		if ($name == "") {
			$name = $instance->name();
		}
		$this->ingredients[$name] = $instance;
	}

	public function offsetUnset($name)
	{
		if (isset($this->ingredients[$name])) {
			unset($this->ingredients[$name]);
		}
	}

	public function count()
	{
		return count($this->ingredients);
	}
}
