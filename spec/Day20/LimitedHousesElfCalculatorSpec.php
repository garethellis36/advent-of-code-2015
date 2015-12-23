<?php

namespace spec\Day20;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LimitedHousesElfCalculatorSpec extends ObjectBehavior
{
	use \GeneratorMatcherTrait;

    function it_is_initializable()
    {
        $this->shouldHaveType('Day20\LimitedHousesElfCalculator');
    }

	public function it_should_get_all_factors_of_a_number()
	{
		$this->get(8)->shouldGenerate([
			[1,8],
			[8,1],
			[2,4],
			[4,2],
		]);
	}
}
