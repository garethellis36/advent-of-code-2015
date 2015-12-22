<?php

namespace spec\Day18;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnimatedLightingGridSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith([
			"1-1"
		]);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day18\AnimatedLightingGrid');
    }

	public function it_should_be_able_to_mass_assign_light_status()
	{
		$this->isOnAt(1,1)->shouldBe(true);
		$this->lights([]);
		$this->isOnAt(1,1)->shouldBe(false);
	}

	public function it_should_know_how_many_lights_are_on()
	{
		$this->numberTurnedOn()->shouldBe(1);
	}

	public function it_should_have_lights_with_an_initial_state_defined_at_startup()
	{
		$this->isOnAt(1,1)->shouldBe(true);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_the_top_left_light()
	{
		$this->neighbours(1,1)->shouldBe([
			[2,1],
			[1,2],
			[2,2]
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_middle_of_the_top_row()
	{
		$this->neighbours(50,1)->shouldBe([
			[49,1],
			[51,1],
			[49,2],
			[50,2],
			[51,2],
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_the_top_right_light()
	{
		$this->neighbours(100,1)->shouldBe([
			[99,1],
			[99,2],
			[100,2]
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_middle_of_the_left_edge() {
		$this->neighbours(1,50)->shouldBe([
			[1,49],
			[2,49],
			[2,50],
			[1,51],
			[2,51],
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_middle_of_the_grid() {
		$this->neighbours(50,50)->shouldBe([
			[49,49],
			[50,49],
			[51,49],
			[49,50],
			[51,50],
			[49,51],
			[50,51],
			[51,51],
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_middle_of_the_right_edge() {
		$this->neighbours(100,50)->shouldBe([
			[99,49],
			[100,49],
			[99,50],
			[99,51],
			[100,51],
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_bottom_left_corner() {
		$this->neighbours(1,100)->shouldBe([
			[1,99],
			[2,99],
			[2,100]
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_middle_of_the_bottom_row() {
		$this->neighbours(50,100)->shouldBe([
			[49,99],
			[50,99],
			[51,99],
			[49,100],
			[51,100],
		]);
	}

	public function it_should_be_able_to_identify_the_neighbours_of_a_light_in_the_bottom_right_corner() {
		$this->neighbours(100,100)->shouldBe([
			[99,99],
			[100,99],
			[99,100]
		]);
	}

	public function it_should_be_able_to_report_its_size()
	{
		$this->horizontalSize()->shouldBe(100);
		$this->verticalSize()->shouldBe(100);
	}
}
