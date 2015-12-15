<?php

namespace spec\Day4;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HashGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day4\HashGenerator');
    }

	public function it_should_be_able_to_generate_an_md5_hash_using_secret_and_integer()
	{
		$this->generateHash("ckczppom", "3", "md5")->shouldBe("af6ed61bfc93f16f530bcaade083803b");
	}
}
