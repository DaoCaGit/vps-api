<?php

function http_getheaders () {
 include("apikeys.php");
 $opts = array(
  'http'=>array(
   'method'=>"GET",
   'header'=>"API-Key: $vultr_apikey"
  )
 );
 $context = stream_context_create($opts);
 return $context;
}

function http_postheaders ($data) {
 include("apikeys.php");
 $opts = array(
  'http'=>array(
   'method'=>"POST",
   'header'=>"API-Key: $vultr_apikey",
   'content' => http_build_query($data)
  )
 );
 var_dump($opts);
 $context = stream_context_create($opts);
 return $context;
}

function get_request ($url) {
 $response = file_get_contents($url);
 return($response);
}

function keyget_request ($url) {
 $response = file_get_contents($url, false, http_getheaders());
 return($response);
}

function post_request ($url, $data) {
 $response = file_get_contents($url, false, http_postheaders($data));
 return($response);
}

function json_pretty ($notpretty) {
 $notpretty = json_decode($notpretty);
 $pretty = json_encode($notpretty, JSON_PRETTY_PRINT);
 return $pretty;
}

?>
