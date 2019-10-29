<?php namespace eastoriented\php\block\iterator;

use eastoriented\php\{
	block,
	container\iterator
};

class breaker
	implements
		block
{
	private
		$iterator
	;

	function __construct(iterator $iterator)
	{
		$this->iterator = $iterator;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		$this->iterator->nextIterationAreUseless();
	}
}
