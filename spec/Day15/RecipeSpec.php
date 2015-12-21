<?php

namespace spec\Day15;

use Day15\Ingredient;
use Day15\Larder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day15\InvalidNumberOfTeaspoonsProvidedException;

class RecipeSpec extends ObjectBehavior
{
	public function let(Larder $larder)
	{
		$this->beConstructedWith($larder, 100, [
			"Butterscotch" => 44,
			"Cinnamon" => 56
		]);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day15\Recipe');
    }

	public function it_should_ensure_the_number_of_required_teaspoons_matches_the_total_provided_in_constructor(Larder $larder)
	{
		$this->beConstructedWith($larder, 100, [
			"Butterscotch" => 44,
			"Cinnamon" => 54
		]);
		$this->shouldThrow(InvalidNumberOfTeaspoonsProvidedException::class);
	}

	public function it_should_be_able_to_calculate_total_score_for_a_given_property(Larder $larder, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$larder->offsetGet("Butterscotch")->shouldBeCalled()->willReturn($butterscotch);
		$larder->offsetGet("Cinnamon")->shouldBeCalled()->willReturn($cinnamon);

		$butterscotch->capacity()->shouldBeCalled()->willReturn(-1);
		$cinnamon->capacity()->shouldBeCalled()->willReturn(2);

		$this->totalScoreForProperty("capacity")->shouldBe(68);
	}

	public function it_should_be_able_to_return_a_total_score_of_zero_for_a_negative_property_score(Larder $larder, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$larder->offsetGet("Butterscotch")->shouldBeCalled()->willReturn($butterscotch);
		$larder->offsetGet("Cinnamon")->shouldBeCalled()->willReturn($cinnamon);

		$butterscotch->capacity()->shouldBeCalled()->willReturn(-2);
		$cinnamon->capacity()->shouldBeCalled()->willReturn(1);

		$this->totalScoreForProperty("capacity")->shouldBe(0);
	}

	public function it_should_be_able_to_return_a_total_score_for_the_recipe(Larder $larder, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$larder->offsetGet("Butterscotch")->shouldBeCalled()->willReturn($butterscotch);
		$larder->offsetGet("Cinnamon")->shouldBeCalled()->willReturn($cinnamon);

		$butterscotch->capacity()->shouldBeCalled()->willReturn(-1);
		$cinnamon->capacity()->shouldBeCalled()->willReturn(2);

		$butterscotch->durability()->shouldBeCalled()->willReturn(-2);
		$cinnamon->durability()->shouldBeCalled()->willReturn(3);

		$butterscotch->flavour()->shouldBeCalled()->willReturn(6);
		$cinnamon->flavour()->shouldBeCalled()->willReturn(-2);

		$butterscotch->texture()->shouldBeCalled()->willReturn(3);
		$cinnamon->texture()->shouldBeCalled()->willReturn(-1);

		$this->totalScoreForRecipe()->shouldBe(62842880);
	}
}

