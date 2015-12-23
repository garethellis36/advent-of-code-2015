<?php

namespace spec\Day18;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day18\AnimatedLightingGrid;

class BrokenAnimatedLightingGridSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(["2-2"], 6, 6);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day18\BrokenAnimatedLightingGrid');
    }

    public function it_should_be_an_instance_of_animated_lighting_grid()
    {
        $this->shouldHaveType(AnimatedLightingGrid::class);
    }

    public function it_should_have_lights_in_the_corners_on()
    {
        $this->isOnAt(6,6)->shouldBe(true);
    }
}
