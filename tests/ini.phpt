--TEST--
Contents of the INI section.

--FILE--
<?php
	define('BASE', dirname(__DIR__));
	define('TESTS', BASE . '/tests');

	include_once BASE . '/src/PHPT.php';
	use Skyzyx\Components\PHPT;

	$file = file_get_contents(TESTS . '/sample.phpt.txt');
	$phpt = new PHPT($file);
	$results = $phpt->get_section('INI');

	var_dump($results);
?>

--EXPECT--
string(120) "session.use_cookies=0
session.cache_limiter=
register_globals=1
session.serialize_handler=php
session.save_handler=files"
