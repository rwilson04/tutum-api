<?php
$result = shell_exec('curl -H "Authorization: $TUTUM_AUTH" -H "Accept: application/json" $WEB_TUTUM_API_URL/api/v1/service/?limit=50');
$json = json_decode($result, true);
$meta = $json['meta'];
$services = $json['objects'];
$uuid = null;
foreach ($services as $service) {
	echo $service['name'] . "\n";
}
echo "\n";
//print_r($json);

