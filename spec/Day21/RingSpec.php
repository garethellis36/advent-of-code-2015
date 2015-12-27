<?php

namespace spec\Day21;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RingSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(9, 5,3);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\Ring');
    }

    public function it_should_know_its_cost()
    {
        $this->getCost()->shouldBe(9);
    }

    public function it_should_know_its_damage_points()
    {
        $this->getDamagePoints()->shouldBe(5);
    }

    public function it_should_know_its_armour_points()
    {
        $this->getArmourPoints()->shouldBe(3);
    }
}
