--TEST--
Contents of the XFAIL section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('XFAIL');

	var_dump($results);
?>

--EXPECT--
string(63) "This bug might be still open on aix5.2-ppc64 and hpux11.23-ia64"
