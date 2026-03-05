<?php

include "config.php";
include "logger.php";
include "ratelimit.php";

header("Content-Type: application/json");

$ip=$_SERVER["REMOTE_ADDR"];

check_rate_limit($ip);

$api=TRACE_API;

$response=null;
$query="";

if(isset($_POST["url"])){

$query=$_POST["url"];

$api.="&url=".urlencode($query);

$response=file_get_contents($api);

}

elseif(isset($_FILES["image"])){

$query="image_upload";

$ch=curl_init($api);

curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch,CURLOPT_HTTPHEADER,[
"Content-Type: application/octet-stream"
]);

curl_setopt($ch,CURLOPT_POSTFIELDS,
file_get_contents($_FILES["image"]["tmp_name"])
);

$response=curl_exec($ch);

curl_close($ch);

}

if($response){

log_request($ip,"ok",$query);

echo $response;

}else{

log_request($ip,"fail",$query);

echo json_encode(["error"=>"search failed"]);

}
