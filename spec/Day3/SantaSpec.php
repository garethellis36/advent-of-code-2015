<?php

namespace spec\Day3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SantaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day3\Santa');
    }

	public function it_should_be_able_to_move_north()
	{
		$this->moveNorth();
		$this->getPosition()->shouldBe([0, 1]);
	}

	public function it_should_be_able_to_move_south()
	{
		$this->moveSouth();
		$this->getPosition()->shouldBe([0,-1]);
	}

	public function it_should_be_able_to_move_west()
	{
		$this->moveWest();
		$this->getPosition()->shouldBe([-1,0]);
	}

	public function it_should_be_able_to_move_east()
	{
		$this->moveEast();
		$this->getPosition()->shouldBe([1,0]);
	}

	public function it_should_log_each_present_delivered()
	{
		$this->getHousesDeliveredTo()->shouldHaveCount(1);
		$this->moveNorth();
		$this->getHousesDeliveredTo()->shouldHaveCount(2);
		$this->moveWest();
		$this->getHousesDeliveredTo()->shouldBe([
			[0,0],
			[0,1],
			[-1,1]
		]);
	}

	public function it_should_be_able_to_identify_number_of_unique_houses()
	{
		$this->moveNorth();
		$this->moveSouth();
		$this->moveNorth();
		$this->moveSouth();
		$this->getNumberOfUniqueHousesDeliveredTo()->shouldBe(2);
	}
}
