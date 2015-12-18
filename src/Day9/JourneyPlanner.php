<?php

namespace Day9;

class JourneyPlanner
{
	private $permutations;

	private $cities;

	public function __construct(Permutations $permutations, CitiesCollection $cities)
	{
		$this->permutations = $permutations;
		$this->cities = $cities;
	}

    public function calculateShortestRoute()
    {
        $keys = $this->cities->keys();

		$i = 0;
		foreach ($this->permutations->calculate($keys) as $permutation) {

			$cities = [];
			foreach ($permutation as $arrayKey) {
				$cities[] = $this->cities[$arrayKey];
			}

			$journey = new SantaJourney($cities);
			if (!isset($shortestDistance) || $journey->distance() < $shortestDistance) {
				$shortestJourney = $journey;
				$shortestDistance = $shortestJourney->distance();
			}
		}

		if (!isset($shortestJourney)) {
			throw new \RuntimeException("No shortest journey found?!");
		}

		return $shortestJourney;
    }

    public function calculateLongestRoute()
    {
		$keys = $this->cities->keys();

		$i = 0;
		foreach ($this->permutations->calculate($keys) as $permutation) {

			$cities = [];
			foreach ($permutation as $arrayKey) {
				$cities[] = $this->cities[$arrayKey];
			}

			$journey = new SantaJourney($cities);
			if (!isset($longestDistance) || $journey->distance() > $longestDistance) {
				$longestJourney = $journey;
				$longestDistance = $longestJourney->distance();
			}
		}

		if (!isset($longestJourney)) {
			throw new \RuntimeException("No longest journey found?!");
		}

		return $longestJourney;
    }
}

