<?php

namespace spec\Day25;

use Day25\CodeCoordinateMapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CodeGeneratorSpec extends ObjectBehavior
{
    public function let(CodeCoordinateMapper $mapper)
    {
        $this->beConstructedWith($mapper, 20151125);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day25\CodeGenerator');
    }

    public function it_should_be_able_to_generate_the_code_at_a_given_coordinate(CodeCoordinateMapper $mapper)
    {
        $mapper->getSequenceNumberFromCodeCoordinates(4,2)->willReturn(12);
        $this->codeAt(4,2)->shouldBe(32451966);
    }
}
