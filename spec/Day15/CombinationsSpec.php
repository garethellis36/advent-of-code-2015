<?php

namespace spec\Day15;

use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombinationsSpec extends ObjectBehavior
{
	use \GeneratorMatcherTrait;

    function it_is_initializable()
    {
        $this->shouldHaveType('Day15\Combinations');
    }

	public function it_should_generate_all_combinations_of_four_numbers_that_add_up_to_total_y()
	{
		$this->generate(2)->shouldGenerate([
			[0,0,0,2],
			[0,0,1,1],
			[0,0,2,0],
			[0,1,0,1],
			[0,1,1,0],
			[0,2,0,0],
			[1,0,0,1],
			[1,0,1,0],
			[1,1,0,0],
			[2,0,0,0],
		]);
	}

}
