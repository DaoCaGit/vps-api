<?php

class vultr_api extends http_requests {

 public function account_info () {
  parent::keyget("https://api.vultr.com/v1/account/info");
  return $this->response;
 }
 
 public function app_list () {
  parent::get("https://api.vultr.com/v1/app/list");
  return $this->response;
 }
 
 public function auth_info () {
  parent::keyget("https://api.vultr.com/v1/auth/info");
  return $this->response;
 }
 
 public function backup_list () {
  parent::keyget("https://api.vultr.com/v1/backup/list");
  return $this->response;
 }
 
 // dns/create_domain
 
 // dns/create_record
 
 // dns/delete_domain
 
 // dns/delete_record
 
 // dns/list
 
 // dns/records
 
 // dns/update_record
 
 public function iso_list () {
  parent::keyget("https://api.vultr.com/v1/iso/list");
  return $this->response;
 }
 
 public function os_list () {
  parent::get("https://api.vultr.com/v1/os/list");
  return $this->response;
 }
 
 public function plans_list () {
  parent::get("https://api.vultr.com/v1/plans/list");
  return $this->response;
 }
 
 public function regions_availability ($dcid) {
  parent::keyget("https://api.vultr.com/v1/regions/availability?DCID=$dcid");
  return $this->response;
 }
 
 public function regions_list () {
  $url = "https://api.vultr.com/v1/regions/list";
  return get($url);
 }
 
 
 // reservedip/attach
 
 // reservedip/convert
 
 // reservedip/create
 
 // reservedip/destroy
 
 // reservedip/detach
 
 // reservedip/list
 
 // server/app_change
 
 // server/app_change_list
 
 public function server_bandwidth ($subid) {
  $url = "https://api.vultr.com/v1/server/bandwidth?SUBID=$subid";
  return keyget($url); 
 }
 
 public function server_create ($arguments) {
  if (!(array_key_exists('DCID', $arguments) and array_key_exists('VPSPLANID', $arguments) and array_key_exists('OSID', $arguments))) {
   exit("server_create requires arguments: DCID, VPSPLANID, and OSID\n");
  }
  parent::post("https://api.vultr.com/v1/server/create", $arguments);
  return $this->response;
 }
 
 // server/create_ipv4
 
 public function server_destroy ($subid) {
  $subid = array('SUBID' => $subid);
  parent::post("https://api.vultr.com/v1/server/destroy", $subid);
  return $this->response;
 }
 
 // server/destroy_ipv4
 
 public function server_get_user_data ($subid) {
  $url = "https://api.vultr.com/v1/server/get_user_data?SUBID=$subid";
  return keyget($url);
 }
 
 // server/halt
 
 // server/label_set
 
 public function server_list () {
  $url = "https://api.vultr.com/v1/server/list";
  return keyget($url);
 }
 
 public function server_list_ipv4 ($subid) {
  $url = "https://api.vultr.com/v1/server/list_ipv4?SUBID=$subid";
  return keyget($url);
 }
 
 public function server_list_ipv6 ($subid) {
  $url = "https://api.vultr.com/v1/server/list_ipv6?SUBID=$subid";
  return keyget($url);
 }
 
 public function server_neighbors ($subid) {
  $url = "https://api.vultr.com/v1/server/neighbors?SUBID=$subid";
  return keyget($url);
 }
 
 // server/os_change
 
 public function server_os_change_list ($subid) {
  $url = "https://api.vultr.com/v1/server/os_change_list?SUBID=$subid";
  return keyget($url);
 }
 
 // server/reboot
 
 // server/reinstall
 
 // server/restore_backup
 
 // server/restore_snapshot
 
 // server/reverse_default_ipv4
 
 // server/reverse_delete_ipv6
 
 public function server_reverse_list_ipv6 ($subid) {
  $url = "https://api.vultr.com/v1/server/reverse_list_ipv6?SUBID=$subid";
  return keyget($url);
 }
 
 // server/reverse_set_ipv4
 
 // server/reverse_set_ipv6
 
 // server/set_user_data
 
 // server/start
 
 // server/upgrade_plan
 
 public function server_upgrade_plan_list ($subid) {
  $url = "https://api.vultr.com/v1/server/upgrade_plan_list?SUBID=$subid";
  return keyget($url);
 }
 
 // snapshot/create
 
 // snapshot/destroy
 
 public function snapshot_list () {
  $url = "https://api.vultr.com/v1/snapshot/list";
  return keyget($url);
 }
 
 // sshkey/create
 
 // sshkey/destroy
 
 public function sshkey_list () {
  $url = "https://api.vultr.com/v1/sshkey/list";
  return keyget($url);
 }
 
 // sshkey/update
 
 // startupscript/create
 
 // startupscript/destroy
 
 public function startupscript_list () {
  $url = "https://api.vultr.com/v1/startupscript/list";
  return keyget($url);
 }
 
 // startupscript/update
 
 // user/create
 
 // user/delete
 
 public function user_list () {
  $url = "https://api.vultr.com/v1/user/list";
  return keyget($url);
 }
 
 // user/update
 
 // Functions that combine the above basic ones
 
 public function all_regions_availability () {
  $regions = regions_list();
  $regions = json_decode($regions, true);
  foreach($regions as $dcid => $stuff) {
   $availability = regions_availability($dcid);
   $result[$dcid] = $availability;
  }
  return $result;
 }

}

?>
