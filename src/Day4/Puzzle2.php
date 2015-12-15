<?php

namespace Day4;

class Puzzle2
{
	public function __invoke()
	{
		$generator = new HashGenerator();
		$i = 117946;
		while (true) {
			$hash = $generator->generateHash("ckczppom", $i, "md5");
			echo $i . ": " . $hash . "\n";
			if (substr($hash, 0, 6) !== "000000") {
				$i++;
				continue;
			}
			echo "Lowest integer required to produce a hash starting with five zeroes: " . $i;
			break;
		}
	}
}