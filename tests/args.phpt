--TEST--
Contents of the ARGS section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('ARGS');

	var_dump($results);
?>

--EXPECT--
string(49) "--arg value --arg=value -avalue -a=value -a value"
