--TEST--
Contents of the EXPECTF section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('EXPECTF');

	var_dump($results);
?>

--EXPECT--
string(665) "string(4) "test"
string(18) "http://example.com"
string(27) "&#60;b&#62;test&#60;/b&#62;"

Notice: Object of class stdClass could not be converted to int in %ssample001.php on line %d
bool(false)
string(6) "string"
float(12345.7)
string(29) "&#60;p&#62;string&#60;/p&#62;"
bool(false)

Warning: filter_var() expects parameter 2 to be long, string given in %s011.php on line %d
NULL

Warning: filter_input() expects parameter 3 to be long, string given in %s011.php on line %d
NULL

Warning: filter_var() expects at most 3 parameters, 5 given in %s011.php on line %d
NULL

Warning: filter_var() expects at most 3 parameters, 5 given in %s011.php on line %d
NULL
Done"
