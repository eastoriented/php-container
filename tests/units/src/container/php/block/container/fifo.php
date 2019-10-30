<?php namespace eastoriented\php\container\tests\units\php\block\container;

require __DIR__ . '/../../../../../runner.php';

use eastoriented\tests\units;
use eastoriented\container\iterator;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class fifo extends units\test
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
					$block = new mockOfBlock,
					$otherBlock = new mockOfBlock
				),

				$this->calling($block)->blockArgumentsAre = function(... $args) use (& $blocks, $block) {
					$blocks[] = $block;
				},

				$this->calling($otherBlock)->blockArgumentsAre = function(... $args) use (& $blocks, $otherBlock) {
					$blocks[] = $otherBlock;
				}
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $otherBlock))
				->mock($block)
					->receive('blockArgumentsAre')
						->once
				->mock($otherBlock)
					->receive('blockArgumentsAre')
						->once
				->array($blocks)->isEqualTo([ $block, $otherBlock ])

			->given(
				$blocks = [],
				$arguments = [ rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, uniqid(), true, false, new \stdClass, [], null ]
			)
			->if(
				$this->testedInstance->blockArgumentsAre(... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $otherBlock))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
				->mock($otherBlock)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
				->array($blocks)->isEqualTo([ $block, $otherBlock ])
		;
	}
}
