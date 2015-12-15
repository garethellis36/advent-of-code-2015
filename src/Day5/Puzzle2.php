<?php

namespace Day5;


class Puzzle2
{
	public function __invoke()
	{
		$input = file_get_contents(__DIR__ . "/../../input/Day5/Puzzle1");
		$strings = explode(PHP_EOL, $input);

		$nice = 0;
		foreach ($strings as $string) {
			$naughtyOrNice = new NaughtyOrNiceString($string);

			if ($naughtyOrNice->isNiceAccordingToNewRules()) {
				$nice++;
			}
		}

		echo "Total number of 'nice' strings: {$nice}";
	}
}