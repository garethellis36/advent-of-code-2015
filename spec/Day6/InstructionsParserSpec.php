<?php

namespace spec\Day6;

use Day6\LightingGrid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsParserSpec extends ObjectBehavior
{
	public function let (LightingGrid $grid)
	{
		$this->beConstructedWith($grid);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day6\InstructionsParser');
    }

	public function it_should_be_able_to_parse_an_instruction_to_turn_on(LightingGrid $grid)
	{
		$grid->turnOn(1,1)->shouldBeCalledTimes(1);
		$grid->turnOn(1,2)->shouldBeCalledTimes(1);
		$grid->turnOn(1,3)->shouldBeCalledTimes(1);
		$grid->turnOn(2,1)->shouldBeCalledTimes(1);
		$grid->turnOn(2,2)->shouldBeCalledTimes(1);
		$grid->turnOn(2,3)->shouldBeCalledTimes(1);
		$grid->turnOn(3,1)->shouldBeCalledTimes(1);
		$grid->turnOn(3,2)->shouldBeCalledTimes(1);
		$grid->turnOn(3,3)->shouldBeCalledTimes(1);
		$this->parse("turn on 1,1 through 3,3");
	}
}
