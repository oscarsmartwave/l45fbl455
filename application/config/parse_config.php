<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once (APPPATH.'libraries/vendor/autoload.php');

use Parse\ParseClient;

$config['stripe'] = array(
			"secret_key"      => "sk_test_HmrDjVfc3nfHaFTQr4tqDHRt",
			"publishable_key" => "pk_test_VJXmCA25wmAnqgQtZeOe4S2f"
		);

$config["app_id"] = 'mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY';
$config["rest_key"] = 'JTPoJWY6cVUjlTaLT8oTDJsIMPo3Pcs6b0c3TCl5';
$config["master_key"] = 'huaX4chDLe2E3ajH1lT8LGuFd6iCTDc6covbyyPu';

$config["edmunds"] = "rjhqr7cj3mrhhzdfhju88d22";

ParseClient::initialize('mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY', 'JTPoJWY6cVUjlTaLT8oTDJsIMPo3Pcs6b0c3TCl5', 'huaX4chDLe2E3ajH1lT8LGuFd6iCTDc6covbyyPu');



?>