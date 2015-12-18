<?php

namespace spec\Day9;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day9\City;

class CitiesCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\CitiesCollection');
    }

	public function it_should_be_able_to_add_a_city()
	{
		$this->addCity("London", [
			"Dublin" => 464,
			"Belfast" => 518,
		]);
		$this["0"]->shouldBeAnInstanceOf(City::class);
	}

	public function it_should_be_able_to_return_its_array_keys()
	{
		$this->addCity("London", [
			"Dublin" => 464,
			"Belfast" => 518,
		]);
		$this->keys()->shouldBe([0]);
	}
}
