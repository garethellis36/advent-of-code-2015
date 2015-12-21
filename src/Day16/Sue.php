<?php

namespace Day16;

class Sue
{
	private $number;
	private $properties;

	public function __construct($number, array $properties)
	{
		$this->number = $number;
		$this->properties = $properties;
	}

	public function number()
	{
		return $this->number;
	}

	public function is($property)
	{
		return isset($this->properties[$property]) ? $this->properties[$property] : null;
	}

    public function couldBe($property, $value, $equalsOnly = true)
    {
        if (!isset($this->properties[$property])) {
			return true;
		}

		if (!$equalsOnly) {
			if (in_array($property, ["trees", "cats"])) {
				return $this->properties[$property] > $value;
			}

			if (in_array($property, ["pomeranians", "goldfish"])) {
				return $this->properties[$property] < $value;
			}
		}

		return $this->properties[$property] === $value;
    }
}

