<?php

namespace spec\Day19;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReplacementRunnerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([
            "H" => ["HO","OH",],
            "O" => ["HH",],
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day19\ReplacementRunner');
    }

    public function it_should_be_able_to_generate_an_array_of_possible_molecules()
    {
        $this->possibleReplacements("HOH")->shouldBe([
            "HOOH",
            "HOHO",
            "OHOH",
            "HHHH",
        ]);
    }

    public function it_should_be_able_to_get_the_number_of_bracket_elements_in_a_molecule()
    {
        $this->beConstructedWith([
            "E(F,G)" => "X",
            "B(C,D)" => "X",
            "A(X,X)" => "X"
        ]);
        $this->getNumberOfBracketElements("ARnBRnCYDArYERnFYGArAr")->shouldBe(6);
    }

    public function it_should_be_able_to_get_the_number_of_comma_elements_in_a_molecule()
    {
        $this->beConstructedWith([
            "E(F,G)" => "X",
            "B(C,D)" => "X",
            "A(X,X)" => "X"
        ]);
        $this->getNumberOfCommaElements("ARnBRnCYDArYERnFYGArAr")->shouldBe(3);
    }

    public function it_should_be_able_to_get_the_total_number_of_elements_in_a_molecule()
    {
        $this->beConstructedWith([
            "X" => "something",

        ]);
        $this->getNumberOfElements("ARnBRnCYDArYERnFYGArAr")->shouldBe(16);
    }

    public function it_should_be_able_to_work_out_the_number_of_steps_to_generate_molecule_from_e()
    {
        $this->beConstructedWith([
            "X" => "something",
        ]);
        $this->minimumNumberStepsForBuildingMolecule("ARnBRnCYDArYERnFYGArAr")->shouldBe(3);
    }
}
