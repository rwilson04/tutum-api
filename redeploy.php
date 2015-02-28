<?php
$target = $argv[1];
$result = shell_exec('curl -s -H "Authorization: $TUTUM_AUTH" -H "Accept: application/json" https://dashboard.tutum.co/api/v1/service/?limit=50');
$json = json_decode($result, true);
$meta = $json['meta'];
$services = $json['objects'];
$uuid = null;
foreach ($services as $service) {
	if ($service['name'] === $target) {
		$uuid = $service['uuid'];
		break;
	}
}
if ($uuid !== null) {
	$result = shell_exec('curl -s -H "Authorization: $TUTUM_AUTH" -H "Accept: application/json" https://dashboard.tutum.co/api/v1/service/' . $uuid . '/redeploy/ -X POST');
	$json = json_decode($result, true);
	if (isset($json['error'])) {
		echo 'Error:' . $json['error'] . "\n";
	} else {
		echo "Redeploying service '$target' \n";
	}
} else {
	echo "Service '$target' not found \n";
}
echo "\n";
//print_r($json);

