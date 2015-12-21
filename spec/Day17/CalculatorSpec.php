<?php

namespace spec\Day17;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day17\Calculator');
    }

    public function it_should_be_able_to_work_out_the_number_of_combinations_given_a_total_volume_and_list_of_containers()
    {
        $this->combinations(25, [20,15,10,5,5])->shouldBe(4);
    }
}
