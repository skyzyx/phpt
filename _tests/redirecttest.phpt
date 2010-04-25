--TEST--
Contents of the REDIRECTTEST section.

--FILE--
<?php
	define('BASE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	define('TESTS', BASE . '_tests' . DIRECTORY_SEPARATOR);

	include_once BASE . 'phpt.class.php';

	$file = file_get_contents(TESTS . 'sample.phpt.txt');
	$phpt = new PHPT_Parser($file);
	$results = $phpt->get_section('REDIRECTTEST');

	var_dump($results);
?>

--EXPECT--
string(655) "# magic auto-configuration

$config = array(
  'TESTS' => 'ext/pdo/tests'
);

if (false !== getenv('PDO_MYSQL_TEST_DSN')) {
  # user set them from their shell
  $config['ENV']['PDOTEST_DSN'] = getenv('PDO_MYSQL_TEST_DSN');
  $config['ENV']['PDOTEST_USER'] = getenv('PDO_MYSQL_TEST_USER');
  $config['ENV']['PDOTEST_PASS'] = getenv('PDO_MYSQL_TEST_PASS');
  if (false !== getenv('PDO_MYSQL_TEST_ATTR')) {
    $config['ENV']['PDOTEST_ATTR'] = getenv('PDO_MYSQL_TEST_ATTR');
  }
} else {
  $config['ENV']['PDOTEST_DSN'] = 'mysql:host=localhost;dbname=test';
  $config['ENV']['PDOTEST_USER'] = 'root';
  $config['ENV']['PDOTEST_PASS'] = '';
}

return $config;"
