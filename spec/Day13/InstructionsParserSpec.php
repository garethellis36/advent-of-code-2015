<?php

namespace spec\Day13;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day13\Person;

class InstructionsParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day13\InstructionsParser');
    }

    public function it_should_create_an_array_of_person_objects_from_raw_instructions(Person $alice, Person $bob, Person $carol, Person $david)
    {
        $input = "Alice would gain 54 happiness units by sitting next to Bob.
                    Alice would lose 79 happiness units by sitting next to Carol.
                    Alice would lose 2 happiness units by sitting next to David.
                    Bob would gain 83 happiness units by sitting next to Alice.
                    Bob would lose 7 happiness units by sitting next to Carol.
                    Bob would lose 63 happiness units by sitting next to David.
                    Carol would lose 62 happiness units by sitting next to Alice.
                    Carol would gain 60 happiness units by sitting next to Bob.
                    Carol would gain 55 happiness units by sitting next to David.
                    David would gain 46 happiness units by sitting next to Alice.
                    David would lose 7 happiness units by sitting next to Bob.
                    David would gain 41 happiness units by sitting next to Carol.
                    ";

        $people = $this->parse($input);
        $people[0]->shouldBeAnInstanceOf("Day13\\Person");
        $people[0]->name()->shouldBe("Alice");
        $people[0]->happinessChange("Bob")->shouldBe(54);
    }
}
