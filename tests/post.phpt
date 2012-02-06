--TEST--
Contents of the POST section.

--FILE--
<?php
  define('BASE', dirname(__DIR__));
  define('TESTS', BASE . '/tests');

  include_once BASE . '/src/PHPT.php';
  use Skyzyx\Components\PHPT;

  $file = file_get_contents(TESTS . '/sample.phpt.txt');
  $phpt = new PHPT($file);
	$results = $phpt->get_section('POST');

	var_dump($results);
?>

--EXPECT--
string(398) "<SOAP-ENV:Envelope
  SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"
  xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"
  xmlns:xsd="http://www.w3.org/2001/XMLSchema"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xmlns:si="http://soapinterop.org/xsd">
  <SOAP-ENV:Body>
    <ns1:test xmlns:ns1="http://testuri.org" />
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>"
