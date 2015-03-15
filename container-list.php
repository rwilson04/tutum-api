<?php
$result = shell_exec('curl -H "Authorization: $TUTUM_AUTH" -H "Accept: application/json" https://dashboard.tutum.co/api/v1/container/?limit=50');
$json = json_decode($result, true);
$meta = $json['meta'];
$services = $json['objects'];
$uuid = null;
foreach ($services as $service) {
	echo $service['name'] . "\n";
}
echo "\n";
//print_r($json);

