<?php

namespace spec\Day23;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsListSpec extends ObjectBehavior
{
	public function let()
	{
		$input = "inc a".PHP_EOL."jio a, +2".PHP_EOL."tpl a".PHP_EOL."inc a";
		$this->beConstructedWith($input);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day23\InstructionsList');
    }

	public function it_should_be_able_to_return_a_given_instruction()
	{
		$this["0"]->shouldBe("inc a");
	}

	public function it_should_be_countable()
	{
		$this->shouldHaveCount(4);
	}
}
