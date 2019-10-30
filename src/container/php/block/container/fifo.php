<?php namespace eastoriented\php\container\php\block\container;

use eastoriented\php\{
	block,
	container\iterator,
	container\php
};

class fifo extends php\block\container
{
	function __construct(block... $blocks)
	{
		parent::__construct(new iterator\fifo, ... $blocks);
	}
}
