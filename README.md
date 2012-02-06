# PHPT Component

Parses PHPT unit test files into sections as key-value pairs.


## Usage

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

## Tests

## License
MIT licensed.
