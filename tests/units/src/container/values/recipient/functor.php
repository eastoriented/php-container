<?php namespace eastoriented\php\container\tests\units\values\recipient;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use eastoriented\php\container\tests\units\container;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\container\values\recipient')
		;
	}

	function testValuesInContainerAre()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function(... $values) use (& $valuesFromContainer) {
						$valuesFromContainer = $values;
					}
				)
			)
			->if(
				$this->testedInstance->valuesInPhpContainerAre(... ($values = container::generateValues()))
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($valuesFromContainer)
					->isEqualTo($values)
		;
	}
}
