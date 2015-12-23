<?php

namespace Day23;

class Register
{
	private $value = 0;

    public function __construct($value = 0)
    {
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}

    public function setValue($value)
    {
        $this->value = (int)$value;
    }
}

