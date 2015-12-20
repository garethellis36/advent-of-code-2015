<?php

namespace spec\Day13;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith("Alice", [
            "Bob" => 54,
            "Carol" => -79,
            "Alice" => -2
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day13\Person');
    }

    //feels wrong using "it"!!
    public function it_should_know_its_own_name()
    {
        $this->name()->shouldBe("Alice");
    }

    public function it_should_know_the_happiness_change_caused_by_sitting_next_to_a_certain_person()
    {
        $this->happinessChange("Bob")->shouldBe(54);
    }
}
