<?php namespace eastoriented\php\container\values\recipient;

use eastoriented\php\container\values\recipient;
use eastoriented\php\block;

class functor extends block\functor
	implements
		recipient
{
	function valuesInPhpContainerAre(... $values) :void
	{
		$this->blockArgumentsAre(... $values);
	}
}
