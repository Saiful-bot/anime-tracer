<?php

$logs=json_decode(file_get_contents("../logs.json"),true);

?>

<h2>Request Logs</h2>

<table border="1" cellpadding="8">

<tr>
<th>Time</th>
<th>IP</th>
<th>Status</th>
<th>User Agent</th>
<th>Search Query</th>
</tr>

<?php

foreach(array_reverse($logs) as $l){

echo "<tr>";

echo "<td>".$l["time"]."</td>";
echo "<td>".$l["ip"]."</td>";
echo "<td>".$l["status"]."</td>";
echo "<td>".$l["agent"]."</td>";
echo "<td>".$l["query"]."</td>";
echo "</tr>";

}

?>
