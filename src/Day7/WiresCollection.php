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
		if (isset($this->wires[$offset])) {
			return $this->wires[$offset];
		}
		return 0;
	}

	public function offsetSet($offset, $value)
	{
		$this->wires[$offset] = (int)$value;
	}

	public function offsetUnset($offset)
	{
		$this->wires[$offset] = 0;
	}
}