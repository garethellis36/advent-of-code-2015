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
		$this->beConstructedWith("x");
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day8\ListEntry');
    }

	public function it_should_be_able_to_correctly_count_the_number_of_chars_in_string_code()
	{
		$this->beConstructedWith($this->inputEntries[1]); // "v\xfb\"lgs\"kvjfywmut\x9cr"
		$this->countNumberOfCharsInStringCode()->shouldBe(28);
	}

	public function it_should_be_able_to_correctly_count_the_number_of_chars_in_memory()
	{
		$this->beConstructedWith($this->inputEntries[4]); // "d\\gkbqo\\fwukyxab\"u"
		$this->countNumberOfCharsInMemory()->shouldBe(18);
	}

	public function it_should_still_be_able_to_correctly_count_the_number_of_chars_in_string_code()
	{
		$realInput = file_get_contents(__DIR__ . "/../../input/Day8/Puzzle2Sample");
		$this->beConstructedWith($realInput);		// "aaa\"aaa"
		$this->countNumberOfCharsInStringCode()->shouldBe(10);
	}

	public function it_should_be_able_to_correctly_count_the_number_of_characters_in_string_code_when_escaped()
	{
		$realInput = file_get_contents(__DIR__ . "/../../input/Day8/Puzzle2Sample");
		$this->beConstructedWith($realInput);		// "aaa\"aaa"
		$this->countNumberOfCharsInStringCodeWhenEscaped()->shouldBe(16);
	}
}
