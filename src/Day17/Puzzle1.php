<?php

namespace Day17;


class Puzzle1
{
	use \InputLoaderTrait,
		\ConsoleTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day17/Puzzle1");
		$calculator = new Calculator();
		$this->write("# combinations: " . $calculator->combinations(150, explode(PHP_EOL, $input)));
	}

}