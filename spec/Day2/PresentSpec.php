<?php

namespace spec\Day2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PresentSpec extends ObjectBehavior
{
	private $dimensions = [];

	public function let() {
		$this->dimensions = [
			"width" => 25,
			"height" => 40,
			"length" => 12
		];
		$this->beConstructedWith($this->dimensions);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day2\Present');
    }

	public function it_should_have_all_dimensions_on_creation()
	{
		$this->getLength()->shouldBe($this->dimensions["length"]);
		$this->getWidth()->shouldBe($this->dimensions["width"]);
		$this->getHeight()->shouldBe($this->dimensions["height"]);
	}

	public function it_should_have_collection_of_sides()
	{
		$this->getSides()->shouldHaveCount(6);

		$this->getSide(1)->shouldReturnAnInstanceOf("Day2\\PresentSide");
	}

	public function it_should_be_able_to_calculate_total_surface_area()
	{
		$this->getTotalSurfaceArea()->shouldBe(3560);
	}

	public function it_should_be_able_to_calculate_area_of_smallest_side()
	{
		$this->getAreaOfSmallestSide()->shouldBe(300);
	}

	public function it_should_be_able_to_calculate_the_total_amount_of_wrapping_paper_required()
	{
		$this->getTotalAmountOfWrappingPaperRequired()->shouldBe(3860);
	}
}
