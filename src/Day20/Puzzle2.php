<?php

namespace Day20;


class Puzzle2
{
	use \ConsoleTrait;

	public function __invoke()
	{
		$elfCalculator = new LimitedHousesElfCalculator();
		$deliverer = new PresentDeliverer($elfCalculator);

		$input = 34000000;
		$house = 850000;
		$maxHousesPerElf = 50;
		while (true) {
			if ($deliverer->giftsDeliveredToHouse($house) >= $input) {
				break;
			}
			$house++;
		}

		$this->write("House # {$house} got {$input} gifts");
	}
}