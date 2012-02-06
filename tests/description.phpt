--TEST--
Contents of the DESCRIPTION section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('DESCRIPTION');

	var_dump($results);
?>

--EXPECT--
string(140) "This test covers both valid and invalid usages of
filter_input() with INPUT_GET and INPUT_POST data
and several differnet filter sanitizers."
