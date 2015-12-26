<?php

namespace spec\Day24;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SledLoaderSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([
            1,2,3,4,5,7,8,9,10,11
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day24\SledLoader');
    }

    public function it_should_be_able_to_calculate_combinations_for_loading_one_third_of_weight_into_front_compartment()
    {
        $this->loadFront()->shouldBeArray();
    }

    public function it_should_be_able_to_get_the_optimal_amount_of_weights_in_front_section()
    {
        $this->optimalFrontLoading()->shouldBe([9,11]);
    }
}
