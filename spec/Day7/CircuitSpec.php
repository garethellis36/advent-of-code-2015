<?php

namespace spec\Day7;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CircuitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day7\Circuit');
    }

	public function it_should_be_able_to_provide_an_integer_signal_to_a_wire()
	{
		$this->sendSignal(10, "z");
		//HOW TO TEST?!
	}

	public function it_should_be_able_to_handle_bitwise_or()
	{
		$this->sendSignalOr("x", "y", "z");

	}

	public function it_should_be_able_to_handle_bitwise_and()
	{
		$this->sendSignalAnd("x", "y", "z");
	}

	public function it_should_be_able_to_handle_bitwise_not()
	{
		$this->sendSignalNot("x", "y");
	}

	public function it_should_be_able_to_handle_bitwise_left_shift()
	{
		$this->sendSignalLShift("x", 15, "z");
	}

	public function it_should_be_able_to_handle_bitwise_right_shift()
	{
		$this->sendSignalRShift("x", 15, "z");
	}
}
