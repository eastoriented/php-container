<?php namespace eastoriented\php\container;

interface iterator
{
	function variablesForIteratorBlockAre(iterator\block $block, ... $variables) :void;
	function nextIterationAreUseless() :void;
	function nextIterationAreUsefull() :void;
}
