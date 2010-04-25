--TEST--
Contents of the FILEEOF section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('FILEEOF');

	var_dump($results);
?>

--EXPECT--
string(74) "<?php
eval("echo 'Hello'; // comment");
echo " World";
//last line comment"
