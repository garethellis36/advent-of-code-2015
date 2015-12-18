<?php

namespace spec\Day9;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CitySpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith("London", [
			"Dublin" => 464,
			"Belfast" => 518,
		]);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\City');
    }

	public function it_should_know_its_own_name()
	{
		$this->getName()->shouldBe("London");
	}

	public function it_should_know_the_distance_to_any_other_given_city()
	{
		$this->distanceTo("Dublin")->shouldBe(464);
	}
}
