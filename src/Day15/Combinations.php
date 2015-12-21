<?php

namespace Day15;

class Combinations
{
	/**
	 * Generator
	 *
	 * Works out all combinations of $n numbers that add up to $target
	 *
	 * @param $n
	 * @param $target
	 *
	 * @return array
	 */
	public function generate($n, $target)
	{
		$combinations = [];
		for ($i = 1; $i <= $n; $i++) {
			$combinations[] = 0;
		}

		foreach ($combinations as $k => &$combination) {
			for ($i = $combination; $i <= $target; $i++) {
				$combination = $i;
				if (\array_sum($combinations) == $target) {
					yield $combinations;
				}
			}
		}
	}
}

