<?php

namespace spec\Day15;

use Day15\Ingredient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LarderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day15\Larder');
    }

	public function it_should_be_countable()
	{
		$this->shouldHaveCount(0);
	}

	public function it_should_be_able_to_have_an_ingredient_added(Ingredient $butterscotch)
	{
		$butterscotch->name()->shouldBeCalled()->willReturn("Butterscotch");

		$this[] = $butterscotch;
		$this["Butterscotch"]->shouldBe($butterscotch);
	}

	public function it_should_be_able_to_return_an_array_of_ingredient_names(Ingredient $butterscotch)
	{
		$butterscotch->name()->shouldBeCalled()->willReturn("Butterscotch");

		$this[] = $butterscotch;
		$this->ingredients()->shouldBe(["Butterscotch"]);
	}
}
