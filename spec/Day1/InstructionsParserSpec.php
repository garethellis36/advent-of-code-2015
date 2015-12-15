<?php

namespace spec\Day1;

use Day1\Elevator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsParserSpec extends ObjectBehavior
{
	public function let(Elevator $elevator) {
		$this->beConstructedWith($elevator);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\InstructionsParser');
    }

	public function it_should_go_up_with_open_paren(Elevator $elevator)
	{
		$elevator->goUp()->shouldBeCalled();
		$elevator->getFloor()->shouldBeCalledTimes(1);

		$this->parseInstructions('(');
	}

	public function it_should_go_down_with_close_paren(Elevator $elevator)
	{
		$elevator->goDown()->shouldBeCalled();
		$elevator->getFloor()->shouldBeCalledTimes(1);

		$this->parseInstructions(')');
	}

	public function it_can_parse_multiple_parens(Elevator $elevator)
	{
		$elevator->goDown()->shouldBeCalledTimes(4);
		$elevator->goUp()->shouldBeCalledTimes(3);
		$elevator->getFloor()->shouldBeCalledTimes(7);

		$this->parseInstructions("))(()()");
	}

	public function it_should_log_instructions(Elevator $elevator)
	{
		$elevator->goDown()->shouldBeCalledTimes(1);
		$elevator->getFloor()->shouldBeCalledTimes(1)->willReturn('-1');

		$this->parseInstructions(')');

		$this->getInstructionsLog()->shouldBe(["-1"]);
	}
}
