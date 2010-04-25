--TEST--
Contents of the ENV section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('ENV');

	var_dump($results);
?>

--EXPECT--
string(233) "return <<<END
REDIRECT_URL=$scriptname
PATH_TRANSLATED=c:\apache\1.3.27\htdocs\nothing.php
QUERY_STRING=$filename
PATH_INFO=/nothing.php
SCRIPT_NAME=/phpexe/php.exe/nothing.php
SCRIPT_FILENAME=c:\apache\1.3.27\htdocs\nothing.php
END;"
