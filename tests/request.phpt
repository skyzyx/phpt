--TEST--
Contents of the REQUEST section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('REQUEST');

	var_dump($results);
?>

--EXPECT--
string(66) "return <<<END
SCRIPT_NAME=/nothing.php
QUERY_STRING=$filename
END;"
