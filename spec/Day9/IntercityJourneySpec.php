<?php

namespace spec\Day9;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day9\City;

class IntercityJourneySpec extends ObjectBehavior
{
	public function let(City $start, City $end)
	{
		$this->beConstructedWith($start, $end);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\IntercityJourney');
    }

	public function it_should_know_its_distance(City $start, City $end)
	{
		$end->getName()->shouldBeCalled()->willReturn("London");
		$start->distanceTo("London")->shouldBeCalled()->willReturn(10);

		$this->distance()->shouldBe(10);
	}
}
