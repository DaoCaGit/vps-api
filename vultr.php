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
 
 public function dns_create_domain (string $domain, string $serverip) {
  $arguments = array(
   "domain"=>$domain,
   "serverip"=>$serverip,
  );
  parent::post("https://api.vultr.com/v1/dns/create_domain", $arguments);
 }
 
 public function dns_create_record (array $args) {
  if (!(array_key_exists('domain', $args) && array_key_exists('name', $args) && array_key_exists('type', $args) && array_key_exists('data', $args))) {
   exit("dns_create_record requires arguments: domain, name, type, and data\n");
  }
  if ((strnatcasecmp($args['type'], "MX")) or (strnatcasecmp($args['type'], "SRV")) and !(array_key_exists('priority'))) {
   exit("MX and SRV records require a priority\n");
  }
  parent::post("https://api.vultr.com/v1/dns/create_record", $args);
 }
 
 public function dns_delete_domain (string $domain) {
  $args = array('domain'=>$domain);
  parent::post("https://api.vultr.com/v1/dns/delete_domain", $args);
 }
 
 public function dns_delete_record (string $domain, int $recordid) {
  $args = array(
   'domain'=>$domain,
   'RECORDID'=>$recordid,
  );
  parent::post("https://api.vultr.com/v1/dns/delete_record", $args);
 }
 
 public function dns_list () {
  parent::keyget("https://api.vultr.com/v1/dns/list");
 }
 
 public function dns_records (string $domain) {
  parent::keyget("https://api.vultr.com/v1/dns/records?domain=$domain");
 }
 
 public function dns_update_record (array $args) {
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
 
 public function regions_availability (int $dcid) {
  parent::keyget("https://api.vultr.com/v1/regions/availability?DCID=$dcid");
 }
 
 public function regions_list () {
  parent::get("https://api.vultr.com/v1/regions/list");
 }
 
 public function reservedip_attach (string $ip_address, int $attach_subid) {
  $args = array(
   'ip_address'=>$ip_address,
   'attach_SUBID'=>$attach_subid,
  );
  parent::post("https://api.vultr.com/v1/reservedip/attach, $args");
 }
 
 public function reservedip_convert (array $args) {
  if (!(array_key_exists('SUBID', $args) && array_key_exists('ip_address', $args))) {
   exit("reservedip_convert requires arguments: SUBID and ip_address");
  }
  parent::post("https://api.vultr.com/v1/reservedip/convert", $args);
 }
 
 public function reservedip_create (array $args) {
  if (!(array_key_exists('DCID', $args) && array_key_exists('ip_type', $args))) {
   exit("reservedip_create requires arguments: DCID and ip_type");
  }
  parent::post("https://api.vultr.com/v1/reservedip/create", $args);
 }
 
 public function reservedip_destroy (int $subid) {
  $args = array('SUBID'=>$subid);
  parent::post("https://api.vultr.com/v1/reservedip/destroy", $args);
 }
 
 public function reservedip_detach (string $ip_address, int $detach_subid) {
  $args = array(
   'ip_address'=>$ip_address,
   'detach_SUBID'=>$detach_subid,
  );
  parent::post("https://api.vultr.com/v1/reservedip/detach", $args);
 }
 
 public function reservedip_list () {
  parent::keyget("https://api.vultr.com/v1/reservedip/list");
 }
 
 public function server_app_change (int $subid, int $appid) {
  $args = array(
   'subid'=>$subid,
   'appid'=>$appid,
  );
  parent::post("https://api.vultr.com/v1/server/app_change_list", $args);
 }
 
 public function server_app_change_list (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/app_change_list?SUBID=$subid");
 }
 
 public function server_bandwidth (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/bandwidth?SUBID=$subid");
 }
 
 public function server_create (array $args) {
  if (!(array_key_exists('DCID', $args) and array_key_exists('VPSPLANID', $args) and array_key_exists('OSID', $args))) {
   exit("server_create requires arguments: DCID, VPSPLANID, and OSID\n");
  }
  parent::post("https://api.vultr.com/v1/server/create", $args);
 }
 
 public function server_create_ipv4 (int $subid, string $reboot) {
  $args = array(
   'subid'=>$subid,
   'reboot'=>$reboot,
  );
  parent::post("https://api.vultr.com/v1/server/create_ipv4", $args);
 }
 
 public function server_destroy (int $subid) {
  $subid = array('SUBID' => $subid);
  parent::post("https://api.vultr.com/v1/server/destroy", $subid);
 }
 
 public function server_destroy_ipv4 (int $subid, string $ip) {
  $args = array(
   'SUBID'=>$subid,
   'ip'=>$ip,
  );
  parent::post("https://api.vultr.com/v1/server/destroy_ipv4", $args);
 }
 
 public function server_get_user_data (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/get_user_data?SUBID=$subid");
 }
 
 public function server_halt (int $subid) {
  $subid = array('SUBID'=>$subid);
  parent::post("https://api.vultr.com/v1/server/halt", $subid);
 }
 
 public function server_label_set (int $subid, string $label) {
  $args = array(
   'SUBID'=>$subid,
   'label'=>$label,
  );
  parent::post("https://api.vultr.com/v1/server/label_set", $args);
 }
 
 public function server_list () {
  parent::keyget("https://api.vultr.com/v1/server/list");
 }
 
 public function server_list_ipv4 (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/list_ipv4?SUBID=$subid");
 }
 
 public function server_list_ipv6 (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/list_ipv6?SUBID=$subid");
 }
 
 public function server_neighbors (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/neighbors?SUBID=$subid");
 }
 
 public function server_os_change (int $subid, int $osid) {
  $args = array(
   'SUBID'=>$subid,
   'OSID'=>$osid,
  );
  parent::post("https://api.vultr.com/v1/server/os_change", $args);
 }
 
 public function server_os_change_list (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/os_change_list?SUBID=$subid");
 }
 
 public function server_reboot (int $subid) {
  $subid = array('SUBID'=>$subid);
  parent::post("https://api.vultr.com/v1/server/reboot", $subid);
 }
 
 public function server_reinstall (int $subid) {
  $subid = array('SUBID'=>$subid);
  parent::post("https://api.vultr.com/v1/server/reinstall", $subid);
 }
 
 public function server_restore_backup (int $subid, string $backupid) {
  $args = array(
   'SUBID'=>$subid,
   'BACKUPID'=>$backupid,
  );
  parent::post("https://api.vultr.com/v1/server/restore_backup", $args);
 }
 
 public function server_restore_snapshot (int $subid, int $snapshotid) {
  $args = array(
   'SUBID'=>$subid,
   'SNAPSHOTID'=>$snapshotid,
  );
  parent::post("https://api.vultr.com/v1/server/restore_snapshot", $args);
 }
 
 public function server_reverse_default_ipv4 (int $subid, string $ip) {
  $args = array(
   'SUBID'=>$subid,
   'ip'=>$ip,
  );
  parent::post("https://api.vultr.com/v1/server/reverse_default_ipv4", $args);
 }
 
 public function server_reverse_delete_ipv6 (int $subid, string $ip) {
  $args = array(
   'SUBID'=>$subid,
   'ip'=>$ip,
  );
  parent::post("https://api.vultr.com/v1/server/reverse_delete_ipv6", $args);
 }
 
 public function server_reverse_list_ipv6 (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/reverse_list_ipv6?SUBID=$subid");
 }
 
 public function server_reverse_set_ipv4 (int $subid, string $ip, string $entry) {
  $args = array(
   'SUBID'=>$subid,
   'ip'=>$ip,
   'entry'=>$entry,
  );
  parent::post("https://api.vultr.com/v1/server/reverse_set_ipv4", $args);
 }
 
 public function server_reverse_set_ipv6 (int $subid, string $ip, string $entry) {
  $args = array(
   'SUBID'=>$subid,
   'ip'=>$ip,
   'entry'=>$entry,
  );
  parent::post("https://api.vultr.com/v1/server/reverse_set_ipv6", $args);
 }

 
 public function server_set_user_data (int $subid, string $userdata) {
  $args = array(
   'SUBID'=>$subid,
   'userdata'=>$userdata,
  );
  parent::post("https://api.vultr.com/v1/server/set_user_data", $args);
 }
 
 public function server_start (int $subid) {
  $args = array('SUBID'=>$subid);
  parent::post("https://api.vultr.com/v1/server/start", $args);
 }
 
 public function server_upgrade_plan (int $subid, int $vpsplanid) {
  $args = array(
   'SUBID'=>$subid,
   'VPSPLANID'=>$vpsplanid,
  );
  parent::post("https://api.vultr.com/v1/server/upgrade_plan", $args);
 }
 
 public function server_upgrade_plan_list (int $subid) {
  parent::keyget("https://api.vultr.com/v1/server/upgrade_plan_list?SUBID=$subid");
 }
 
 public function snapshot_create (array $args) {
  if (!(array_key_exists('SUBID', $args))) {
   exit("snapshot_create requires argument: SUBID");
  }
  parent::post("https://api.vultr.com/v1/snapshot/create", $args);
 }
 
 public function snapshot_destroy (string $snapshotid) {
  $snapshotid = array('SNAPSHOTID'=>$snapshotid);
  parent::post("https://api.vultr.com/v1/snapshot/destroy", $snapshotid);
 }
 
 public function snapshot_list () {
  parent::keyget("https://api.vultr.com/v1/snapshot/list");
 }
 
 public function sshkey_create (string $name, string $ssh_key) {
  $args = array(
   'name'=>$name,
   'ssh_key'=>$ssh_key,
  );
  parent::post("https://api.vultr.com/v1/sshkey/create", $args);
 }
 
 public function sshkey_destroy (string $sshkeyid) {
  $sshkeyid = array('SSHKEYID'=>$sshkeyid);
  parent::post("https://api.vultr.com/v1/sshkey/destroy", $sshkeyid);
 }
 
 public function sshkey_list () {
  parent::keyget("https://api.vultr.com/v1/sshkey/list");
 }
 
 public function sshkey_update (array $args) {
  if (!(array_key_exists('SSHKEYID', $args))) {
   exit("sshkey_update requires argument: SSHKEYID");
  }
  parent::post("https://api.vultr.com/v1/sshkey/update", $args);
 }
 
 public function startupscript_create (string $name, string $script, string $type) {
  $args = array(
   'name'=>$name,
   'script'=>$script, 
   'type'=>$type,
  );
  parent::post("https://api.vultr.com/v1/startupscript/create", $args);
 }
 
 public function startupscript_destroy (string $scriptid) {
  $scriptid = array('SCRIPTID'=>$scriptid);
  parent::post("https://api.vultr.com/v1/startupscript/destroy");
 }
 
 public function startupscript_list () {
  parent::keyget("https://api.vultr.com/v1/startupscript/list");
 }
 
 public function startupscript_update ($args) {
  if (!(array_key_exists('SCRIPTID', $args))) { 
   exit("startupscript_update requires argument: SCRIPTID");
  }
  parent::post("https://api.vultr.com/v1/startupscript/update", $args);
 }
 
 public function user_create (string $email, string $name, string $password, string $api_enabled, array $acls) {
  $args = array(
   'email'=>$email,
   'name'=>$name,
   'password'=>$password,
   'api_enabled'=>$api_enabled,
   'acls'=>$acls,
  );
  parent::post("https://api.vultr.com/v1/user/create", $args);
 }
 
 public function user_delete (int $userid) {
  $userid = array('USERID'=>$userid);
  parent::post("https://api.vultr.com/v1/user/delete", $userid);
 }
 
 public function user_list () {
  parent::keyget("https://api.vultr.com/v1/user/list");
 }
 
 public function user_update (array $args) {
  if (!(array_key_exists('USERID', $args))) {
   exit("user_update requires argument: USERID");
  }
  parent::post("https://api.vultr.com/v1/user/update", $args);
 }
 
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
