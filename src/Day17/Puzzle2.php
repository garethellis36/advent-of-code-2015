<?php

namespace Day17;

class Puzzle2
{
	use \InputLoaderTrait,
		\ConsoleTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day17/Puzzle1");
		$filler = new EggnogFiller(explode(PHP_EOL, $input));
		$this->write("# combinations which use minimum number of containers: " . count($filler->fillMinimumNumberOfContainers(150)));
	}

}