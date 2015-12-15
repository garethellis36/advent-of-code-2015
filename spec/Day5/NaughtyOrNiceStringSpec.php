<?php

namespace spec\Day5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NaughtyOrNiceStringSpec extends ObjectBehavior
{
	public function let()
	{
		$this->beConstructedWith("");
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day5\NaughtyOrNiceString');
    }

	public function it_should_be_able_to_calculate_number_of_vowels()
	{
		$this->beConstructedWith("idsejkobnmh");
		$this->getNumberOfVowels()->shouldBe(3);

		$this->setInput("fghty");
		$this->getNumberOfVowels()->shouldBe(0);
	}

	public function it_should_be_able_to_detect_presence_of_repeated_letter()
	{
		$this->beConstructedWith("jkhkhkjasnduhqwdaajkoaijsd");
		$this->hasRepeatedLetters()->shouldBe(true);

		$this->setInput("jkhkhkjasnduhqwdajkoaijsd");
		$this->hasRepeatedLetters()->shouldBe(false);
	}

	public function it_should_be_able_to_detect_presence_of_forbidden_character_sequences()
	{
		$this->beConstructedWith("assdqwdabfgsdf");
		$this->hasForbiddenCharacterSequence()->shouldBe(true);

		$this->setInput("acefg");
		$this->hasForbiddenCharacterSequence()->shouldBe(false);
	}

	public function it_should_be_able_to_determine_naughty_or_nice()
	{
		$this->beConstructedWith("ksdisdelkkjo");
		$this->isNice()->shouldBe(true);

		$this->setInput("pqaaoiue");
		$this->isNice()->shouldBe(false);
	}
}
