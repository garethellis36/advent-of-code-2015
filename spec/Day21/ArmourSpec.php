<?php

namespace spec\Day21;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArmourSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\Armour');
    }

    public function it_should_know_its_armour_points()
    {
        $this->getArmourPoints()->shouldBe(5);
    }
}
