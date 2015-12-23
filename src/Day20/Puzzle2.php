<?php

namespace Day20;


class Puzzle2
{
	use \ConsoleTrait;

	public function __invoke()
	{
		$elfCalculator = new LimitedHousesElfCalculator();
		$deliverer = new PresentDeliverer($elfCalculator, 11);

		$input = 34000000;
		$house = 600000;
		$maxHousesPerElf = 50;

		while (true) {
			if ($deliverer->giftsDeliveredToHouseWithMaxPerElf($house, $maxHousesPerElf) >= $input) {
				break;
			}
			$house++;
		}

		$this->write("House # {$house} got {$input} gifts");
	}
}