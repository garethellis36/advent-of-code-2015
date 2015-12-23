<?php

namespace Day20;

class LimitedHousesElfCalculator implements FactorInterface
{
	public function get($n)
	{
		for ($x = 1; $x <= sqrt($n); $x++) {
			if ($n % $x == 0) {
				$z = $n / $x;
				yield [$x,$z];
				yield [$z,$x];
			}
		}
	}
}
