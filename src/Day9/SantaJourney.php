<?php

namespace Day9;

class SantaJourney
{
	/**
	 * @var array City[]
	 */
	private $cities;

	public function __construct(array $cities)
	{
		$this->cities = $cities;
	}

    public function distance()
    {
		$distance = 0;

		$names = [];
		foreach ($this->cities as $city) {
			$names[] = $city->getName();
		}
		//echo PHP_EOL . implode(" -> ", $names);

		$cities = array_values($this->cities);
		$keys = array_keys($cities);

		$lastKey = end($keys);
		foreach ($cities as $key => $city) {

			if ($key == $lastKey) {
				//echo PHP_EOL . "Total: " . $distance . PHP_EOL;
				return $distance;
			}

			$next = $cities[$key + 1];

			$distance += (int)$city->distanceTo($next->getName());
		}

		return $distance;
    }
}

