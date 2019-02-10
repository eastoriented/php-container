<?php namespace eastoriented\php\container\iterator\block;

use eastoriented\php\{ container\iterator, block };

class functor extends block\functor
	implements
		iterator\block
{
	function containerIteratorHasValue(iterator $iterator, $value) :void
	{
		parent::blockArgumentsAre($iterator, $value);
	}
}
