--TEST--
Contents of the CREDITS section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('CREDITS');

	var_dump($results);
?>

--EXPECT--
string(53) "Zoe Slattery zoe@php.net
# TestFest Munich 2009-05-19"
