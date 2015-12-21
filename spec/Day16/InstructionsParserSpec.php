<?php

namespace spec\Day16;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Day16\Sue;

class InstructionsParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day16\InstructionsParser');
    }

	public function it_should_create_a_sue_object_for_each_instruction()
	{
		$this->parse("Sue 1: cars: 9, akitas: 3, goldfish: 0")->shouldReturnAnInstanceOf(Sue::class);
	}

	public function it_should_create_a_sue_object_with_the_correct_properties()
	{
		/**
		 * @var $sue Sue
		 */
		$sue = $this->parse("Sue 1: cars: 9, akitas: 3, goldfish: 0");
		$sue->is("akitas")->shouldBe(3);
	}
}
