<?php

namespace spec\Day21;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BossSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(12,7,2);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\Boss');
    }

    public function it_should_be_able_to_return_current_hit_points()
    {
        $this->getHitPoints()->shouldBe(12);
    }

    public function it_should_be_able_to_apply_damage_points()
    {
        $this->dealDamage(5);
        $this->getHitPoints()->shouldBe(9);
    }

    public function it_should_know_its_damage_points()
    {
        $this->getDamagePoints()->shouldBe(7);
    }
}
