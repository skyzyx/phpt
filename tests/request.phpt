--TEST--
Contents of the REQUEST section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('REQUEST');

	var_dump($results);
?>

--EXPECT--
string(66) "return <<<END
SCRIPT_NAME=/nothing.php
QUERY_STRING=$filename
END;"
