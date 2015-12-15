<?php

namespace Day6;


class Puzzle1
{
	public function __invoke()
	{
		$grid = new LightingGrid();
		$parser = new InstructionsParser($grid);

		$input = file_get_contents(__DIR__ . "/../../input/Day6/Puzzle1");
		$parser->parse($input);

		echo "Number of turned on lights: " . $grid->getNumberOfTurnOnLights();
	}
}