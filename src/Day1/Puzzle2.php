<?php

namespace Day1;


class Puzzle2
{
	public function __invoke()
	{
		$elevator = new Elevator();
		$parser = new InstructionsParser($elevator);

		$input = file_get_contents(__DIR__ . "/../../input/Day1/Puzzle1");

		$parser->parseInstructions($input);

		$log = $parser->getInstructionsLog();

		$logEntryKey = array_search("-1", $log);

		echo "Instruction # entered for first entry to basement: " . ($logEntryKey+1);
	}
}