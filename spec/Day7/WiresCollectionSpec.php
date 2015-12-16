<?php

namespace spec\Day7;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WiresCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day7\WiresCollection');
    }

	public function it_should_be_able_to_set_and_get_the_value_of_a_given_wire()
	{
		$this["x"] = 5;
		$this["x"]->shouldBe(5);
	}

	public function it_should_be_able_to_unset_the_value_of_a_given_wire()
	{
		$this["x"] = 3;
		unset($this["x"]);
		$this["x"]->shouldBeNull();
	}

	public function it_should_be_able_to_reset_all()
	{
		$this["x"] = 5;
		$this["y"] = 6;
		$this->resetAll();
		$this["x"]->shouldBe(null);
		$this["y"]->shouldBe(null);
	}
}
