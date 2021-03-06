<?php

namespace Day17;


class Puzzle1
{
	use \InputLoaderTrait,
		\ConsoleTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day17/Puzzle1");
		$filler = new EggnogFiller(explode(PHP_EOL, $input));
		$this->write("# combinations: " . count($filler->fill(150)));
	}

}