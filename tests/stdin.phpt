--TEST--
Contents of the STDIN section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('STDIN');

	var_dump($results);
?>

--EXPECT--
string(53) "fooBar
use this to input some thing to the php script"
