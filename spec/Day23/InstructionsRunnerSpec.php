<?php

namespace spec\Day23;

use Day23\InstructionsList;
use Day23\Register;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionsRunnerSpec extends ObjectBehavior
{
	public function let(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$this->beConstructedWith($instructionsList, $a, $b);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Day23\InstructionsRunner');
    }

	public function it_should_have_a_current_instruction_number_of_zero_at_start()
	{
		$this->currentInstructionNumber()->shouldBe(0);
	}

	public function it_should_be_able_to_execute_an_increment_instruction_and_set_the_next_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("inc a");
		$a->getValue()->shouldBeCalled()->willReturn(2);
		$a->setValue(3)->shouldBeCalled();
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(1);
	}

	public function it_should_be_able_to_execute_a_halve_instruction_and_set_the_next_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("hlf a");
		$a->getValue()->shouldBeCalled()->willReturn(2);
		$a->setValue(1)->shouldBeCalled();
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(1);
	}

	public function it_should_be_able_to_execute_a_triple_instruction_and_set_the_next_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("tpl a");
		$a->getValue()->shouldBeCalled()->willReturn(2);
		$a->setValue(6)->shouldBeCalled();
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(1);
	}

	public function it_should_be_able_to_execute_a_jump_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("jmp +5");
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(5);
	}

	public function it_should_be_able_to_execute_a_negative_jump_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("jmp -1");
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(-1);
	}

	public function it_should_be_able_to_execute_a_jump_if_even_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("jie a, +2");
		$a->getValue()->shouldBeCalled()->willreturn(4);
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(2);
	}

	public function it_should_be_able_to_execute_a_jump_if_one_instruction(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$instructionsList->offsetGet(0)->shouldBeCalled()->willReturn("jio a, +2");
		$a->getValue()->shouldBeCalled()->willreturn(1);
		$this->execute();
		$this->currentInstructionNumber()->shouldBe(2);
	}
}
