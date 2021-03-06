# PHPT Component

Parses PHPT unit test files into sections as key-value pairs.


## Example

Say, for example, you have this PHPT unit test:

	--TEST--
	Test that my code works!

	--DESCRIPTION--
	This test covers [blah, blah, blah...]

	--CREDITS--
	Zoe Slattery zoe@php.net
	# TestFest Munich 2009-05-19

	--FILE--
	<?php
	var_dump(array(
		'hello' => 'World',
		'goodbye' => 'MrChips'
	));
	?>

	--EXPECT--
	array(2) {
	  ["hello"]=>
	  string(5) "World"
	  ["goodbye"]=>
	  string(7) "MrChips"
	}

You decide that you want to grab the contents of the `FILE` header:

	<?php
	use Skyzyx\Components\PHPT;

	$file = file_get_contents('sample.phpt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('FILE');

	echo $results;

This would display the following:

	<?php
	var_dump(array(
		'hello' => 'World',
		'goodbye' => 'MrChips'
	));
	?>


## Installation
### Install source from GitHub
To install the source code:

	git clone git://github.com/skyzyx/phpt.git

And include it in your scripts:

	require_once '/path/to/phpt/src/PHPT.php';

### Install with Composer
If you're using [Composer](https://github.com/composer/composer) to manage dependencies, you can add PHP with it.

	{
		"require": {
			"skyzyx/phpt": ">=1.1"
		}
	}

### Using a Class Loader
If you're using a class loader (e.g., [Symfony Class Loader](https://github.com/symfony/ClassLoader)):

	$loader->registerNamespace('Skyzyx\\Components\\PHPT', 'path/to/vendor/phpt/src');


## Tests
Tests are written in [PHPT](http://qa.php.net/phpt_details.php) format. You can run them with either the PEAR Test Runner or with PHPUnit 3.6+.

	cd tests/
	pear run-tests .

...or...

	cd tests/
	phpunit .


## License & Copyright
Copyright (c) 2010-2012 [Ryan Parman](http://ryanparman.com). Licensed for use under the terms of the [MIT license](http://www.opensource.org/licenses/mit-license.php).
