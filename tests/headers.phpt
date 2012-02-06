--TEST--
Contents of the HEADERS section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('HEADERS');

	var_dump($results);
?>

--EXPECT--
string(123) "return <<<END
Content-Type=multipart/form-data; boundary=---------------------------240723202011929
Content-Length=862
END;"
