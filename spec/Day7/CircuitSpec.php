<?php

namespace spec\Day7;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day7\WiresCollection;

class CircuitSpec extends ObjectBehavior
{
	public function let(WiresCollection $wires)
	{
		$this->beConstructedWith($wires);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day7\Circuit');
    }

	public function it_should_be_able_to_provide_an_integer_signal_to_a_wire(WiresCollection $wires)
	{
		$wires->offsetSet("z", 10)->shouldBeCalled();
		$wires->offsetGet("z")->shouldBeCalled()->willReturn(10);
		$this->sendSignal(10, "z");
		$this->getWireStatus("z")->shouldBe(10);
	}

	public function it_should_be_able_to_handle_bitwise_or(WiresCollection $wires)
	{
		$this->sendSignalOr("x", "y", "z");

	}

	public function it_should_be_able_to_handle_bitwise_and(WiresCollection $wires)
	{
		$this->sendSignalAnd("x", "y", "z");
	}

	public function it_should_be_able_to_handle_bitwise_not(WiresCollection $wires)
	{
		$this->sendSignalNot("x", "y");
	}

	public function it_should_be_able_to_handle_bitwise_left_shift(WiresCollection $wires)
	{
		$this->sendSignalLShift("x", 15, "z");
	}

	public function it_should_be_able_to_handle_bitwise_right_shift(WiresCollection $wires)
	{
		$this->sendSignalRShift("x", 15, "z");
	}
}
