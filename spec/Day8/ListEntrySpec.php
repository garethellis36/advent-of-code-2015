<?php

namespace spec\Day8;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ListEntrySpec extends ObjectBehavior
{
	private $inputEntries;

	public function __construct()
	{
		$realInput = file_get_contents(__DIR__ . "/../../input/Day8/Puzzle1");
		$inputEntries = explode(PHP_EOL, $realInput);

		$this->inputEntries = $inputEntries;
	}

	public function let()
	{
		$this->beConstructedWith($this->inputEntries[1]); // "v\xfb\"lgs\"kvjfywmut\x9cr"
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day8\ListEntry');
    }

	public function it_should_be_able_to_correctly_count_the_number_of_chars_in_string_code()
	{
		$this->countNumberOfCharsInStringCode()->shouldBe(28);
	}

	public function it_should_be_able_to_correctly_count_the_number_of_chars_in_memory()
	{
		$this->beConstructedWith($this->inputEntries[4]); // "d\\gkbqo\\fwukyxab\"u"
		$this->countNumberOfCharsInMemory()->shouldBe(18);
	}

}
