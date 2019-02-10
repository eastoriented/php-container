<?php namespace eastoriented\php\container;

class fifo extends fromArray
{
	function blockForIteratorIs(iterator\block $block) :void
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
