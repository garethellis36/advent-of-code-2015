<?php

namespace Day1;


class Puzzle1
{
	public function __invoke()
	{
		$elevator = new Elevator();
		$parser = new InstructionsParser($elevator);

		$input = file_get_contents(__DIR__ . "/../../input/Day1/Puzzle1");

		$parser->parseInstructions($input);

		echo "Final floor: " . $elevator->getFloor();
	}
}