--TEST--
Contents of the GET section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('GET');

	var_dump($results);
?>

--EXPECT--
string(34) "a=<b>test</b>&b=http://example.com"
