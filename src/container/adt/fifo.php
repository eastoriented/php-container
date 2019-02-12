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
			->recipientOfValuesInContainerIs(
				new values\recipient\functor(
					function() use ($block)
					{
						(
							new iterator\fifo
						)
							->variablesForIteratorBlockAre(
								$block,
								... func_get_args()
							)
						;
					}
				)
			)
		;
	}
}
