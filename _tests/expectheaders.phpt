--TEST--
Contents of the EXPECTHEADERS section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('EXPECTHEADERS');

	var_dump($results);
?>

--EXPECT--
string(64) "Content-type: text/html; charset=UTF-8
Status: 403 Access Denied"
