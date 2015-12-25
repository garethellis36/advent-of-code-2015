<?php

namespace spec\Day19;

use Day19\ReplacementsCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day19\InstructionsParser');
    }

    public function it_should_parse_instructions_and_return_a_replacements_collection_object()
    {
        $input = "H => HO".PHP_EOL."H => OH".PHP_EOL."O => HH".PHP_EOL.PHP_EOL."lorem ipsum";
        $this->parse($input)['replacements']->shouldBe([
                "H" => ["HO","OH",],
                "O" => ["HH",],
        ]);
    }

    public function it_should_parse_instructions_and_return_a_molecule_string()
    {
        $input = "H => HO" . PHP_EOL . "H => OH" . PHP_EOL . "O => HH" . PHP_EOL . PHP_EOL . "lorem ipsum";
        $this->parse($input)['molecule']->shouldBe("lorem ipsum");
    }
}
