<?php

namespace Day2;


class Puzzle2
{
	public function __invoke()
	{
		$input = file_get_contents(__DIR__ . "/../../input/Day2/Puzzle1");
		$parser = new DimensionsParser($input);
		$pile = new PresentPile($parser);

		echo "Total amount of ribbon required in feet: " . $pile->getTotalAmountOfRibbonRequired();
	}
}