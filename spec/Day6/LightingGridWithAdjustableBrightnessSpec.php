<?php

namespace spec\Day6;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day6\ControllableLightingGrid;

class LightingGridWithAdjustableBrightnessSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day6\ControllableLightingGrid');
    }

	public function it_should_be_able_to_report_cumulative_brightness_of_all_lights_as_zero_at_start()
	{
		$this->getCumulativeBrightness()->shouldBe(0);
	}

	public function it_should_increase_brightness_of_a_light_when_turned_on()
	{
		$this->turnOn(3,3);
		$this->isLightOnAt(3,3)->shouldBe(1);
		$this->turnOn(3,3);
		$this->isLightOnAt(3,3)->shouldBe(2);
	}

	public function it_should_decrease_brightness_of_a_light_when_turned_off()
	{
		$this->turnOn(3,3);
		$this->turnOff(3,3);
		$this->isLightOnat(3,3)->shouldBe(false);
	}

	public function it_should_not_change_status_of_a_light_when_an_already_off_light_is_turned_off()
	{
		$status = $this->isLightOnAt(3,3);
		$this->turnOff(3,3);
		$this->isLightOnAt(3,3)->shouldBe($status);
	}

	public function it_should_correctly_decrease_brightness_of_a_turned_on_light()
	{
		$this->turnOn(3,3);
		$this->turnOn(3,3);
		$this->turnOff(3,3);
		$this->isLightOnAt(3,3)->shouldBe(1);
	}

	public function it_should_increase_brightness_by_two_when_toggled()
	{
		$this->toggle(3,3);
		$this->isLightOnAt(3,3)->shouldBe(2);
	}

	public function it_should_correctly_report_cumultative_brightness_of_all_lights()
	{
		$this->turnOn(3,3);
		$this->turnOn(3,3);
		$this->turnOn(4,5);
		$this->toggle(4,5);
		$this->turnOn(8,9);
		$this->turnOn(8,9);
		$this->turnOn(8,9);
		$this->turnOn(8,9);
		$this->turnOff(8,9);
		$this->getCumulativeBrightness()->shouldBe(8);
	}
}
