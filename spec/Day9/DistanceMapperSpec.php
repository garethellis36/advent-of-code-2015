<?php

namespace spec\Day9;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day9\CitiesCollection;

class DistanceMapperSpec extends ObjectBehavior
{
	private $sampleInput;

	public function __construct()
	{
		$this->sampleInput = file_get_contents(__DIR__ . "/../../input/Day9/Puzzle1Sample");
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\DistanceMapper');
    }

	public function it_should_create_a_city_collection()
	{
		$this->createCities($this->sampleInput)->shouldBeAnInstanceOf(CitiesCollection::class);
	}

	public function it_should_know_the_distance_from_one_city_to_another()
	{
		$this->createCities($this->sampleInput);
		$this->distanceBetween("London", "Belfast")->shouldBe(518);
	}

	public function it_should_know_the_distance_from_one_city_to_another_in_reverse()
	{
		$this->createCities($this->sampleInput);
		$this->distanceBetween("Belfast", "London")->shouldBe(518);
	}
}
