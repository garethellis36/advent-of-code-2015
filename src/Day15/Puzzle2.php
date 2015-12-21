<?php

namespace Day15;

class Puzzle2
{
	use \InputLoaderTrait, \ConsoleTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day15/Puzzle1");

		$parser = new InstructionsParser();
		$larder = $parser->parse($input);

		$combinations = new Combinations();
		$planner = new RecipePlanner($larder, $combinations);

		$megaCookie = $planner->megaCookieWithCalories(100, 500);

		$this->write("500cal mega cookie value: " . $megaCookie->totalScoreForRecipe());
	}

}