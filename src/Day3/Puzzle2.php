<?php

namespace Day3;


class Puzzle2
{
	public function __invoke()
	{
		$santa = new Santa();
		$robosanta = new Santa();
		$parser = new InstructionsParser($santa, $robosanta);

		$input = file_get_contents(__DIR__ . "/../../input/Day3/Puzzle3");
		$parser->parseForTwoSantas($input);

		$analyzer = new SantaDeliveryReportAnalyzer($santa, $robosanta);

		echo "Total number of unique houses visited: " . $analyzer->getNumberOfUniqueHousesDeliveredTo();
	}
}