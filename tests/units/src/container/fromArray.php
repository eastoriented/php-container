<?php namespace eastoriented\php\container\tests\units;

require __DIR__ . '/../../runner.php';

use eastoriented\php\container\tests\units\container;
use mock\eastoriented\php\container\iterator as mockOfIterator;
use mock\eastoriented\php\container\iterator\block as mockOfBlock;
use mock\eastoriented\php\container\values\recipient as mockOfValuesRecipient;

class fromArray extends container
{
	function testRecipientOfValuesInContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfValuesRecipient
			)
			->if(
				$this->testedInstance->recipientOfValuesInContainerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('valuesInPhpContainerAre')
						->withArguments()
							->once

			->given(
				$this->newTestedInstance(... ($values = self::generateValues()))
			)
			->if(
				$this->testedInstance->recipientOfValuesInContainerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(... $values))
				->mock($recipient)
					->receive('valuesInPhpContainerAre')
						->withArguments(... $values)
							->once
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
						->withArguments($block, ...[])
							->once

			->given(
				$this->newTestedInstance(... ($values = self::generateValues()))
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance(... $values))
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, ...$values)
							->once
		;
	}
}
