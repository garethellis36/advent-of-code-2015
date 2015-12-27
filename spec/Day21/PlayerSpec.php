<?php

namespace spec\Day21;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day21\Weapon;
use Day21\Armour;
use Day21\Ring;


class PlayerSpec extends ObjectBehavior
{
    public function let(Weapon $weapon, Armour $armour, Ring $ring1, Ring $ring2)
    {
        $this->beConstructedWith($weapon, $armour, $ring1, $ring2, 8);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\Player');
    }

    public function it_should_be_able_to_return_current_hit_points()
    {
        $this->getHitPoints()->shouldBe(8);
    }

    public function it_should_be_able_to_apply_damage_points(Armour $armour, Ring $ring1, Ring $ring2)
    {
        $armour->getArmourPoints()->shouldBeCalled()->willReturn(3);
        $ring1->getArmourPoints()->shouldBeCalled()->willReturn(1);
        $ring2->getArmourPoints()->shouldBeCalled()->willReturn(2);

        $this->dealDamage(9);
        $this->getHitPoints()->shouldBe(5);
    }

    public function it_should_know_its_damage_points(Weapon $weapon, Ring $ring1, Ring $ring2)
    {
        $weapon->getDamagePoints()->shouldBeCalled()->willReturn(5);
        $ring1->getDamagePoints()->shouldBeCalled()->willReturn(1);
        $ring2->getDamagePoints()->shouldBeCalled()->willReturn(2);

        $this->getDamagePoints()->shouldBe(8);
    }
}
