<?php
include_once "config.php";

function check_rate_limit($ip){

$logs=[];

if(file_exists(LOG_FILE)){
$logs=json_decode(file_get_contents(LOG_FILE),true);
}

$count=0;

foreach($logs as $l){

if($l["ip"]==$ip){

if(time()-strtotime($l["time"])<60){
$count++;
}

}

}

if($count>MAX_REQUEST_PER_MIN){

http_response_code(429);

echo json_encode([
"error"=>"Rate limit exceeded"
]);

exit;

}

}
