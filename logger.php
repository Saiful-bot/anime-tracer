<?php

include_once "config.php";

function log_request($ip,$status,$query){

$entry=[

"time"=>date("Y-m-d H:i:s"),
"ip"=>$ip,
"status"=>$status,
"agent"=>$_SERVER["HTTP_USER_AGENT"] ?? "unknown",
"query"=>$query

];

$data=[];

if(file_exists(LOG_FILE)){

$data=json_decode(file_get_contents(LOG_FILE),true);

}

$data[]=$entry;

file_put_contents(LOG_FILE,json_encode($data,JSON_PRETTY_PRINT));

}
