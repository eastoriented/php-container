<?php namespace eastoriented\php\container\iterator;

use eastoriented\php\container\iterator;

interface block
{
	function containerIteratorHasValue(iterator $iterator, $value) :void;
}
