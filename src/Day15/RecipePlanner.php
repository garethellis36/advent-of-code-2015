<?php

namespace Day15;

class RecipePlanner
{
	/**
	 * @var Combinations
	 */
	private $combinations;
	/**
	 * @var Larder
	 */
	private $larder;

	public function __construct(Larder $larder, Combinations $combinations)
	{
		$this->larder = $larder;
		$this->combinations = $combinations;
	}

    public function megaCookie($teaspoons)
    {
		$megaCookie = null;
		$ingredientNames = $this->larder->ingredients();
        foreach ($this->combinations->generate(count($this->larder), $teaspoons) as $combination) {

			$quantities = [];
			foreach ($combination as $k => $amount) {
				$ingredient = $ingredientNames[$k];
				$quantities[$ingredient] = $amount;
			}

			$recipe = new Recipe($this->larder, $teaspoons, $quantities);

			if (!$megaCookie || $recipe->totalScoreForRecipe() > $megaCookie->totalScoreForRecipe()) {
				$megaCookie = $recipe;
			}
		}
		return $megaCookie;
    }
}

