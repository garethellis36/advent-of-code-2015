<?php

namespace spec\Day11\Password;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day11\Password\Validator');
    }

	public function it_should_be_able_to_detect_presence_of_straight_of_characters()
	{
		$this->hasStraightOfCharacters("ghjaabcc")->shouldBe(true);
	}

	public function it_should_be_able_to_detect_absence_of_straight_of_characters()
	{
		$this->hasStraightOfCharacters("abbceffg")->shouldBe(false);
	}

	public function it_should_be_able_to_detect_presence_of_invalid_characters()
	{
		$this->hasInvalidCharacters("abcdefgi")->shouldBe(true);
	}

	public function it_should_be_able_to_detect_absence_of_invalid_characters()
	{
		$this->hasInvalidCharacters("abcdefgg")->shouldBe(false);
	}

	public function it_should_be_able_to_count_number_of_distinct_sets_of_non_overlapping_pairs_of_characters()
	{
		$this->numberDistinctNonOverlappingPairsOfCharacters("aabbcdef")->shouldBe(2);
	}

	public function it_should_be_able_to_count_number_of_sets_of_non_overlapping_pairs_of_characters_accounting_for_repeated_pairs()
	{
		$this->numberDistinctNonOverlappingPairsOfCharacters("aacdaa")->shouldBe(1);
	}

	public function it_should_be_able_to_detect_a_valid_password_under_puzzle1_rules()
	{
		$this->isValidUnderPuzzle1Rules("ghjaabcc")->shouldBe(true);
	}

	public function it_should_be_able_to_detect_an_invalid_password_under_puzzle1_rules()
	{
		$this->isValidUnderPuzzle1Rules("abbceffg")->shouldBe(false);
	}
}
