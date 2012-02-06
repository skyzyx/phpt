--TEST--
Contents of the CLEAN section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('CLEAN');

	var_dump($results);
?>

--EXPECT--
string(96) "<?php
$key = ftok(dirname(__FILE__)."/003.phpt", 'q');
$s = shm_attach($key);
shm_remove($s);
?>"
