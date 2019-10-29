<?php namespace eastoriented\php\block\tests\units\iterator;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class breaker extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\block')
		;
	}

	function testBlockArgumentsAre()
	{
		$this
			->given(
				$this->newTestedInstance($iterator = new mockOfIterator)
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator))
				->mock($iterator)
					->receive('nextIterationAreUseless')
						->once
		;
	}
}
