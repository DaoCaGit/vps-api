<?php

class vultr_api extends http_requests {

 public function account_info () {
  parent::keyget("https://api.vultr.com/v1/account/info");
 }
 
 public function app_list () {
  parent::get("https://api.vultr.com/v1/app/list");
 }
 
 public function auth_info () {
  parent::keyget("https://api.vultr.com/v1/auth/info");
 }
 
 public function backup_list () {
  parent::keyget("https://api.vultr.com/v1/backup/list");
 }
 
 public function dns_create_domain ($domain, $serverip) {
  $arguments = array(
   "domain"=>$domain,
   "serverip"=>$serverip,
  );
  parent::post("https://api.vultr.com/v1/dns/create_domain", $arguments);
 }
 
 public function dns_create_record ($args) {
  if (!(array_key_exists('domain', $args) && array_key_exists('name', $args) && array_key_exists('type', $args) && array_key_exists('data', $args))) {
   exit("dns_create_record requires arguments: domain, name, type, and data\n");
  }
  if ((strnatcasecmp($args['type'], "MX")) or (strnatcasecmp($args['type'], "SRV")) and !(array_key_exists('priority'))) {
   exit("MX and SRV records require a priority\n");
  }
  parent::post("https://api.vultr.com/v1/dns/create_record", $args);
 }
 
 public function dns_delete_domain ($domain) {
  parent::post("https://api.vultr.com/v1/dns/delete_domain", $domain);
 }
 
 public function dns_delete_record ($arg) {
  if (is_string($arg)) {
   $arg = array('domain'=>$arg);
  } if (is_int($arg)) {
   $arg = array('RECORDID'=>$arg);
  }
  parent::post("https://api.vultr.com/v1/dns/delete_record", $arg);
 }
 
 public function dns_list () {
  parent::keyget("https://api.vultr.com/v1/dns/list");
 }
 
 public function dns_records ($domain) {
  parent::keyget("https://api.vultr.com/v1/dns/records?domain=$domain");
 }
 
 public function dns_update_record ($args) {
  if (!(array_key_exists('domain', $args) && array_key_exists('RECORDID', $args))) {
   exit("dns_update_recrd requires arguments: domain and RECORDID");
  }
  parent::post("https://api.vultr.com/v1/dns/update_record", $args);
 }
 
 public function iso_list () {
  parent::keyget("https://api.vultr.com/v1/iso/list");
 }
 
 public function os_list () {
  parent::get("https://api.vultr.com/v1/os/list");
 }
 
 public function plans_list () {
  parent::get("https://api.vultr.com/v1/plans/list");
 }
 
 public function regions_availability ($dcid) {
  parent::keyget("https://api.vultr.com/v1/regions/availability?DCID=$dcid");
 }
 
 public function regions_list () {
  parent::get("https://api.vultr.com/v1/regions/list");
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
  parent::keyget("https://api.vultr.com/v1/server/bandwidth?SUBID=$subid");
 }
 
 public function server_create ($arguments) {
  if (!(array_key_exists('DCID', $arguments) and array_key_exists('VPSPLANID', $arguments) and array_key_exists('OSID', $arguments))) {
   exit("server_create requires arguments: DCID, VPSPLANID, and OSID\n");
  }
  parent::post("https://api.vultr.com/v1/server/create", $arguments);
 }
 
 // server/create_ipv4
 
 public function server_destroy ($subid) {
  $subid = array('SUBID' => $subid);
  parent::post("https://api.vultr.com/v1/server/destroy", $subid);
 }
 
 // server/destroy_ipv4
 
 public function server_get_user_data ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/get_user_data?SUBID=$subid");
 }
 
 // server/halt
 
 // server/label_set
 
 public function server_list () {
  parent::keyget("https://api.vultr.com/v1/server/list");
 }
 
 public function server_list_ipv4 ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/list_ipv4?SUBID=$subid");
 }
 
 public function server_list_ipv6 ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/list_ipv6?SUBID=$subid");
 }
 
 public function server_neighbors ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/neighbors?SUBID=$subid");
 }
 
 // server/os_change
 
 public function server_os_change_list ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/os_change_list?SUBID=$subid");
 }
 
 // server/reboot
 
 // server/reinstall
 
 // server/restore_backup
 
 // server/restore_snapshot
 
 // server/reverse_default_ipv4
 
 // server/reverse_delete_ipv6
 
 public function server_reverse_list_ipv6 ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/reverse_list_ipv6?SUBID=$subid");
 }
 
 // server/reverse_set_ipv4
 
 // server/reverse_set_ipv6
 
 // server/set_user_data
 
 // server/start
 
 // server/upgrade_plan
 
 public function server_upgrade_plan_list ($subid) {
  parent::keyget("https://api.vultr.com/v1/server/upgrade_plan_list?SUBID=$subid");
 }
 
 // snapshot/create
 
 // snapshot/destroy
 
 public function snapshot_list () {
  parent::keyget("https://api.vultr.com/v1/snapshot/list");
 }
 
 // sshkey/create
 
 // sshkey/destroy
 
 public function sshkey_list () {
  parent::keyget("https://api.vultr.com/v1/sshkey/list");
 }
 
 // sshkey/update
 
 // startupscript/create
 
 // startupscript/destroy
 
 public function startupscript_list () {
  parent::keyget("https://api.vultr.com/v1/startupscript/list");
 }
 
 // startupscript/update
 
 // user/create
 
 // user/delete
 
 public function user_list () {
  parent::keyget("https://api.vultr.com/v1/user/list");
 }
 
 // user/update
 
 // Functions that combine the above basic ones
 
// This function needs to be re-written for the new class structure

// public function all_regions_availability () {
//  $regions = $this->regions_list();
//  $regions = json_decode($regions, true);
//  foreach($regions as $dcid => $stuff) {
//   $availability = $this->regions_availability($dcid);
//   $result[$dcid] = $availability;
//  }
//  return $result;
// }

}

?>
