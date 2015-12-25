<?php

namespace spec\Day19;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReplacementRunnerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([
            "H" => ["HO","OH",],
            "O" => ["HH",],
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day19\ReplacementRunner');
    }

    public function it_should_be_able_to_generate_an_array_of_possible_molecules()
    {
        $this->possibleReplacements("HOH")->shouldBe([
            "HOOH",
            "HOHO",
            "OHOH",
            "HHHH",
        ]);
    }
}