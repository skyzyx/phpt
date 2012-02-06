--TEST--
Contents of the REDIRECTTEST section.

--FILE--
<?php
  define('BASE', dirname(__DIR__));
  define('TESTS', BASE . '/tests');

  include_once BASE . '/src/PHPT.php';
  use Skyzyx\Components\PHPT;

  $file = file_get_contents(TESTS . '/sample.phpt.txt');
  $phpt = new PHPT($file);
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
