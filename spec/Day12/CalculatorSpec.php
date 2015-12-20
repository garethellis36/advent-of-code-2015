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

    public function it_should_be_able_to_ignore_objects_which_have_properties_with_the_value_red()
    {
        $this->sumIgnoringRed('{"d":"red","e":[1,2,3,4],"f":5}')->shouldBe(0);
    }

    public function it_should_not_ignore_red_in_arrays()
    {
        $this->sumIgnoringRed('[1,"red",5]')->shouldBe(6);
    }

    public function it_should_be_able_to_ignore_red_in_child_objects()
    {
        $this->sumIgnoringRed('[1,{"c":"red","b":2},3]')->shouldBe(4);
    }
}
