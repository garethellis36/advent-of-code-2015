<?php

namespace Day9;

class CitiesCollection implements \ArrayAccess
{
	private $cities = [];

	public function offsetExists($offset)
	{
		return isset($this->cities[$offset]);
	}

	public function offsetGet($offset)
	{
		if (isset($this->cities[$offset])) {
			return $this->cities[$offset];
		}
		throw new UnknownCityException("Unknown city");
	}

	public function offsetSet($offset, $value)
	{
		if ($offset == "") {
			if (empty($this->cities)) {
				$offset = 0;
			} else {
				end($this->cities);
				$offset = key($this->cities) + 1;
				reset($this->cities);
			}
		}
		$this->cities[$offset] = $value;
	}

	public function offsetUnset($offset)
	{
		if (isset($this->cities[$offset])) {
			unset($this->cities[$offset]);
		}
	}

    public function addCity($name, array $distances)
    {
        $this[] = new City($name, $distances);
    }

    public function keys()
    {
        return array_keys($this->cities);
    }
}
