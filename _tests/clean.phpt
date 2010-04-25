--TEST--
Contents of the CLEAN section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('CLEAN');

	var_dump($results);
?>

--EXPECT--
string(96) "<?php
$key = ftok(dirname(__FILE__)."/003.phpt", 'q');
$s = shm_attach($key);
shm_remove($s);
?>"
