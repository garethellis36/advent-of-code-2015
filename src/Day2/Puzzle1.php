<?php

namespace Day2;


class Puzzle1
{
	public function __invoke()
	{
		$input = file_get_contents(__DIR__ . "/../../input/Day2/Puzzle1");
		$parser = new DimensionsParser($input);
		$pile = new PresentPile($parser);

		echo "Total amount of paper required in square feet: " . $pile->getTotalAmountOfWrappingPaperRequired();
	}
}