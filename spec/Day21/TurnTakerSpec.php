<?php

namespace spec\Day21;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day21\PlayerInterface;

class TurnTakerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\TurnTaker');
    }

    public function it_should_be_able_to_take_a_turn(PlayerInterface $attacker, PlayerInterface $defender)
    {
        $attacker->getDamagePoints()->shouldBeCalled()->willReturn(3);
        $defender->dealDamage(3)->shouldBeCalled();

        $this->take($attacker, $defender)->shouldReturn($defender);
    }
}
