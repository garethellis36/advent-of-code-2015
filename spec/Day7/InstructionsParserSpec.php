<?php

namespace spec\Day7;

use Day7\Circuit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsParserSpec extends ObjectBehavior
{
	public function let(\Day7\Circuit $circuit)
	{
		$this->beConstructedWith($circuit);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day7\InstructionsParser');
    }

	public function it_should_be_able_to_parse_a_numeric_assignment_instruction(\Day7\Circuit $circuit)
	{
		$circuit->sendSignal("b", 44430)->shouldBeCalled();
		$this->parse("44430 -> b");
	}

	public function it_should_be_able_to_parse_assignment_from_one_wire_to_another(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willreturn(44430);
		$circuit->sendSignal("b", 44430)->shouldBeCalled();
		$this->parse("a -> b");
	}

	public function it_should_be_able_to_parse_a_not_assignment(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willReturn(44430);
		$circuit->sendSignal("b", ~ 44430)->shouldBeCalled();
		$this->parse("NOT a -> b");
	}

	public function it_should_be_able_to_parse_an_and_assignment(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willReturn(123);
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(456);
		$circuit->sendSignal("c", 123 & 456)->shouldBeCalled();
		$this->parse("a AND b -> c");
	}

	public function it_should_be_able_to_parse_an_or_assignment(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willReturn(123);
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(456);
		$circuit->sendSignal("c", 123 | 456)->shouldBeCalled();
		$this->parse("a OR b -> c");
	}

	public function it_should_be_able_to_parse_an_lshift_assignment(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willReturn(123);
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(456);
		$circuit->sendSignal("c", 123 << 456)->shouldBeCalled();
		$this->parse("a LSHIFT b -> c");
	}

	public function it_should_be_able_to_parse_an_rshift_assignment(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willReturn(123);
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(456);
		$circuit->sendSignal("c", 123 >> 456)->shouldBeCalled();
		$this->parse("a RSHIFT b -> c");
	}

	public function it_should_return_false_if_trying_to_assign_an_unassigned_value(Circuit $circuit)
	{
		$circuit->getWireValue("a")->shouldBeCalled()->willReturn(null);
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(null);
		$this->parse("a RSHIFT b -> c")->shouldBe(false);
	}

	public function it_should_return_false_if_trying_to_assign_the_value_of_one_wire_to_another(Circuit $circuit)
	{
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(null);
		$this->parse("b -> c")->shouldBe(false);
	}

	public function it_should_return_false_if_trying_to_assign_with_not_operand_an_unassigned_value(Circuit $circuit)
	{
		$circuit->getWireValue("b")->shouldBeCalled()->willReturn(null);
		$this->parse("NOT b -> c")->shouldBe(false);
	}
}
