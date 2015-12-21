<?php

namespace spec\Day16;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SueSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith(1, [
			"cars" => 9,
			"akitas" => 3,
			"goldfish" => 0,
			"cats" => 4
		]);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day16\Sue');
    }

	public function it_should_know_its_number()
	{
		$this->number()->shouldBe(1);
	}

	public function it_should_know_if_a_property_does_equal_a_value()
	{
		$this->is("cars")->shouldBe(9);
	}

	public function it_should_know_if_a_property_could_equal_a_given_value_when_it_is_set()
	{
		$this->couldBe("cars", 9)->shouldBe(true);
	}

	public function it_should_know_if_a_property_could_equal_a_given_value_when_it_is_not_set()
	{
		$this->couldBe("trees", 9)->shouldBe(true);
	}

	public function it_should_when_a_property_could_not_equal_a_given_value()
	{
		$this->couldBe("cars", 8)->shouldBe(false);
	}

	/**
	 * In particular, the cats and trees readings indicates that there are greater than that many (due to the
	 * unpredictable nuclear decay of cat dander and tree pollen), while the pomeranians and goldfish readings indicate
	 * that there are fewer than that many (due to the modial interaction of magnetoreluctance).
	 */
	public function it_should_know_if_trees_and_cats_readings_could_be_true()
	{
		$this->couldBe("cats", 2, false)->shouldBe(true);
	}

	public function it_should_know_if_pomeranians_and_goldfish_readings_could_be_true()
	{
		$this->couldBe("goldfish", 2, false)->shouldBe(true);
	}
}
