<?php

namespace Day23;

class InstructionsList implements \ArrayAccess, \Countable
{
	/**
	 * @var array
	 */
	private $contents;

    public function __construct($contents)
    {
		$this->contents = explode(PHP_EOL, $contents);
	}

	public function offsetExists($offset)
	{
		return isset($this->contents[$offset]);
	}

	public function offsetGet($offset)
	{
		return isset($this->contents[$offset]) ? $this->contents[$offset] : null;
	}

	public function offsetSet($offset, $value)
	{
		$this->contents[$offset] = $value;
	}

	public function offsetUnset($offset)
	{
		if (isset($this->contents[$offset])) {
			unset($this->contents[$offset]);
		}
	}

	public function count()
	{
		return count($this->contents);
	}
}
