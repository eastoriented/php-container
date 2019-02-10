<?php namespace eastoriented\php\container\tests\units;

require __DIR__ . '/../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\container\iterator as mockOfIterator;
use mock\eastoriented\php\container\iterator\block as mockOfBlock;

class fromArray extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\container')
		;
	}

	function testBlockForContainerIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$iterator = new mockOfIterator,
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance)
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, [])
							->once

			->given(
				$values = [ rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, uniqid(), new \stdclass, false, true, null, '' ],
				shuffle($values),
				$this->newTestedInstance(... $values)
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance(... $values))
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, $values)
							->once
		;
	}
}
