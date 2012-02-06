--TEST--
Contents of the SKIPIF section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('SKIPIF');

	var_dump($results);
?>

--EXPECT--
string(85) "<?php if (!extension_loaded("filter")) die("Skipped: filter extension required."); ?>"
