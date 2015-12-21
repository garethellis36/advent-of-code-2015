<?php

namespace Day15;

class Ingredient
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int
	 */
	private $capacity,
		$durability,
		$flavour,
		$texture,
		$calories;

	public function __construct($name, $capacity, $durability, $flavour, $texture, $calories)
	{
		$this->name = $name;
		$this->capacity = (int)$capacity;
		$this->durability = (int)$durability;
		$this->flavour = (int)$flavour;
		$this->texture = (int)$texture;
		$this->calories = (int)$calories;
	}

	public function name()
	{
		return $this->name;
	}

    public function capacity()
    {
        return $this->capacity;
    }

    public function durability()
    {
        return $this->durability;
    }

    public function flavour()
    {
        return $this->flavour;
    }

    public function flavor()
    {
        throw new AmericanSpellingException("Flavour is spelt '-our'!");
    }

    public function texture()
    {
        return $this->texture;
    }

    public function calories()
    {
        return $this->calories;
    }
}

