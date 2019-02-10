<?php namespace eastoriented\php\container\iterator;

use eastoriented\php\container;

class fifo
	implements
		container\iterator
{
	private
		$current,
		$variables
	;

	function __construct()
	{
		$this->variables = new \arrayIterator;
	}

	function variablesForIteratorBlockAre(block $block, ... $variables) :void
	{
		$iterator = clone $this;
		$iterator->variables = new \arrayIterator($variables);

		foreach ($iterator->variables as $iterator->current => $value)
		{
			$block->containerIteratorHasValue($iterator, $value);
		}
	}

	function nextIterationAreUseless() :void
	{
		try
		{
			$this->variables->seek(sizeof($this->variables));
		}
		catch (\exception $exception) {}
	}

	function nextIterationAreUsefull() :void
	{
		try
		{
			$this->variables->seek($this->current);
		}
		catch (\exception $exception) {}
	}
}
