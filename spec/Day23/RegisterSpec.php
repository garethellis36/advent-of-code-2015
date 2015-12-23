<?php

namespace spec\Day23;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day23\Register');
    }

	public function it_should_have_value_zero_at_startup()
	{
		$this->getValue()->shouldBe(0);
	}

	public function it_should_be_able_to_set_its_value()
	{
		$this->setValue(2);
		$this->getValue()->shouldBe(2);
	}

	public function it_should_have_an_optional_configured_value_at_startup()
	{
		$this->beConstructedWith(1);
		$this->getValue()->shouldBe(1);
	}
}
