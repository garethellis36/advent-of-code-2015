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
		$this->capacity = $capacity;
		$this->durability = $durability;
		$this->flavour = $flavour;
		$this->texture = $texture;
		$this->calories = $calories;
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

