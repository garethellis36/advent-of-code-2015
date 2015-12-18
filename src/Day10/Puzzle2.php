<?php

namespace Day10;


class Puzzle2
{
	public function __invoke()
	{
		ini_set("memory_limit", "2G");

		$look = new Look();

		$string = "1321131112";
		for ($i = 1; $i <= 50; $i++) {
			$string = $look->say($string);
		}

		echo "String: " . $string . PHP_EOL;
		echo "Length: " . strlen($string) . PHP_EOL . PHP_EOL;
	}
}