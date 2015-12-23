<?php

namespace spec\Day20;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day20\FactorInterface;

class PresentDelivererSpec extends ObjectBehavior
{
	public function let(FactorInterface $factor)
	{
		$this->beConstructedWith($factor);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day20\PresentDeliverer');
    }

	public function it_should_be_able_to_work_out_the_number_of_gifts_delivered_to_a_given_house(FactorInterface $factor)
	{
		$factor->get("6")->shouldBeCalled()->willReturn([1,6,2,3]);
		$this->giftsDeliveredToHouse(6)->shouldBe(120);
	}

	public function it_should_be_able_to_work_out_the_number_of_gifts_delivered_to_house_eight(FactorInterface $factor)
	{
		$factor->get("8")->shouldBeCalled()->willReturn([1,2,4,8]);
		$this->giftsDeliveredToHouse(8)->shouldBe(150);
	}
}
