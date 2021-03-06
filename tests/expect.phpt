--TEST--
Contents of the EXPECT section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('EXPECT');

	var_dump($results);
?>

--EXPECT--
string(84) "array(2) {
  ["hello"]=>
  string(5) "World"
  ["goodbye"]=>
  string(7) "MrChips"
}"
