<?php

namespace spec\Day17;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day17\EggnogFiller;

class EggnogFillerSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith([20,15,10,5,5]);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType(EggnogFiller::class);
    }

    public function it_should_be_able_to_work_out_the_number_of_combinations_given_a_total_volume_and_list_of_containers()
    {
        $this->fill(25)->shouldHaveCount(4);
    }

	public function it_should_be_able_to_work_out_the_number_of_combinations_which_use_the_minimum_number_of_containers()
	{
		$this->fillMinimumNumberOfContainers(25)->shouldHaveCount(3);
	}
}
