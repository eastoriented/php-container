<?php namespace eastoriented\php\container\adt;

use eastoriented\php\container\{
	adt,
	fromArray,
	iterator,
	values
};

class fifo extends fromArray
	implements
		adt
{
	function blockForEachValueIs(iterator\block $block) :void
	{
		$this
			->blockForContainerIteratorIs(
				new iterator\fifo,
				$block
			)
		;
	}
}
