<?php

namespace Day20;


class Puzzle1
{
	use \ConsoleTrait;

	public function __invoke()
	{
		$elfCalculator = new ElfCalculator();
		$deliverer = new PresentDeliverer($elfCalculator);

		$input = 34000000;
		$house = 600000;
		while (true) {
			if ($deliverer->giftsDeliveredToHouse($house) >= $input) {
				break;
			}
			$house++;
		}

		$this->write("House # {$house} got {$input} gifts");
	}
}