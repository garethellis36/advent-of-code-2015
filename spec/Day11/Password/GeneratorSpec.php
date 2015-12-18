<?php

namespace spec\Day11\Password;

use Day11\LetterIncrementer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeneratorSpec extends ObjectBehavior
{
	public function let(LetterIncrementer $incrementer)
	{
		$this->beConstructedWith($incrementer);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day11\Password\Generator');
    }

	public function it_should_be_able_to_generate_the_next_password(LetterIncrementer $incrementer)
	{
		$incrementer->increment("h")->shouldBeCalled()->willReturn("i");
		$this->nextPassword("abcdefgh")->shouldBe("abcdefgi");
	}

	public function it_should_know_to_wrap_appropriately(LetterIncrementer $incrementer)
	{
		$incrementer->increment("z")->shouldBeCalled()->willReturn("a");
		$incrementer->increment("a")->shouldBeCalled()->willReturn("b");
		$this->nextPassword("abcdefaz")->shouldBe("abcdefba");
	}
}