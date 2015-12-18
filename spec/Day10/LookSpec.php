<?php

namespace spec\Day10;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LookSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day10\Look');
    }

	public function it_should_be_able_to_say()
	{
		$this->say("111221")->shouldBe("312211");
	}
}
