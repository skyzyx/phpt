--TEST--
Contents of the FILEEOF section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('FILEEOF');

	var_dump($results);
?>

--EXPECT--
string(74) "<?php
eval("echo 'Hello'; // comment");
echo " World";
//last line comment"
