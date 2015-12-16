<?php

namespace spec\Day6;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LightingGridSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day6\ControllableLightingGrid');
    }

	public function it_should_be_able_to_turn_on_a_light()
	{
		$this->turnOn(5,5);
		$this->isLightOnAt(5,5)->shouldBe(true);
	}

	public function it_should_be_able_to_turn_off_a_light()
	{
		$this->turnOn(5,5);
		$this->turnOff(5,5);
		$this->isLightOnAt(5,5)->shouldBe(false);
	}

	public function it_should_be_able_to_toggle_a_light_from_on_state()
	{
		$this->turnOn(5,5);
		$this->toggle(5,5);
		$this->isLightOnAt(5,5)->shouldBe(false);
	}

	public function it_should_be_able_to_toggle_a_light_from_off_state()
	{
		$this->toggle(5,5);
		$this->isLightOnAt(5,5)->shouldBe(true);
	}

	public function it_should_be_able_to_count_the_number_of_turned_on_lights()
	{
		$this->turnOn(1,1);
		$this->turnOn(2,5);
		$this->turnOn(400,200);
		$this->getNumberOfTurnOnLights()->shouldBe(3);
	}
}
