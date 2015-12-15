<?php

namespace spec\Day2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DimensionsParserSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith("10x11x13" . PHP_EOL . "4x2x14" . PHP_EOL . "3x9x17");
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day2\DimensionsParser');
    }

	public function it_should_be_able_to_parse_raw_input()
	{
		$this->parse()->shouldHaveCount(3);
	}
}
