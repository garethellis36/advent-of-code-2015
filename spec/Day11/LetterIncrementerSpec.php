<?php

namespace spec\Day11;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LetterIncrementerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day11\LetterIncrementer');
    }

	public function it_should_be_able_to_increment_a_letter()
	{
		$this->increment("a")->shouldBe("b");
	}

	public function it_should_wrap_z_to_a()
	{
		$this->increment("z")->shouldBe("a");
	}
}
