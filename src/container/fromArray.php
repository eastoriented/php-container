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

	function blockForContainerIteratorIs(container\iterator $iterator, container\iterator\block $block) :void
	{
		$iterator->variablesForIteratorBlockAre($block, $this->values);
	}
}
