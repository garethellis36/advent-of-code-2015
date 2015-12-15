<?php

namespace Day3;


class Puzzle1
{
	public function __invoke()
	{
		$santa = new Santa();
		$parser = new InstructionsParser($santa);

		$input = file_get_contents(__DIR__ . "/../../input/Day3/Puzzle3");
		$parser->parse($input);

		echo "Total number of unique houses visited: " . $santa->getNumberOfUniqueHousesDeliveredTo();
	}
}