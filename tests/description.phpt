--TEST--
Contents of the DESCRIPTION section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('DESCRIPTION');

	var_dump($results);
?>

--EXPECT--
string(140) "This test covers both valid and invalid usages of
filter_input() with INPUT_GET and INPUT_POST data
and several differnet filter sanitizers."
