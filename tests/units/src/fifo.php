<?php namespace eastoriented\php\container\tests\units;

require __DIR__ . '/../runner.php';

use eastoriented\tests\units;
use eastoriented\php\container\tests\units\container;
use mock\eastoriented\php\container\iterator\block as mockOfBlock;

class fifo extends units\test
{
	function testBlockForIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$block = new mockOfBlock,
				$this->calling($block)->containerIteratorHasValue = function($anIdentifier, $aValue) use (& $values) {
					$values[] = $aValue;
				}
			)
			->if(
				$this->testedInstance->blockForIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->variable($values)
					->isNull

			->given(
				$this->newTestedInstance(
					... container::generateValues()
				)
			)
			->if(
				$this->testedInstance->blockForIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(... $values))
				->variable($values)
					->isEqualTo($values)
		;
	}
}
