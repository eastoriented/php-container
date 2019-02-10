<?php namespace eastoriented\php\container\tests\units;

use eastoriented\tests\units;

abstract class container extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\container')
		;
	}

	static function generateValues()
	{
		$values = [ rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, uniqid(), new \stdclass, false, true, null, '' ];
		shuffle($values);

		return $values;
	}
}
