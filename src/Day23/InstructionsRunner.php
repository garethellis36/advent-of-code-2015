<?php

namespace Day23;

class InstructionsRunner
{
	/**
	 * @var InstructionsList
	 */
	private $instructionsList;
	/**
	 * @var Register
	 */
	private $a;
	/**
	 * @var Register
	 */
	private $b;

	private $currentInstruction = 0;

	public function __construct(InstructionsList $instructionsList, Register $a, Register $b)
	{
		$this->instructionsList = $instructionsList;
		$this->a = $a;
		$this->b = $b;
	}

    public function execute()
    {
		$instruction = $this->instructionsList[$this->currentInstruction];

        $type = substr($instruction, 0, 3);

		$register = $this->getRegister($instruction);

		switch ($type) {

			case "inc":
				$register->setValue($register->getValue() + 1);
				$this->currentInstruction++;
				break;

			case "hlf":
				$register->setValue($register->getValue() / 2);
				$this->currentInstruction++;
				break;

			case "tpl":
				$register->setValue($register->getValue() * 3);
				$this->currentInstruction++;
				break;

			case "jmp":
			case "jio":
			case "jie":
				$this->executeJump($type, $instruction);
				break;

		}
    }

    public function currentInstructionNumber()
    {
        return $this->currentInstruction;
    }

	private function executeJump($type, $instruction)
	{
		$offset = $this->getOffset($instruction);

		switch ($type) {
			case "jmp":
				$this->currentInstruction += (int)$offset;
				break;

			case "jie":
				$register = $this->getRegister($instruction);
				$value = $register->getValue();
				if ($this->isEven($value)) {
					$this->currentInstruction += (int)$offset;
				} else {
					$this->currentInstruction++;
				}
				break;

			case "jio":
				$register = $this->getRegister($instruction);
				$value = $register->getValue();
				if ($value === 1) {
					$this->currentInstruction += (int)$offset;
				} else {
					$this->currentInstruction++;
				}
				break;
		}
	}

	/**
	 * @param $instruction
	 * @return mixed
	 */
	private function getOffset($instruction)
	{
		$parts = explode(" ", $instruction);
		$offset = array_pop($parts);
		return $offset;
	}

	/**
	 * @param $instruction
	 * @return bool|Register|null
	 */
	private function getRegister($instruction)
	{
		$register = null;
		if (substr($instruction, 4, 1) == "a") {
			$register = $this->a;
			return $register;
		} elseif ($register = (substr($instruction, 4, 1)) == "b") {
			$register = $this->b;
			return $register;
		}
		return $register;
	}

	private function isEven($value)
	{
		return $value % 2 == 0;
	}
}

