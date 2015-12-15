<?php

namespace spec\Day2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day2\DimensionsParser;

class PresentPileSpec extends ObjectBehavior
{
	public function let(DimensionsParser $parser)
	{
		$this->beConstructedWith($parser);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day2\PresentPile');
    }

	public function it_should_have_a_collection_of_presents_on_construction(DimensionsParser $parser)
	{
		$parser->parse()->shouldBeCalled()->willReturn([1,2,3]);
		$this->getPresents()->shouldHaveCount(3);
	}

	public function it_should_be_able_to_calculate_amount_of_wrapping_paper_required(DimensionsParser $parser)
	{
		$present1 = new \Day2\Present(["width" => 5, "length" => 5, "height" => 2]); //90 & 10
		$present2 = new \Day2\Present(["width" => 4, "length" => 6, "height" => 3]); //54 & 12

		$parser->parse()->shouldBeCalled()->willReturn([$present1, $present2]);

		$this->getTotalAmountOfWrappingPaperRequired()->shouldBe(220);
	}
}
