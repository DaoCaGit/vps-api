<?php

function http_getheaders () {
 $opts = array(
  'http'=>array(
   'method'=>"GET",
   'header'=>"API-Key: ASIOGFLTLIGK6XVAECAASR625QCUMQ"
  )
 );
 $context = stream_context_create($opts);
 return $context;
}

function http_postheaders ($data) {
 $opts = array(
  'http'=>array(
   'method'=>"POST",
   'header'=>"API-Key: ASIOGFLTLIGK6XVAECAASR625QCUMQ",
   'content' => http_build_query($data)
  )
 );
 var_dump($opts);
 $context = stream_context_create($opts);
 return $context;
}

function get_request ($url) {
 $response = file_get_contents($url);
 http_error_check($http_response_header);
 return($response);
}

function keyget_request ($url) {
 $response = file_get_contents($url, false, http_getheaders());
 http_error_check($http_response_header);
 return($response);
}

function post_request ($url, $data) {
 $response = file_get_contents($url, false, http_postheaders($data));
 http_error_check($http_response_header);
 return($response);
}

function json_pretty ($notpretty) {
 $notpretty = json_decode($notpretty);
 $pretty = json_encode($notpretty, JSON_PRETTY_PRINT);
 return $pretty;
}

function http_error_check ($http_response_header) {
 if ( $http_response_header[0] == "HTTP/1.1 200 OK" ) {
  return;
 } else {
  exit($http_response_header[0]);
 }
}

function account_info () {
 $url = "https://api.vultr.com/v1/account/info";
 return keyget_request($url);
}

function app_list () {
 $url = "https://api.vultr.com/v1/app/list";
 return get_request($url);
}

function auth_info () {
 $url = "https://api.vultr.com/v1/auth/info";
 return keyget_request($url);
}

function backup_list () {
 $url = "https://api.vultr.com/v1/backup/list";
 return keyget_request($url);
}

// dns/create_domain

// dns/create_record

// dns/delete_domain

// dns/delete_record

// dns/list

// dns/records

// dns/update_record

function iso_list () {
 $url = "https://api.vultr.com/v1/iso/list";
 return keyget_request($url);
}

function os_list () {
 $url = "https://api.vultr.com/v1/os/list";
 return get_request($url);
}

function plans_list () {
 $url = "https://api.vultr.com/v1/plans/list";
 return get_request($url);
}

function regions_availability ($dcid) {
 $url = "https://api.vultr.com/v1/regions/availability?DCID=$dcid";
 return keyget_request($url);
}

function regions_list () {
 $url = "https://api.vultr.com/v1/regions/list";
 return get_request($url);
}


// reservedip/attach

// reservedip/convert

// reservedip/create

// reservedip/destroy

// reservedip/detach

// reservedip/list

// server/app_change

// server/app_change_list

function server_bandwidth ($subid) {
 $url = "https://api.vultr.com/v1/server/bandwidth?SUBID=$subid";
 return keyget_request($url); 
}

function server_create () {
 $numargs = func_num_args();
 if ($numargs < 3) {
  exit("server_create: Invalid number of arguments");
 }
 $arg_list = func_get_args();
 $url = "https://api.vultr.com/v1/server/create";
 return post_request($url, $arg_list);
}

// server/create_ipv4

// server/destroy

// server/destroy_ipv4

function server_get_user_data ($subid) {
 $url = "https://api.vultr.com/v1/server/get_user_data?SUBID=$subid";
 return keyget_request($url);
}

// server/halt

// server/label_set

function server_list () {
 $url = "https://api.vultr.com/v1/server/list";
 return keyget_request($url);
}

function server_list_ipv4 ($subid) {
 $url = "https://api.vultr.com/v1/server/list_ipv4?SUBID=$subid";
 return keyget_request($url);
}

function server_list_ipv6 ($subid) {
 $url = "https://api.vultr.com/v1/server/list_ipv6?SUBID=$subid";
 return keyget_request($url);
}

function server_neighbors ($subid) {
 $url = "https://api.vultr.com/v1/server/neighbors?SUBID=$subid";
 return keyget_request($url);
}

// server/os_change

function server_os_change_list ($subid) {
 $url = "https://api.vultr.com/v1/server/os_change_list?SUBID=$subid";
 return keyget_request($url);
}

// server/reboot

// server/reinstall

// server/restore_backup

// server/restore_snapshot

// server/reverse_default_ipv4

// server/reverse_delete_ipv6

function server_reverse_list_ipv6 ($subid) {
 $url = "https://api.vultr.com/v1/server/reverse_list_ipv6?SUBID=$subid";
 return keyget_request($url);
}

// server/reverse_set_ipv4

// server/reverse_set_ipv6

// server/set_user_data

// server/start

// server/upgrade_plan

function server_upgrade_plan_list ($subid) {
 $url = "https://api.vultr.com/v1/server/upgrade_plan_list?SUBID=$subid";
 return keyget_request($url);
}

// snapshot/create

// snapshot/destroy

function snapshot_list () {
 $url = "https://api.vultr.com/v1/snapshot/list";
 return keyget_request($url);
}

// sshkey/create

// sshkey/destroy

function sshkey_list () {
 $url = "https://api.vultr.com/v1/sshkey/list";
 return keyget_request($url);
}

// sshkey/update

// startupscript/create

// startupscript/destroy

function startupscript_list () {
 $url = "https://api.vultr.com/v1/startupscript/list";
 return keyget_request($url);
}

// startupscript/update

// user/create

// user/delete

function user_list () {
 $url = "https://api.vultr.com/v1/user/list";
 return keyget_request($url);
}

// user/update

// Functions that combine the above basic ones

function all_regions_availability () {
 $regions = regions_list();
 $regions = json_decode($regions, true);
 foreach($regions as $dcid => $stuff) {
  $availability = regions_availability($dcid);
  $result[$dcid] = $availability;
 }
 return $result;
}

echo server_create("DCID=6", "VPSPLANID=29", "OSID=167", "label=test");
?>
