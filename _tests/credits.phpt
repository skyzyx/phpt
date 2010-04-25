--TEST--
Contents of the CREDITS section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('CREDITS');

	var_dump($results);
?>

--EXPECT--
string(53) "Zoe Slattery zoe@php.net
# TestFest Munich 2009-05-19"
