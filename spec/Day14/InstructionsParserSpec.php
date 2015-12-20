<?php

namespace spec\Day14;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day14\Reindeer;

class InstructionsParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day14\InstructionsParser');
    }

    public function it_should_return_an_array_of_reindeer_objects_with_correct_flight_and_name_properties()
    {
        $input = "Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.\nDancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.";

        $herd = $this->parse($input);
        $herd[0]->shouldBeAnInstanceOf(Reindeer::class);
        $herd[0]->speed()->shouldBe(14);
        $herd[0]->name()->shouldBe("Comet");
    }
}
