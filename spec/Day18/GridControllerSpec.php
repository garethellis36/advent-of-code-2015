<?php

namespace spec\Day18;

use Day18\AnimatedLightingGrid;
use Day18\BrokenAnimatedLightingGrid;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GridControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day18\GridController');
    }

	public function it_should_be_able_to_create_a_grid()
	{
		$input = ".#.#.#".PHP_EOL."...##.".PHP_EOL."#....#".PHP_EOL."..#...".PHP_EOL."#.#..#".PHP_EOL."####..";
		$this->startGrid($input, 6, 6)->shouldBeAnInstanceOf(AnimatedLightingGrid::class);
	}

	public function it_should_be_able_to_create_a_broken_grid()
	{
		$input = ".#.#.#".PHP_EOL."...##.".PHP_EOL."#....#".PHP_EOL."..#...".PHP_EOL."#.#..#".PHP_EOL."####..";
		$this->startGrid($input, 6, 6, true)->shouldBeAnInstanceOf(BrokenAnimatedLightingGrid::class);
	}

	public function it_should_create_a_grid_with_the_correct_initial_state()
	{
		$input = ".#.#.#".PHP_EOL."...##.".PHP_EOL."#....#".PHP_EOL."..#...".PHP_EOL."#.#..#".PHP_EOL."####..";
		/**
		 * @var $grid AnimatedLightingGrid
		 */
		$grid = $this->startGrid($input, 6, 6);
		$grid->isOnAt(1,1)->shouldBe(false);
		$grid->isOnAt(2,1)->shouldBe(true);
		$grid->numberTurnedOn()->shouldBe(15);
	}

	public function it_should_return_a_grid_when_updating_the_grid_to_the_next_state(AnimatedLightingGrid $grid)
	{
		$grid->lights([
			"3-1",
			"4-1",
			"3-2",
			"4-2",
			"6-2",
			"4-3",
			"5-3",
			"1-5",
			"1-6",
			"3-6",
			"4-6",
		])->shouldBeCalled();

		$on = [
			"2-1",
			"4-1",
			"6-1",
			"4-2",
			"5-2",
			"1-3",
			"6-3",
			"3-4",
			"1-5",
			"3-5",
			"6-5",
			"1-6",
			"2-6",
			"3-6",
			"4-6",
		];

		$grid->getLights()->shouldBeCalled()->willReturn($on);

		$realGrid = new AnimatedLightingGrid($on, 6, 6);

		for ($y = 1; $y <= 6; $y++) {
			for ($x = 1; $x <= 6; $x++) {
				$grid->neighbours($x,$y)->shouldBeCalled()->willReturn($realGrid->neighbours($x,$y));
			}
		}

		$grid->horizontalSize()->shouldBeCalled()->willReturn(6);
		$grid->verticalSize()->shouldBeCalled()->willReturn(6);

		$this->nextGrid($grid)->shouldBeAnInstanceOf(AnimatedLightingGrid::class);
	}

	public function it_should_return_a_broken_grid_when_updating_the_grid_to_the_next_state(BrokenAnimatedLightingGrid $grid)
	{
		$grid->getBrokenLights()->shouldBeCalled()->willReturn([
			"1-1",
			"6-1",
			"1-6",
			"6-6",
		]);

		$grid->lights([
			"1-1",
			"3-1",
			"4-1",
			"6-1",
			"1-2",
			"2-2",
			"3-2",
			"4-2",
			"6-2",
			"4-3",
			"5-3",
			"1-5",
			"5-5",
			"1-6",
			"3-6",
			"4-6",
			"5-6",
			"6-6",
		])->shouldBeCalled();

		$on = [
			"1-1",
			"2-1",
			"4-1",
			"6-1",
			"4-2",
			"5-2",
			"1-3",
			"6-3",
			"3-4",
			"1-5",
			"3-5",
			"6-5",
			"1-6",
			"2-6",
			"3-6",
			"4-6",
			"6-6",
		];

		$grid->getLights()->shouldBeCalled()->willReturn($on);

		$realGrid = new AnimatedLightingGrid($on, 6, 6);

		for ($y = 1; $y <= 6; $y++) {
			for ($x = 1; $x <= 6; $x++) {
				if (($x == 1 & $y == 1) || ($x == 6 && $y == 1) || ($x == 1 && $y == 6) || ($x == 6 && $y == 6)) {
					continue;
				}
				$grid->neighbours($x,$y)->shouldBeCalled()->willReturn($realGrid->neighbours($x,$y));
			}
		}

		$grid->horizontalSize()->shouldBeCalled()->willReturn(6);
		$grid->verticalSize()->shouldBeCalled()->willReturn(6);

		$this->nextGrid($grid)->shouldBeAnInstanceOf(BrokenAnimatedLightingGrid::class);
	}
}
