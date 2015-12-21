<?php

namespace spec\Day15;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IngredientSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith("Butterscotch", -1, -2, 6, 3, 8);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day15\Ingredient');
    }

	public function it_should_know_its_name()
	{
		$this->name()->shouldBe("Butterscotch");
	}

	public function it_should_know_its_capacity()
	{
		$this->capacity()->shouldBe(-1);
	}

	public function it_should_know_its_durability()
	{
		$this->durability()->shouldBe(-2);
	}

	public function it_should_know_its_flavour()
	{
		$this->flavour()->shouldBe(6);
	}

	public function it_should_not_accept_the_american_spelling_of_flavour()
	{
		$this->shouldThrow('Day15\AmericanSpellingException')->during('flavor');
	}

	public function it_should_know_its_texture()
	{
		$this->texture()->shouldBe(3);
	}

	public function it_should_know_its_calories()
	{
		$this->calories()->shouldBe(8);
	}
}
