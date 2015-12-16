<?php

namespace Day7;

class Circuit implements \ArrayAccess
{
	private $wires;

	public function sendSignal($int, $target)
	{
		$this->wires[$target] = $int;
	}

	public function sendSignalOr($first, $second, $target)
	{
		$this->wires[$target] = $this->wires[$first] | $this->wires[$second];
	}

	public function sendSignalAnd($first, $second, $target)
	{
		$this->wires[$target] = $this->wires[$first] & $this->wires[$second];
	}

	public function sendSignalNot($source, $target)
	{
		$this->wires[$target] = ~ $source;
	}

	public function sendSignalLShift($source, $int, $target)
	{
		$this->wires[$target] = $source << $int;
	}

	public function sendSignalRShift($source, $int, $target)
	{
		$this->wires[$target] = $source >> $int;
	}

	public function getWireStatus($wireIdentifier)
	{
		return $this->wires[$wireIdentifier];
	}


	/**
	 * ArrayAccess implementation below
	 */

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
		$this->wires[$offset] = $value;
	}

	public function offsetUnset($offset)
	{
		$this->wires[$offset] = 0;
	}
}

