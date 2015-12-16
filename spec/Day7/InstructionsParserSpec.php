<?php

namespace spec\Day7;

use Day7\Circuit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsParserSpec extends ObjectBehavior
{
	public function let(Circuit $circuit) {
		$this->beConstructedWith($circuit);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day7\InstructionsParser');
    }

	public function it_should_parse_numeric_assignment(Circuit $circuit)
	{
		$circuit->sendSignal(44430, "b")->shouldBeCalled();
		$this->parse("44430 -> b");
	}

	public function it_should_parse_an_and_command(Circuit $circuit)
	{
		$circuit->sendSignalAnd("eg", "ei", "ej")->shouldBeCalled();
		$this->parse("eg AND ei -> ej");
	}

	public function it_should_parse_an_or_command(Circuit $circuit)
	{
		$circuit->sendSignalOr("bj", "bi", "bk")->shouldBeCalled();
		$this->parse("bj OR bi -> bk");
	}

	public function it_should_parse_a_not_command(Circuit $circuit)
	{
		$circuit->sendSignalNot("dq", "dr")->shouldBeCalled();
		$this->parse("NOT dq -> dr");
	}

	public function it_should_parse_an_lshift_command(Circuit $circuit)
	{
		$circuit->sendSignalLShift("eo", 15, "es")->shouldBeCalled();
		$this->parse("eo LSHIFT 15 -> es");
	}

	public function it_should_parse_an_rshift_command(Circuit $circuit)
	{
		$circuit->sendSignalRShift("lf", 2, "lg")->shouldBeCalled();
		$this->parse("lf RSHIFT 2 -> lg");
	}
}
