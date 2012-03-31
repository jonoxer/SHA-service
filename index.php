<html>
<head>
</head>
<body>
<?php
require("config.php");
require_once("phpMQTT/phpMQTT.php");

$buttonId = $_REQUEST['buttonId'];
//echo "b: $buttonId";



switch( $device[$buttonId]['Type'])
{
	case "MQTT":
		publish_to_mqtt( $device[$buttonId]['Topic'], $device[$buttonId]['Message'], $device[$buttonId]['Response'] );
		break;
	case "HTTP":
		publish_to_http( $device[$buttonId]['URL'], $device[$buttonId]['Response'] );
		break;
}

/**
 */
function publish_to_mqtt( $topic, $message, $response )
{
	global $config;
	$mqtt = new phpMQTT($config['MQTTHost'], 1883, "PHP-MQTT-Client-".$_SERVER['SERVER_ADDR']);
	if( $mqtt->connect()) {
		$mqtt->publish( $topic, $message );
		$mqtt->close();
	}
	echo $response;
}

/**
 */
function publish_to_http( $url, $response )
{
	`curl -d $url`;
	echo $response;
}

?>
</body>
</html>
