<?php

require_once("http_requests.php");
require_once("vultr.php");

$test = new vultr_api("ASIOGFLTLIGK6XVAECAASR625QCUMQ");

//$array = array(
// "DCID"=>"11",
// "VPSPLANID"=>"29",
// "OSID"=>"167",
// "label"=>"test",
//);

print_r($test->all_regions_availability());

?>
