<?php namespace eastoriented\php\container;

use eastoriented\php\container;

class fromArray
	implements
		container
{
	private
		$values
	;

	function __construct(... $values)
	{
		$this->values = $values;
	}

	function recipientOfValuesInContainerIs(container\values\recipient $recipient) :void
	{
		$recipient->valuesInPhpContainerAre(... $this->values);
	}

	function blockForContainerIteratorIs(container\iterator $iterator, container\iterator\block $block) :void
	{
		$iterator->variablesForIteratorBlockAre($block, ...$this->values);
	}
}
