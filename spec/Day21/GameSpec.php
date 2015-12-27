<?php

namespace spec\Day21;

use Day21\TurnTaker;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day21\Player;
use Day21\Boss;

class GameSpec extends ObjectBehavior
{
    public function let(TurnTaker $turn)
    {
        $this->beConstructedWith($turn);

    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day21\Game');
    }

    public function it_should_be_able_to_execute_an_entire_game(TurnTaker $turn, Player $player, Boss $boss)
    {
        $turn->take($player, $boss)->shouldBeCalled()->willReturn($boss);
        $boss->getHitPoints()->shouldBeCalled()->willReturn(2);

        $turn->take($boss, $player)->shouldBeCalled()->willReturn($player);
        $player->getHitPoints()->shouldBeCalled()->willReturn(1);

        $turn->take($player, $boss)->shouldBeCalled()->willReturn($boss);
        $boss->getHitPoints()->shouldBeCalled()->willReturn(0);

        $this->play($player, $boss)->shouldBe($player);
    }
}
