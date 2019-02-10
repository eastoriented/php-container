<?php namespace eastoriented\php\container\tests\units\iterator\block;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\container\iterator\block')
		;
	}

	function testContainerIteratorHasValue()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function($iterator, $value) use (& $arguments) { $arguments = func_get_args(); }),
				$iterator = new mockOfIterator,
				$value = uniqid()
			)
			->if(
				$this->testedInstance->containerIteratorHasValue($iterator, $value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $iterator, $value ])
		;
	}
}
