<?php

namespace spec\Day3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day3\Santa;

class InstructionsParserSpec extends ObjectBehavior
{
	public function let(Santa $santa)
	{
		$this->beConstructedWith($santa);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day3\InstructionsParser');
    }

	public function it_can_translate_up_arrow_as_go_north(Santa $santa)
	{
		$santa->moveNorth()->shouldBeCalled();
		$this->parse("^");
	}

	public function it_can_translate_v_as_go_south(Santa $santa)
	{
		$santa->moveSouth()->shouldBeCalled();
		$this->parse("v");
	}

	public function it_can_translate_left_arrow_as_go_west(Santa $santa)
	{
		$santa->moveWest()->shouldBeCalled();
		$this->parse("<");
	}

	public function it_can_translate_right_arrow_as_go_east(Santa $santa)
	{
		$santa->moveEast()->shouldBeCalled();
		$this->parse(">");
	}

	public function it_can_translate_multiple_instructions(Santa $santa)
	{
		$santa->moveWest()->shouldBeCalledTimes(3);
		$santa->moveNorth()->shouldBeCalledTimes(4);
		$this->parse("<^^<<^^");
	}

	public function it_can_parse_instructions_for_two_santas(Santa $santa, Santa $robosanta)
	{
		$this->beConstructedWith($santa, $robosanta);

		$santa->moveWest()->shouldBeCalledTimes(2);
		$santa->moveNorth()->shouldBeCalledTimes(2);
		$robosanta->moveWest()->shouldBeCalledTimes(1);
		$robosanta->moveNorth()->shouldBeCalledTimes(2);
		$this->parseForTwoSantas("<^^<<^^");
	}
}
