<?php

require_once("http_requests.php");
require_once("vultr.php");

$test = new vultr_api("ASIOGFLTLIGK6XVAECAASR625QCUMQ");

$array = array(
 'domain'=>"tf2.global",
 'RECORDID'=>"2092705",
 'name'=>"test",
// 'data'=>"",
);

// IP Address: 192.30.131.156

$test->dns_delete_domain("tf2.global");
echo json_pretty($test->response);
echo "\n";
echo $test->response_code;
echo "\n";

?>
