<?php

namespace Day9;


class Puzzle1
{
	public function __invoke()
	{
		$input = file_get_contents(__DIR__ . "/../../input/Day9/Puzzle1");

		$mapper = new DistanceMapper();
		$cities = $mapper->createCities($input);

		$permutations = new Permutations();

		$planner = new JourneyPlanner($permutations, $cities);
		$shortestJourney = $planner->calculateShortestRoute();

		echo "Shortest route: " . $shortestJourney->distance();
	}
}