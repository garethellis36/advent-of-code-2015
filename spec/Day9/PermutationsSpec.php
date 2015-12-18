<?php

namespace spec\Day9;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PermutationsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day9\Permutations');
    }

	public function it_should_be_able_to_calculate_permutations_from_an_array()
	{
		$perms = $this->calculate(["a","b","c"]);
		$perms->shouldContain(["b","a","c"]);
		$perms->shouldContain(["c","b","a"]);
		$perms->shouldHaveCount(6);
	}
}
