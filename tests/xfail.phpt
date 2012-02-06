--TEST--
Contents of the XFAIL section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('XFAIL');

	var_dump($results);
?>

--EXPECT--
string(63) "This bug might be still open on aix5.2-ppc64 and hpux11.23-ia64"
