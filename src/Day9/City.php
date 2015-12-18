<?php

namespace Day9;

class City
{
	private $name;

	private $distances;

	public function __construct($name, array $distances)
	{
		$this->name = $name;
		$this->distances = $distances;
	}

	public function getName()
    {
        return trim($this->name);
    }

    public function distanceTo($city)
    {
        if (!isset($this->distances[$city])) {
			throw new UnknownCityException("{$city} is not known to {$this->name}");
		}
		return (int)$this->distances[$city];
    }
}

