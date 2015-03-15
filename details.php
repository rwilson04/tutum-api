<?php
$target = $argv[1];
$result = shell_exec('curl -s -H "Authorization: $TUTUM_AUTH" -H "Accept: application/json" https://dashboard.tutum.co/api/v1/service/?limit=50');
$json = json_decode($result, true);
$meta = $json['meta'];
$services = $json['objects'];
$uuid = null;
foreach ($services as $service) {
	if ($service['name'] === $target) {
		print_r($service);
		return;
		break;
	}
}
echo "Service '$target' not found \n";
