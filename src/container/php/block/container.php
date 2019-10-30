<?php namespace eastoriented\php\container\php\block;

use eastoriented\php\block;
use eastoriented\php\container\iterator;

class container
	implements
		block
{
	private
		$iterator,
		$blocks
	;

	function __construct(iterator $iterator, block... $blocks)
	{
		$this->iterator = $iterator;
		$this->blocks = $blocks;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		$this->iterator
			->variablesForIteratorBlockAre(
				new iterator\block\functor(
					function($iterator, $block) use ($arguments)
					{
						$block->blockArgumentsAre(... $arguments);
					}
				),
				... $this->blocks
			)
		;
	}
}
