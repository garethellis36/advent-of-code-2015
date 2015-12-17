<?php

namespace Day8;


class Puzzle2
{
	public function __invoke()
	{
		$input = file_get_contents(__DIR__ . "/../../input/Day8/Puzzle1");
		$instructions = explode(PHP_EOL, $input);

		$total = 0;
		foreach ($instructions as $instruction) {
			$entry = new ListEntry($instruction);
			$total += $entry->countNumberOfCharsInStringCodeWhenEscaped() - $entry->countNumberOfCharsInStringCode();
		}

		echo "Answer: " . $total;
	}
}