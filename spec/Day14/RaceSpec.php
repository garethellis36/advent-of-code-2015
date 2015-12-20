<?php

namespace spec\Day14;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day14\Reindeer;

class RaceSpec extends ObjectBehavior
{
    public function let(Reindeer $comet, Reindeer $dancer)
    {
        $this->beConstructedWith([$comet, $dancer]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day14\Race');
    }

    public function it_should_be_able_to_calculate_the_distance_travelled_of_the_winner_after_a_given_duration(Reindeer $comet, Reindeer $dancer)
    {
        $comet->distanceAfter(1000)->shouldBeCalled()->willReturn(1120);
        $dancer->distanceAfter(1000)->shouldBeCalled()->willReturn(1056);

        $winner = $this->winnerAfter(1000);
        $winner->shouldBeAnInstanceOf(Reindeer::class);
        $winner->distanceAfter(1000)->shouldBe(1120);
    }

    public function it_should_know_the_points_winner_after_a_given_duration(Reindeer $comet, Reindeer $dancer)
    {
        $comet->distanceAfter(1)->shouldBeCalled()->willReturn(5);
        $dancer->distanceAfter(1)->shouldBeCalled()->willReturn(1);
        $comet->distanceAfter(2)->shouldBeCalled()->willReturn(5);
        $dancer->distanceAfter(2)->shouldBeCalled()->willReturn(7);
        $comet->distanceAfter(3)->shouldBeCalled()->willReturn(9);
        $dancer->distanceAfter(3)->shouldBeCalled()->willReturn(8);
        $comet->distanceAfter(4)->shouldBeCalled()->willReturn(11);
        $dancer->distanceAfter(4)->shouldBeCalled()->willReturn(7);
        $comet->distanceAfter(5)->shouldBeCalled()->willReturn(12);
        $dancer->distanceAfter(5)->shouldBeCalled()->willReturn(19);

        $comet->awardPoint()->shouldBeCalled();
        $dancer->awardPoint()->shouldBeCalled();

        $comet->points()->shouldBeCalled()->willReturn(3);
        $dancer->points()->shouldBeCalled()->willReturn(2);

        $winner = $this->pointsWinnerAfter(5);
        $winner->shouldBeAnInstanceOf(Reindeer::class);
        $winner->points()->shouldBe(3);

    }
}
