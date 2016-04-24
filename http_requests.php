<?php

function json_pretty ($notpretty) {
 $pretty = json_decode($notpretty);
 $pretty = json_encode($pretty, JSON_PRETTY_PRINT);
 if (is_string($pretty) && is_array(json_decode($pretty, true))) {
  return $pretty;
 } else {
  return $notpretty;
 }
}

function performcurl($opts) {
 $ci = curl_init();
 curl_setopt_array($ci, $opts);
 $response = curl_exec($ci);
 $response_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
 curl_close($ci);
 if (is_null($response)) {
  return $response_code;
 } else {
  return $response;
 }
}

class http_requests {

 private $apikey = null; 

 public function __construct ($apikey) {
  $this->apikey = $apikey;
 }

 public function get ($url) {
  $opts = array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POST => false,
  );
  $this->response = performcurl($opts);
  return;
 }
 
 public function keyget ($url) {
  $opts = array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POST => false,
   CURLOPT_HTTPHEADER => array("API-Key: $this->apikey"),
  );
  $this->response = performcurl($opts);
  return;
 }
 
 public function post ($url, $data) {
  $opts = array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POST => true,
   CURLOPT_HTTPHEADER => array("API-Key: $this->apikey"),
   CURLOPT_POSTFIELDS => http_build_query($data),
  );
  $this->response = performcurl($opts);
  return;
 }
 
}

?>
