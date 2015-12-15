<?php

namespace spec\Day2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PresentSideSpec extends ObjectBehavior
{
	private $width;
	private $length;

	public function let() {
		$this->width = "10";
		$this->length = "20";

		$this->beConstructedWith($this->width, $this->length);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day2\PresentSide');
    }

	public function it_should_have_dimensions_set_on_creation()
	{
		$this->getWidth()->shouldBe($this->width);
		$this->getLength()->shouldBe($this->length);
	}

	public function it_should_be_able_to_calculate_total_area()
	{
		$this->getSurfaceArea()->shouldBe(200);
	}
}
