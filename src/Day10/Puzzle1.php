<?php

namespace Day10;


class Puzzle1
{
	public function __invoke()
	{
		$look = new Look();

		$string = "1321131112";
		for ($i = 1; $i <= 40; $i++) {
			$string = $look->say($string);
		}

		echo "String: " . $string . PHP_EOL;
		echo "Length: " . strlen($string) . PHP_EOL . PHP_EOL;
	}
}