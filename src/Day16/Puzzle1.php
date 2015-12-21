<?php

namespace Day16;

class Puzzle1
{
	use \ConsoleTrait, \InputLoaderTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day16/Puzzle1");

		$parser = new InstructionsParser();

		$gifterProperties = [
			"children" => 3,
			"cats" => 7,
			"samoyeds" => 2,
			"pomeranians" => 3,
			"akitas" => 0,
			"vizslas" => 0,
			"goldfish" => 5,
			"trees" => 3,
			"cars" => 2,
			"perfumes" => 1,
		];

		foreach (explode(PHP_EOL, $input) as $instruction) {

			$sue = $parser->parse($instruction);

			$couldBeThisSue = true;
			foreach ($gifterProperties as $property => $value) {

				if (!$sue->couldBe($property, $value)) {
					$couldBeThisSue = false;
					break;
				}
			}

			if ($couldBeThisSue) {
				break;
			}
		}

		$this->write("Sue number: " . $sue->number());
	}

}