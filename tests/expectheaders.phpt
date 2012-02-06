--TEST--
Contents of the EXPECTHEADERS section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('EXPECTHEADERS');

	var_dump($results);
?>

--EXPECT--
string(64) "Content-type: text/html; charset=UTF-8
Status: 403 Access Denied"
