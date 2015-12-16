<?php

namespace Day7;

class WiresCollection implements \ArrayAccess
{
	private $wires;

	public function offsetExists($offset)
	{
		return isset($this->wires[$offset]);
	}

	public function offsetGet($offset)
	{
		return isset($this->wires[$offset]) ? $this->wires[$offset] : null;
	}

	public function offsetSet($offset, $value)
	{
		$this->wires[$offset] = (int)$value;
	}

	public function offsetUnset($offset)
	{
		if (isset($this->wires[$offset])) {
			unset($this->wires[$offset]);
		}
	}
}
