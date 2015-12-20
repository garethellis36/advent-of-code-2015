<?php

namespace spec\Day13;

use Day13\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TableSpec extends ObjectBehavior
{
    public function let(Person $david, Person $alice, Person $bob, Person $carol)
    {
        $this->beConstructedWith([$alice, $david, $bob, $carol]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day13\Table');
    }

    public function it_should_be_able_to_report_the_happiness_changes_from_the_table_setting(Person $david, Person $alice, Person $bob, Person $carol)
    {
        $carol->happinessChange("Alice")->shouldBeCalled()->willReturn(-62);
        $alice->happinessChange("Carol")->shouldBeCalled()->willReturn(-79);

        $alice->happinessChange("David")->shouldBeCalled()->willReturn(-2);
        $david->happinessChange("Alice")->shouldBeCalled()->willReturn(64);

        $david->happinessChange("Bob")->shouldBeCalled()->willReturn(-7);
        $bob->happinessChange("David")->shouldBeCalled()->willReturn(-63);

        $bob->happinessChange("Carol")->shouldBeCalled()->willReturn(-7);
        $carol->happinessChange("Bob")->shouldBeCalled()->willReturn(60);

        $david->name()->shouldBeCalled()->willReturn("David");
        $alice->name()->shouldBeCalled()->willReturn("Alice");
        $bob->name()->shouldBeCalled()->willReturn("Bob");
        $carol->name()->shouldBeCalled()->willReturn("Carol");

        $this->happinessChange()->shouldBe(-96);
    }
}
