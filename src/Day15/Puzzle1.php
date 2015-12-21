<?php

namespace Day15;


class Puzzle1
{
	use \InputLoaderTrait, \ConsoleTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day15/Puzzle1");

		$parser = new InstructionsParser();
		$larder = $parser->parse($input);

		$combinations = new Combinations();
		$planner = new RecipePlanner($larder, $combinations);

		$megaCookie = $planner->megaCookie(100);

		$this->write("Mega cookie value: " . $megaCookie->totalScoreForRecipe());
	}

}