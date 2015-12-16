<?php

namespace Day6;


class Puzzle2
{
	public function __invoke()
	{
		$grid = new LightingGridWithAdjustableBrightness();
		$parser = new InstructionsParser($grid);

		$input = file_get_contents(__DIR__ . "/../../input/Day6/Puzzle1");
		$parser->parse($input);

		echo "Cumulative brightness of lights: " . $grid->getCumulativeBrightness();
	}
}