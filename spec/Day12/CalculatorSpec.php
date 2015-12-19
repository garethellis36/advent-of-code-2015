<?php

namespace spec\Day12;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day12\Calculator');
    }

    public function it_should_be_able_to_sum_the_numbers_in_an_array()
    {
        $this->sum('[1,2,3]')->shouldBe(6);
    }

    public function it_should_be_able_to_sum_the_numbers_in_an_object()
    {
        $this->sum('{"a":2,"b":4}')->shouldBe(6);
    }

    public function it_should_be_able_to_sum_the_numbers_in_a_recursive_array()
    {
        $this->sum('[[[3]]]')->shouldBe(3);
    }

    public function it_should_be_able_to_sum_the_numbers_in_a_recursive_object()
    {
        $this->sum('{"a":{"b":4},"c":-1}')->shouldBe(3);
    }
}
