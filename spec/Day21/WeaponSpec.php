<?php

namespace spec\Day21;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WeaponSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\Weapon');
    }

    public function it_should_know_its_damage_points()
    {
        $this->getDamagePoints()->shouldBe(5);
    }
}
