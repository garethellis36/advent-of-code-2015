<?php

namespace spec\Day15;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day15\Larder;

class InstructionsParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day15\InstructionsParser');
    }

	public function it_should_return_a_larder()
	{
		$input = "Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8" . PHP_EOL . "Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3";
		$larder = $this->parse($input);

		$larder->shouldBeAnInstanceOf(Larder::class);
	}

	public function it_should_return_a_larder_with_one_ingredient_per_line_of_input()
	{
		$input = "Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8" . PHP_EOL . "Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3";
		$larder = $this->parse($input);

		$larder->shouldHaveCount(2);
	}

	public function it_should_return_a_larder_with_ingredients_with_correct_properties()
	{
		$input = "Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8" . PHP_EOL . "Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3";
		$larder = $this->parse($input);

		$larder["Butterscotch"]->capacity()->shouldBe(-1);
	}
}
