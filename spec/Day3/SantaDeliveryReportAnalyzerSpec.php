<?php

namespace spec\Day3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day3\Santa;

class SantaDeliveryReportAnalyzerSpec extends ObjectBehavior
{
	public function let(Santa $santa, Santa $robosanta)
	{
		$this->beConstructedWith($santa, $robosanta);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day3\SantaDeliveryReportAnalyzer');
    }

	public function it_can_calculate_unique_houses_delivered_to_from_both_santas(Santa $santa, Santa $robosanta)
	{
		$santa->getHousesDeliveredTo()->willReturn([
			[0,0],
			[1,0],
			[1,1]
		]);
		$robosanta->getHousesDeliveredTo()->willReturn([
			[0,0],
			[0,1],
			[1,1]
		]);
		$this->getNumberOfUniqueHousesDeliveredTo()->shouldBe(4);
	}
}
