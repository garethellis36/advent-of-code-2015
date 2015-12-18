<?php

namespace Day9;

class DistanceMapper
{
	private $cityNames = [];

	private $distances = [];

    public function createCities($input)
    {
		$this->parseInput($input);

        $cities = new CitiesCollection();

		foreach ($this->cityNames as $cityName) {
			$cities->addCity($cityName, $this->distances[$cityName]);
		}

		return $cities;
    }

	private function parseInput($input)
	{
		$distances = explode(PHP_EOL, $input);

		foreach ($distances as $distance) {

			list($start, $to, $destination, $equals, $distance) = explode(" ", $distance);

			if (!in_array($start, $this->cityNames)) {
				$this->cityNames[] = $start;
			}

			if (!in_array($destination, $this->cityNames)) {
				$this->cityNames[] = $destination;
			}

			if (!isset($this->distances[$start][$destination])) {
				$this->distances[$start][$destination] = $distance;
			}

			if (!isset($this->distances[$destination][$start])) {
				$this->distances[$destination][$start] = $distance;;
			}
		}
	}

	public function distanceBetween($start, $destination)
	{
		if (!isset($this->distances[$start][$destination])) {
			return null;
		}
		return (int)$this->distances[$start][$destination];
	}
}

