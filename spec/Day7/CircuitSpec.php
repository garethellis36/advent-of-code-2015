<?php

namespace spec\Day7;

use Day7\WiresCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CircuitSpec extends ObjectBehavior
{
	public function let(\Day7\WiresCollection $wires)
	{
		$this->beConstructedWith($wires);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day7\Circuit');
    }

	public function it_should_be_able_to_report_the_value_of_a_given_wire(\Day7\WiresCollection $wires)
	{
		$wires->offsetGet("x")->shouldBeCalled()->willReturn(null);
		$this->getWireValue("x")->shouldBeNull();
	}

	public function it_should_be_able_to_send_a_signal_to_a_wire(\Day7\WiresCollection $wires)
	{
		$wires->offsetSet("y", 5)->shouldBeCalled();
		$wires->offsetGet("y")->shouldBeCalled()->willReturn(5);
		$this->sendSignal("y", 5);
		$this->getWireValue("y")->shouldBe(5);
	}

	public function it_should_be_able_to_reset_all_wires(WiresCollection $wires)
	{
		$wires->offsetSet("a", 123)->shouldBeCalled();

		$wires->offsetGet("a")->shouldBeCalledTimes(1)->willReturn(null);
		$this->sendSignal("a", 123);

		$wires->resetAll()->shouldBeCalled();

		$this->resetAllWires();

		$this->getWireValue("a")->shouldBe(null);
	}
}
