<?php namespace eastoriented\php;

interface container
{
	function recipientOfValuesInContainerIs(container\values\recipient $recipient) :void;
	function blockForContainerIteratorIs(container\iterator $iterator, container\iterator\block $block) :void;
}
