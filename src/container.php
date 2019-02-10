<?php namespace eastoriented\php;

interface container
{
	function blockForContainerIteratorIs(container\iterator $iterator, container\iterator\block $block) :void;
}
