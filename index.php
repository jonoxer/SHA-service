<html>
<head>
</head>
<body>
<?php
$buttonId = $_REQUEST['buttonId'];
//echo "b: $buttonId";

require_once("phpMQTT/phpMQTT.php");
$mqtt = new phpMQTT("192.168.1.111", 1883, "PHP-MQTT-Client-".$_SERVER['SERVER_ADDR']);

require("config.php");

switch( $config[$buttonId]['Type'])
{
	case "MQTT":
		publish_to_mqtt( $config[$buttonId]['Topic'], $config[$buttonId]['Message'], $config[$buttonId]['Response'] );
		break;
	case "HTTP":
		publish_to_http( $config[$buttonId]['URL'], $config[$buttonId]['Response'] );
		break;
}

/**
 */
function publish_to_mqtt( $topic, $message, $response )
{
	global $mqtt;
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
