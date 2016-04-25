<?php

// Don't use json_pretty function except for debugging. When debugging, know that it sometimes hides the output. If there is no output, it returns "null".
function json_pretty ($notpretty) {
 $pretty = json_decode($notpretty);
 $pretty = json_encode($pretty, JSON_PRETTY_PRINT);
 return $pretty;
}

class http_requests {

 private $apikey = null; 
 public $response = null;
 public $response_code = null;

 public function __construct ($apikey) {
  $this->apikey = $apikey;
 }

public function performcurl ($opts) {
 $ci = curl_init();
 curl_setopt_array($ci, $opts);
 $this->response = curl_exec($ci);
 $this->response_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
 curl_close($ci);
 return;
 // This function produces $this->response and $this->response_code
}

 public function get ($url) {
  $opts = array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POST => false,
  );
  $this->performcurl($opts);
 }
 
 public function keyget ($url) {
  $opts = array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POST => false,
   CURLOPT_HTTPHEADER => array("API-Key: $this->apikey"),
  );
  $this->performcurl($opts);
 }
 
 public function post ($url, $data) {
  $opts = array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POST => true,
   CURLOPT_HTTPHEADER => array("API-Key: $this->apikey"),
   CURLOPT_POSTFIELDS => http_build_query($data),
  );
  $this->performcurl($opts);
  return;
 }
 
}

?>
