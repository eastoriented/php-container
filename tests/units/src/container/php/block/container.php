<?php namespace eastoriented\php\container\tests\units\php\block;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use eastoriented\container\iterator;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class container extends units\test
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
				$this->newTestedInstance(
					$iterator = new mockOfIterator,
					$block = new mockOfBlock,
					$otherBlock = new mockOfBlock
				)
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $block, $otherBlock))
				->mock($block)
					->receive('blockArgumentsAre')
						->never
				->mock($otherBlock)
					->receive('blockArgumentsAre')
						->never

			->given(
				$this->calling($iterator)->variablesForIteratorBlockAre = function($anIteratorBlock, $aBlock, $anOtherBlock) use ($iterator) {
					$anIteratorBlock->containerIteratorHasValue($iterator, $aBlock);
					$anIteratorBlock->containerIteratorHasValue($iterator, $anOtherBlock);
				}
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $block, $otherBlock))
				->mock($block)
					->receive('blockArgumentsAre')
						->once
				->mock($otherBlock)
					->receive('blockArgumentsAre')
						->once

			->given(
				$arguments = [ rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, uniqid(), true, false, new \stdClass, [], null ]
			)
			->if(
				$this->testedInstance->blockArgumentsAre(... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $block, $otherBlock))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
				->mock($otherBlock)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
		;
	}
}
