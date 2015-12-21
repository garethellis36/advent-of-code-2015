<?php

namespace Day15;

class Combinations
{
	/**
	 * Generator
	 *
	 * Works out all combinations of four numbers that add up to $target
	 *
	 * @param $target
	 *
	 * @return array
	 */
	public function generate($target)
	{
		for ($a = 0; $a <= $target; $a++) {
			for ($b = 0; $b <= $target; $b++) {
				for ($c = 0; $c <= $target; $c++) {
					for ($d = 0; $d <= $target; $d++) {
						if ($a + $b + $c + $d == $target) {
							yield [$a,$b,$c,$d];
						}
					}
				}
			}
		}
	}
}

