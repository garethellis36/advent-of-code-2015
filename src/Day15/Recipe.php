<?php

namespace Day15;

class Recipe
{
	/**
	 * @var Larder
	 */
	private $larder;

	/**
	 * @var int
	 */
	private $requiredTeaspoons;

	/**
	 * @var array
	 */
	private $quantities;

	public function __construct(Larder $larder, $requiredTeaspoons, array $quantities)
	{
		if ((int)array_sum($quantities) != $requiredTeaspoons) {
			throw new InvalidNumberOfTeaspoonsProvidedException(array_sum($quantities) . " teaspoons provided, but {$requiredTeaspoons} required");
		}
		$this->larder = $larder;
		$this->requiredTeaspoons = $requiredTeaspoons;
		$this->quantities = $quantities;
	}

	public function totalScoreForProperty($property)
    {
		$score = 0;
		foreach ($this->quantities as $ingredientName => $teaspoons) {
			$score += $teaspoons * $this->larder[$ingredientName]->{$property}();
		}
		return $score < 0 ? 0 : $score;
	}

    public function totalScoreForRecipe(array $properties = ["capacity", "durability", "flavour", "texture"])
    {
        $scores = [];
		foreach ($properties as $property) {
			$scores[] = $this->totalScoreForProperty($property);
		}
		return array_product($scores);
    }
}

