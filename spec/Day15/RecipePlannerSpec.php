<?php

namespace spec\Day15;

use Day15\Combinations;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day15\Larder;
use Day15\Recipe;
use Day15\Ingredient;

class RecipePlannerSpec extends ObjectBehavior
{
	public function let(Larder $larder, Combinations $combinations)
	{
		$this->beConstructedWith($larder, $combinations);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day15\RecipePlanner');
    }

	private function combo()
	{
		$array = [];
		for ($i = 0; $i <= 100; $i++) {
			$array[] = [
				100 - $i,
				$i
			];
		}
		return $array;
	}

	public function it_should_return_a_recipe_instance_when_calculating_best_recipe(Larder $larder, Combinations $combinations, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$this->prepareMocks($larder, $combinations, $butterscotch, $cinnamon);
		$this->megaCookie(100)->shouldBeAnInstanceOf(Recipe::class);
	}

	public function it_should_return_the_best_recipe_when_calculating_best_recipe(Larder $larder, Combinations $combinations, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$this->prepareMocks($larder, $combinations, $butterscotch, $cinnamon);

		/**
		 * @var $megaCookie Recipe
		 */
		$megaCookie = $this->megaCookie(100);
		$megaCookie->totalScoreForRecipe()->shouldBe(62842880);
	}

	public function it_should_be_able_to_get_the_best_cookie_with_a_given_number_of_calories(Larder $larder, Combinations $combinations, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$combinations->generate(100)->shouldBeCalled()->willReturn($this->combo());

		$larder->ingredients()->shouldBeCalled()->willReturn(["Butterscotch", "Cinnamon"]);

		$larder->offsetGet("Butterscotch")->shouldBeCalled()->willReturn($butterscotch);
		$larder->offsetGet("Cinnamon")->shouldBeCalled()->willReturn($cinnamon);

		$butterscotch->capacity()->willReturn(-1);
		$cinnamon->capacity()->willReturn(2);

		$butterscotch->durability()->willReturn(-2);
		$cinnamon->durability()->willReturn(3);

		$butterscotch->flavour()->willReturn(6);
		$cinnamon->flavour()->willReturn(-2);

		$butterscotch->texture()->willReturn(3);
		$cinnamon->texture()->willReturn(-1);

		$butterscotch->calories()->shouldBeCalled()->willReturn(8);
		$cinnamon->calories()->shouldBeCalled()->willReturn(3);

		/**
		 * @var $megaCookie Recipe
		 */
		$megaCookie = $this->megaCookieWithCalories(100, 500);
		$megaCookie->shouldBeAnInstanceOf(Recipe::class);
		$megaCookie->quantities()->shouldBe([
			"Butterscotch" => 40,
			"Cinnamon" => 60
		]);
		$megaCookie->totalScoreForRecipe()->shouldBe(57600000);
	}

	/**
	 * @param Larder $larder
	 * @param Combinations $combinations
	 * @param Ingredient $butterscotch
	 * @param Ingredient $cinnamon
	 */
	private function prepareMocks(Larder $larder, Combinations $combinations, Ingredient $butterscotch, Ingredient $cinnamon)
	{
		$combinations->generate(100)->shouldBeCalled()->willReturn($this->combo());

		$larder->ingredients()->shouldBeCalled()->willReturn(["Butterscotch", "Cinnamon"]);

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
	}
}
