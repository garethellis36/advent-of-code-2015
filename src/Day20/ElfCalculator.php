<?php

namespace Day20;

class ElfCalculator implements FactorInterface
{
	public function get($n)
	{
		for ($x = 1; $x <= sqrt($n); $x++) {
			if ($n % $x == 0) {
				$z = $n / $x;
				yield $x;
				yield $z;
			}
		}
	}
}
