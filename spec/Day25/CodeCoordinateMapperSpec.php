<?php

namespace spec\Day25;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CodeCoordinateMapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day25\CodeCoordinateMapper');
    }

    public function it_should_be_able_to_translate_a_code_location_to_a_sequence_n()
    {
        $this->getSequenceNumberFromCodeCoordinates(4,2)->shouldBe(12);
    }
}
