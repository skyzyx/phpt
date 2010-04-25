--TEST--
Contents of the HEADERS section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('HEADERS');

	var_dump($results);
?>

--EXPECT--
string(123) "return <<<END
Content-Type=multipart/form-data; boundary=---------------------------240723202011929
Content-Length=862
END;"
