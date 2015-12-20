<?php

namespace spec\Day13;

use Day9\Permutations;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day13\Person;
use Symfony\Component\Console\Helper\Table;

class SeatingPlanCreatorSpec extends ObjectBehavior
{
    public function let(Permutations $permutations)
    {
        $this->beConstructedWith($permutations);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day13\SeatingPlanCreator');
    }

    public function it_should_be_able_to_report_the_highest_possible_happiness_change(Permutations $permutations, Person $david, Person $alice, Person $bob, Person $carol)
    {
        $realPerms = new Permutations();

        $permutations->calculate([0,1,2,3])->shouldBeCalled()->willReturn($realPerms->calculate([0,1,2,3]));

        $david->happinessChange("Alice")->shouldBeCalled()->willReturn(46);
        $david->happinessChange("Carol")->shouldBeCalled()->willReturn(41);
        $david->happinessChange("Bob")->shouldBeCalled()->willReturn(-7);

        $alice->happinessChange("David")->shouldBeCalled()->willReturn(-2);
        $alice->happinessChange("Bob")->shouldBeCalled()->willReturn(54);
        $alice->happinessChange("Carol")->shouldBeCalled()->willReturn(-79);

        $bob->happinessChange("Alice")->shouldBeCalled()->willReturn(83);
        $bob->happinessChange("Carol")->shouldBeCalled()->willReturn(-7);
        $bob->happinessChange("David")->shouldBeCalled()->willReturn(-63);

        $carol->happinessChange("Bob")->shouldBeCalled()->willReturn(60);
        $carol->happinessChange("David")->shouldBeCalled()->willReturn(55);
        $carol->happinessChange("Alice")->shouldBeCalled()->willReturn(-62);


        $david->name()->shouldBeCalled()->willReturn("David");
        $alice->name()->shouldBeCalled()->willReturn("Alice");
        $bob->name()->shouldBeCalled()->willReturn("Bob");
        $carol->name()->shouldBeCalled()->willReturn("Carol");

        $this->highestHappinessChange([$david, $alice, $bob, $carol])->happinessChange()->shouldBe(330);
    }
}
