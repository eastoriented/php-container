# eastoriented/php-container

`eastoriented/php-container` is a east oriented PHP library to iterator over some values.
All public methods in all classes return `void`.

## How to use it?

The file `src/container.php` define the interface `eastoriented\php\container`.  
The file `src/container/adt.php` define the interface `eastoriented\php\container\adt` (Abstract Data Type).  
The file `src/iterator.php` define the interface `eastoriented\php\container\iterator`.  
The file `src/iterator/block.php` define the interface `eastoriented\php\container\iterator\block`.  
To iterate over a container, you need an iterator and a block, or you can use an abstract data type.

```
use eastoriented\php\{
	container,
	container\iterator,
	container\iterator\block
};

(new container\fromArray(1, null, false, true, new \stdclass, uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M-PI))
	->blockForContainerIteratorIs(
		new iterator\fifo,
		new block\functor(
			function($value) { var_dump($value); }
		)
	)
;

(new container\adt\fifo(1, null, false, true, new \stdclass, uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M-PI))
	->blockForEachValueIs(
		new block\functor(
			function($value) { var_dump($value); }
		)
	)
;
```

## Contributing

### About workflow

We're using pull request to introduce new features and bug fixes.  
Please, try to be explicit in your commit messages:

1. Explain why the change was made ;
2. Explain technical implementation (you can provide links to any relevant tickets, articles or other resources).

You can use the following template:

```
# If applied, this commit will...

# Explain why this change is being made

# Provide links to any relevant tickets, articles or other resources
```

To use it, just put it in a text file in (for example) your home and define it as a template:

```
# git config --global commit.template ~/.git_commit_template.txt
```

### About testing

To run unit tests, just do `make unit-tests`.

## Languages and tools

- [*atoum*](http://docs.atoum.org).
