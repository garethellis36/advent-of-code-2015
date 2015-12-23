<?php

namespace spec\Day20;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElfCalculatorSpec extends ObjectBehavior
{
	use \GeneratorMatcherTrait;

    function it_is_initializable()
    {
        $this->shouldHaveType('Day20\ElfCalculator');
    }

	public function it_should_get_all_factors_of_a_number()
	{
		$this->get(8)->shouldGenerate([1,8,2,4]);
	}
}
