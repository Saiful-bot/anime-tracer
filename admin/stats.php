<?php

$logs=json_decode(file_get_contents("../logs.json"),true);

$total=count($logs);

$ips=[];

foreach($logs as $l){
$ips[$l["ip"]]=1;
}

$unique=count($ips);

?>

<h2>Server Stats</h2>

Total Requests : <?php echo $total ?><br>
Unique IP : <?php echo $unique ?>
