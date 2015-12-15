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

	public function it_should_be_able_to_determine_the_presence_of_a_repeated_pair_of_non_overlapping_letters()
	{
		$this->beConstructedWith("qjhvhtzxzqqjkmpb");
		$this->hasRepeatedPairOfNonOverlappingLetters()->shouldBe(true);

		$this->setInput("ejbbblkjijl");
		$this->hasRepeatedPairOfNonOverlappingLetters()->shouldBe(false);

		$this->setInput("ejbbsdkaalkj");
		$this->hasRepeatedPairOfNonOverlappingLetters()->shouldBe(false);
	}

	public function it_should_be_able_to_determine_the_presence_of_a_repeated_letter_with_one_letter_in_between()
	{
		$this->beConstructedWith("xxyxx");
		$this->hasRepeatedLetterWithOneLetterInBetween()->shouldBe(true);

		$this->setINput("lkjoijlk");
		$this->hasRepeatedLetterWithOneLetterInBetween()->shouldBe(false);
	}

	public function it_should_be_able_to_correctly_determine_nice_under_new_rules()
	{
		$this->beConstructedWith("qjhvhtzxzqqjkmpb");
		$this->isNiceAccordingToNewRules()->shouldBe(true);
	}

	public function it_should_be_able_to_correctly_determine_nice_under_new_rules_second_example()
	{
		$this->beConstructedWith("xxyxx");
		$this->isNiceAccordingToNewRules()->shouldBe(true);
	}

	public function it_should_be_able_to_correctly_determine_naughty_under_new_rules_where_no_repeated_letter()
	{
		$this->beConstructedWith("uurcxstgmygtbstg");
		$this->isNiceAccordingToNewRules()->shouldBe(false);
	}

	public function it_should_be_able_to_correctly_determine_naughty_under_new_rules_where_no_repeated_pair()
	{
		$this->beConstructedWith("ieodomkazucvgmuy");
		$this->isNiceAccordingToNewRules()->shouldBe(false);
	}
}
