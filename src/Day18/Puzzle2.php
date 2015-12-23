<?php

namespace Day18;


class Puzzle2
{
	use \ConsoleTrait,
		\InputLoaderTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day18/Puzzle1");

		$controller = new GridController();

		$grid = $controller->startGrid($input, 100, 100, true);
		for ($i = 1; $i <= 100; $i++) {
			$grid = $controller->nextGrid($grid);
		}

		$this->write("Number of lights after 100 steps: " . $grid->numberTurnedOn());
	}

}