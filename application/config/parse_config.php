<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once (APPPATH.'libraries/vendor/autoload.php');

use Parse\ParseClient;

$config['stripe'] = array(
			"secret_key"      => "sk_test_HmrDjVfc3nfHaFTQr4tqDHRt",
			"publishable_key" => "pk_test_VJXmCA25wmAnqgQtZeOe4S2f"
		);
/*
$config['stripe'] = array(
			"secret_key"      => "sk_test_VFOKLQ13V2ndC2tZerW8tPVN",
			"publishable_key" => "pk_test_ScsY6ahJIr3f0TPvQJcBuf12"
		);
*/

/*
$config["app_id"] = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
$config['rest_key'] = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
$config['master_key'] = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';
*/

$config["app_id"] = 'mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY';
$config["rest_key"] = 'JTPoJWY6cVUjlTaLT8oTDJsIMPo3Pcs6b0c3TCl5';
$config["master_key"] = 'huaX4chDLe2E3ajH1lT8LGuFd6iCTDc6covbyyPu';
$config["edmunds"] = "rjhqr7cj3mrhhzdfhju88d22";


ParseClient::initialize('mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY', 'JTPoJWY6cVUjlTaLT8oTDJsIMPo3Pcs6b0c3TCl5', 'huaX4chDLe2E3ajH1lT8LGuFd6iCTDc6covbyyPu');



?>