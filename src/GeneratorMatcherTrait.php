<?php

trait GeneratorMatcherTrait
{
	public function getMatchers()
	{
		return [
			'generate' => function ($subject, $value) {
				if (!$subject instanceof \Traversable) {
					throw new FailureException('Return value should be instance of \Traversable');
				}
				$array = iterator_to_array($subject);

				return $array === $value;
			}
		];
	}
}