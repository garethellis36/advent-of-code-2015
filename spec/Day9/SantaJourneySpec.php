<?php

namespace spec\Day9;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day9\City;

class SantaJourneySpec extends ObjectBehavior
{
	public function let(City $london, City $dublin, City $belfast)
	{
		$this->beConstructedWith([
			$london,
			$dublin,
			$belfast
		]);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\SantaJourney');
    }

	public function it_should_know_its_distance(City $london, City $dublin, City $belfast)
	{
		$dublin->getName()->shouldBeCalled()->willReturn("Dublin");
		$london->distanceTo("Dublin")->shouldBeCalled()->willReturn(15);

		$belfast->getName()->shouldBeCalled()->willReturn("Belfast");
		$dublin->distanceTo("Belfast")->shouldBeCalled()->willReturn(25);

		$this->distance()->shouldBe(40);
	}
}
